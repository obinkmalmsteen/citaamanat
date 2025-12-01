@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Tambah Barang</h3>

        <form action="{{ route('barang.store') }}" method="POST">
            @csrf


            <div class="mb-3">
                <label>Jenis Barang</label>
              <select name="jenis_id" class="form-control" required>
    <option value="">-- Pilih Jenis --</option>
    @foreach ($jenis as $j)
        <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
    @endforeach
</select>


            </div>
            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Satuan (optional)</label>
                <input type="text" name="satuan" class="form-control">
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
