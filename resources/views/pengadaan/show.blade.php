@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- ========================== HEADER INVOICE ============================ --}}
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
        <div>
            <h2 class="fw-bold mb-0">REQUEST PENGADAAN BARANG</h2>
            <div class="text-muted">Kode: {{ $pengadaan->kode }}</div>
        </div>

        <div>
            <img src="/your-logo.png" alt="Logo" style="height:70px;">
        </div>
    </div>

    {{-- ========================== INFORMASI PEMOHON ============================ --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light fw-bold">Informasi Pemohon</div>
        <div class="card-body">

            <div class="row mb-2">
                <div class="col-md-4 fw-semibold">Pemohon</div>
                <div class="col-md-8">{{ $pengadaan->user->nama ?? '-' }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4 fw-semibold">Cabang</div>
                <div class="col-md-8">{{ $pengadaan->cabang_id ?? '-' }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4 fw-semibold">Divisi</div>
                <div class="col-md-8">{{ $pengadaan->divisi ?? '-' }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4 fw-semibold">Catatan Pemohon</div>
                <div class="col-md-8">{{ $pengadaan->note ?? '-' }}</div>
            </div>

            {{-- STATUS BADGE --}}
            @php
                $badgeColor = match($pengadaan->status) {
                    'approved' => 'success',
                    'pending' => 'warning',
                    'rejected' => 'danger',
                    'partially_approved' => 'primary',
                    default => 'secondary'
                };
            @endphp

            <div class="row mt-3">
                <div class="col-md-4 fw-semibold">Status</div>
                <div class="col-md-8">
                    <span class="badge bg-{{ $badgeColor }} px-3 py-2 fs-6 text-white">
                        {{ ucfirst(str_replace('_',' ', $pengadaan->status)) }}
                    </span>
                </div>
            </div>

        </div>
    </div>

    {{-- ========================== TABEL ITEM ============================ --}}

    <div class="card shadow-sm">
        <div class="card-header bg-light fw-bold">Detail Barang</div>
        <div class="card-body">

        <form 
            @if(auth()->user()->jabatan === 'Admin' && $pengadaan->status === 'pending')
                action="{{ route('pengadaan.approve_items', $pengadaan->id) }}" 
                method="POST"
            @endif
        >
            @csrf

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
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
                    @php $total = 0; @endphp
                    @foreach($pengadaan->items as $i => $item)
                        @php $total += ($item->harga * $item->qty); @endphp
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                            <td>{{ $item->qty }}</td>

                            {{-- FORMAT RUPIAH --}}
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>

                            <td>{{ $item->note }}</td>

                            <td>
                                @if($pengadaan->status === 'pending')
                                    <input type="checkbox" 
                                        class="check-item"
                                        name="items[{{ $item->id }}][approve]"
                                        value="1"
                                        {{ $item->status === 'approved' ? 'checked' : '' }}>
                                @else
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

            {{-- TOTAL --}}
            <div class="text-end mt-3">
                <h5 class="fw-bold">Total: 
                    <span class="text-primary">
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </span>
                </h5>
            </div>

            {{-- BUTTON APPROVAL --}}
            @if(auth()->user()->jabatan === 'Admin' && $pengadaan->status === 'pending')
                <button class="btn btn-success mt-3">Approve Selected Items</button>
            @endif

        </form>

        </div>
    </div>


    {{-- BUTTON REJECT --}}
    @if(auth()->user()->jabatan === 'Admin' && $pengadaan->status === 'pending')
        <button class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#rejectModal">
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
                            <textarea name="approval_note" class="form-control" required 
                                placeholder="Tuliskan alasan penolakan..."></textarea>
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

{{-- CHECK ALL SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkAll = document.getElementById('check_all');
    const checkItems = document.querySelectorAll('.check-item');

    checkAll?.addEventListener('change', function() {
        checkItems.forEach(cb => cb.checked = this.checked);
    });
});
</script>

@endsection
