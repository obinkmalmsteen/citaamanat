@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Buat Request Pengadaan</h3>

    <a href="{{ route('pengadaan.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <form id="formRequest" method="POST" action="{{ route('pengadaan.store') }}">
        @csrf
<div class="mb-3 d-flex justify-content-end">
    <button type="button" id="previewBtn" class="btn btn-info">Preview Checklist</button>
</div>

<div id="previewContainer" class="mb-3" style="display:none;">
    <h5>Barang yang sudah dichecklist:</h5>
    <div style="max-height:300px; overflow-y:auto; border:1px solid #ddd; padding:5px;">
        <table class="table table-sm table-bordered mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody id="previewTableBody">
                <!-- Isi otomatis lewat JS -->
            </tbody>
        </table>
    </div>
</div>
<div class="mb-3 d-flex justify-content-end">
 <button type="button" id="generateBtn" class="btn btn-primary">Generate Request</button>
</div>


        <div class="mb-3">
            <label for="note">Catatan umum (opsional)</label>
            <textarea name="note" id="note" class="form-control" rows="2">{{ old('note') }}</textarea>
        </div>

       <div class="mb-2">
    <input type="text" id="searchInput" class="form-control" placeholder="Cari barang...">
</div>

        <table class="table table-bordered" id="barangTable">
            <thead>
                <tr>
                    <th style="width:40px">#</th>
                    <th style="width:40px"><input type="checkbox" id="check_all"></th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th style="width:120px">Qty Request</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $i => $b)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>
                        <input type="checkbox" class="check-item" data-id="{{ $b->id }}">
                    </td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>{{ $b->stok }}</td>
                    <td>{{ $b->satuan }}</td>
                    <td>
                        <input type="number" min="1" class="form-control qty-input" data-id="{{ $b->id }}" disabled>
                    </td>
                    <td>
                        <input type="text" class="form-control note-input" data-id="{{ $b->id }}" disabled>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <input type="hidden" name="items_json" id="items_json">

       
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkAll = document.getElementById('check_all');
    const checkItems = document.querySelectorAll('.check-item');

    checkAll?.addEventListener('change', function(){
        checkItems.forEach(cb => {
            cb.checked = this.checked;
            toggleInputs(cb);
        });
    });

    checkItems.forEach(cb => {
        cb.addEventListener('change', function(){
            toggleInputs(cb);
        });
    });

    function toggleInputs(cb) {
        const id = cb.getAttribute('data-id');
        const qty = document.querySelector('.qty-input[data-id="'+id+'"]');
        const note = document.querySelector('.note-input[data-id="'+id+'"]');
        if (cb.checked) {
            qty.disabled = false;
            qty.value = qty.value || 1;
            note.disabled = false;
        } else {
            qty.disabled = true;
            qty.value = '';
            note.disabled = true;
            note.value = '';
        }
    }

    // saat klik generate, buat input hidden array sesuai format yang diharapkan backend
    document.getElementById('generateBtn').addEventListener('click', function(){
        const items = [];
        document.querySelectorAll('.check-item:checked').forEach(cb => {
            const id = cb.getAttribute('data-id');
            const qty = document.querySelector('.qty-input[data-id="'+id+'"]').value || 0;
            const note = document.querySelector('.note-input[data-id="'+id+'"]').value || null;
            items.push({ barang_id: id, qty: parseInt(qty), note: note });
        });

        if (items.length === 0) {
            alert('Pilih minimal 1 barang untuk direquest.');
            return;
        }

        // set form fields: kita kirim sebagai array inputs named items[0][barang_id]...
        // Untuk kesederhanaan, buat field input dinamis
        const form = document.getElementById('formRequest');

        // hapus input items lama
        document.querySelectorAll('input[name^="items"]').forEach(n => n.remove());

        items.forEach((it, idx) => {
            const bi = document.createElement('input');
            bi.type = 'hidden'; bi.name = `items[${idx}][barang_id]`; bi.value = it.barang_id;
            const bq = document.createElement('input');
            bq.type = 'hidden'; bq.name = `items[${idx}][qty]`; bq.value = it.qty;
            const bn = document.createElement('input');
            bn.type = 'hidden'; bn.name = `items[${idx}][note]`; bn.value = it.note ?? '';
            form.appendChild(bi); form.appendChild(bq); form.appendChild(bn);
        });

        form.submit();
    });
});
</script>


<script>
document.getElementById('searchInput').addEventListener('input', function(){
    const query = this.value.toLowerCase();
    document.querySelectorAll('#barangTable tbody tr').forEach(tr => {
        const nama = tr.children[2].textContent.toLowerCase(); // kolom nama_barang
        tr.style.display = nama.includes(query) ? '' : 'none';
    });
});
</script>

<script>
document.getElementById('previewBtn').addEventListener('click', function() {
    const tbody = document.getElementById('previewTableBody');
    tbody.innerHTML = ''; // reset

    const checkedItems = document.querySelectorAll('.check-item:checked');

    if (checkedItems.length === 0) {
        alert('Belum ada barang yang dichecklist.');
        return;
    }

    checkedItems.forEach((cb, index) => {
        const id = cb.getAttribute('data-id');
        const row = cb.closest('tr');
        const nama = row.children[2].textContent;
        const qty = row.querySelector('.qty-input').value;
        const note = row.querySelector('.note-input').value;

        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${index + 1}</td>
            <td>${nama}</td>
            <td>${qty}</td>
            <td>${note}</td>
        `;
        tbody.appendChild(tr);
    });

    document.getElementById('previewContainer').style.display = 'block';
    // scroll ke preview
    document.getElementById('previewContainer').scrollIntoView({ behavior: 'smooth' });
});
</script>

@endsection
