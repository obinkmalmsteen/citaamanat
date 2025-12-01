@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Detail Request: {{ $pengadaan->kode }}</h3>

    <a href="{{ route('pengadaan.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Pemohon:</strong> {{ $pengadaan->user->nama ?? '-' }}</p>
            <p><strong>Cabang:</strong> {{ $pengadaan->cabang_id ?? '-' }}</p>
            <p><strong>Catatan pemohon:</strong> {{ $pengadaan->note ?? '-' }}</p>
            <p><strong>Status:</strong> {{ $pengadaan->status }}</p>
        </div>
    </div>

    <table class="table table-bordered">
        <thead><tr><th>#</th><th>Nama Barang</th><th>Qty</th><th>Note</th></tr></thead>
        <tbody>
            @foreach($pengadaan->items as $i => $it)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $it->barang->nama_barang ?? '-' }}</td>
                <td>{{ $it->qty }}</td>
                <td>{{ $it->note }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if(auth()->user()->jabatan === 'Admin' && $pengadaan->status === 'pending')
    <form action="{{ route('pengadaan.approve', $pengadaan->id) }}" method="POST" class="d-inline">
        @csrf
        <input type="hidden" name="approval_note" value="Disetujui">
        <button class="btn btn-success">Approve</button>
    </form>

    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>

    <!-- Modal reject -->
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true">
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
@endsection
