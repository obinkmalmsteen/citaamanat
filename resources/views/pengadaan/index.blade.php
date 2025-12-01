@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Daftar Request Pengadaan</h3>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <a href="{{ route('pengadaan.create') }}" class="btn btn-primary mb-3">Buat Request Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Pemohon</th>
                <th>Cabang</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Jumlah Item</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $r)
            <tr>
                <td>{{ $r->kode }}</td>
                <td>{{ $r->user->nama ?? '—' }}</td>
                <td>{{ $r->cabang_id ?? '—' }}</td>
                <td>{{ $r->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    @if($r->status === 'pending') <span class="badge bg-warning">Pending</span> @endif
                    @if($r->status === 'approved') <span class="badge bg-success">Approved</span> @endif
                    @if($r->status === 'rejected') <span class="badge bg-danger">Rejected</span> @endif
                    @if($r->status === 'partially_approved') <span class="badge bg-primary">Partially Approved</span> @endif
                </td>
                <td>{{ $r->items->count() }}</td>
                <td>
                    <a href="{{ route('pengadaan.show', $r->id) }}" class="btn btn-sm btn-info">Lihat</a>
                    @if(auth()->user()->jabatan === 'Admin' && $r->status === 'pending')
                        <!-- Approve/Reject akan ada di show -->
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<style>
    .badge.bg-warning,
.badge.bg-success,
.badge.bg-danger,
.badge.bg-primary {
    color: #ffffff !important;
    font-weight: 600;
}

</style>