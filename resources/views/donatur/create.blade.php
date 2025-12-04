@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Donatur</h3>

    <form action="{{ route('donatur.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Donatur</label>
            <input type="text" name="nama_donatur" class="form-control"
                   value="{{ old('nama_donatur') }}">
            @error('nama_donatur')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Jumlah Donasi</label>
            <input type="number" name="jumlah_donasi" class="form-control"
                   value="{{ old('jumlah_donasi') }}">
            @error('jumlah_donasi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('donatur.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
