@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Donatur</h3>

    <form action="{{ route('donatur.update', $donatur) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Donatur</label>
            <input type="text" name="nama_donatur" class="form-control"
                   value="{{ old('nama_donatur', $donatur->nama_donatur) }}">
            @error('nama_donatur')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Jumlah Donasi</label>
            <input type="number" name="jumlah_donasi" class="form-control"
                   value="{{ old('jumlah_donasi', $donatur->jumlah_donasi) }}">
            @error('jumlah_donasi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('donatur.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
