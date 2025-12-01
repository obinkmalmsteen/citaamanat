@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Tambah Jenis Barang</h3>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('jenis_barang.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Jenis *</label>
                    <input type="text" name="nama_jenis" class="form-control" required>
                    @error('nama_jenis') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kode Jenis (opsional)</label>
                    <input type="text" name="kode_jenis" class="form-control">
                    @error('kode_jenis') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan (opsional)</label>
                    <textarea name="keterangan" class="form-control" rows="3"></textarea>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('jenis_barang.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
