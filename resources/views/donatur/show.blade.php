@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Detail Donasi </h3>
    
    <!-- Button Modal -->
    <button class="btn btn-success" data-toggle="modal" data-target="#modalDonasi">
        + Tambah Donasi
    </button>
</div>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif


    <table class="table table-bordered">
        <tr>
            <th>Nama Donatur</th>
            <td>{{ $data->nama_donatur }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $data->alamat_donatur }}</td>
        </tr>
        <tr>
            <th>Donatur Tetap</th>
            <td>
                @if($data->donatur_tetap == 1)
                    Ya
                @else
                    Tidak
                @endif
            </td>
        </tr>
        <tr>
            <th>Total Donasi</th>
            <td>Rp {{ number_format($data->totalDonasi(), 0, ',', '.') }}</td>
        </tr>
    </table>

    

    <h4 class="mt-4">Histori Donasi</h4>

    @if($data->donasi->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data->donasi as $item)
                <tr>
                    <td>{{ $item->created_at->format('d M Y') }}</td>
                    <td>Rp {{ number_format($item->nominal_donasi, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada histori donasi.</p>
    @endif

    <a href="{{ route('donatur.index') }}" class="btn btn-secondary mt-3">Kembali</a>

</div>
@endsection
<!-- Modal Tambah Donasi -->
<div class="modal fade" id="modalDonasi" tabindex="-1" role="dialog" aria-labelledby="modalDonasiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('donatur.donasi.store', $data->id) }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="modalDonasiLabel">Tambah Donasi Baru</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="form-group">
                <label>Nominal Donasi</label>
                <input type="number" name="nominal_donasi" class="form-control" required>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </div>
    </form>
  </div>
</div>
