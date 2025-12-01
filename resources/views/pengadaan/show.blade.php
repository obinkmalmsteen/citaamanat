@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Detail Request: {{ $pengadaan->kode }}</h3>

    <a href="{{ route('pengadaan.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    {{-- Informasi Utama --}}
    <div class="card mb-3">
        <div class="card-body">
             <p><strong>Pemohon:</strong> {{ $pengadaan->user->nama ?? '-' }}</p>
            <p><strong>Cabang:</strong> {{ $pengadaan->cabang_id ?? '-' }}</p>
             <p><strong>Divisi:</strong> {{ $pengadaan->divisi ?? '-' }}</p>
            <p><strong>Catatan pemohon:</strong> {{ $pengadaan->note ?? '-' }}</p>
           @php
    $badgeColor = match($pengadaan->status) {
        'approved' => 'success',
        'pending' => 'warning',
        'rejected' => 'danger',
        'partially_approved' => 'primary',
        default => 'secondary'
    };
@endphp

<p><strong>Status:</strong> 
    <span class="badge bg-{{ $badgeColor }}">
        {{ ucfirst(str_replace('_',' ', $pengadaan->status)) }}
    </span>
</p>

        </div>
    </div>

    {{-- TABEL ITEM --}}
    <form 
        @if(auth()->user()->jabatan === 'Admin' && $pengadaan->status === 'pending')
            action="{{ route('pengadaan.approve_items', $pengadaan->id) }}" 
            method="POST"
        @endif
    >
        @csrf

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Note</th>
                    <th>
                        @if($pengadaan->status === 'pending')
                            Approve <br>
                            <input type="checkbox" id="check_all">
                        @else
                            Status
                        @endif
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($pengadaan->items as $i => $item)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->note }}</td>

                    <td>
                        {{-- Jika pending → checkbox --}}
                        @if($pengadaan->status === 'pending')
                            <input type="checkbox" 
                                   class="check-item"
                                   name="items[{{ $item->id }}][approve]"
                                   value="1"
                                   {{ $item->status === 'approved' ? 'checked' : '' }}>
                        @else
                            {{-- Jika sudah diapprove/reject --}}
                            <span class="badge 
                                @if($item->status === 'approved') bg-success 
                                @elseif($item->status === 'rejected') bg-danger 
                                @elseif($item->status === 'partially_approved') bg-warning
                                @else bg-secondary 
                                @endif
                            ">
                                {{ $item->status }}
                            </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- TOMBOL APPROVE ITEMS --}}
        @if(auth()->user()->jabatan === 'Admin' && $pengadaan->status === 'pending')
            <button class="btn btn-success mb-3">Approve Selected Items</button>
        @endif
    </form>

    {{-- TOMBOL REJECT (hanya pending) --}}
    @if(auth()->user()->jabatan === 'Admin' && $pengadaan->status === 'pending')
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
            Reject Request
        </button>

        {{-- MODAL REJECT --}}
        <div class="modal fade" id="rejectModal" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('pengadaan.reject', $pengadaan->id) }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tolak Request</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Alasan penolakan</label>
                                <textarea name="approval_note" class="form-control" required></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

{{-- SCRIPT CHECK ALL --}}
<script>
document.addEventListener('DOMContentLoaded', function() {

    const checkAll = document.getElementById('check_all');
    const checkItems = document.querySelectorAll('.check-item');

    checkAll?.addEventListener('change', function() {
        checkItems.forEach(cb => cb.checked = this.checked);
    });
});
</script>
<style>
    .badge.bg-warning,
.badge.bg-success,
.badge.bg-danger,
.badge.bg-info,
.badge.bg-primary,
.badge.bg-secondary {
    color: #ffffff !important;
    font-weight: 600;
}

</style>
@endsection

