@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Donatur</h3>

    <form action="{{ route('donatur.update', $donatur) }}" method="POST" enctype="multipart/form-data">
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
                <label>Alamat Donatur</label>
                <input type="text" name="alamat_donatur" class="form-control" value="{{ old('alamat_donatur') }}">
                @error('alamat_donatur')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
         <div class="col-md-6 mb-4">
                <label class="form-label">
                    <span class="text-danger">*</span> Donatur Tetap:
                </label>
                <div
                    style="background-color: #f9f7e7; padding: 10px; border-radius: 5px; display: flex; gap: 30px; align-items: center;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="donatur_tetap" id="masjid" value="1"
                            {{ old('donatur_tetap') == 'Masjid' ? 'checked' : '' }}>
                        <label class="form-check-label" for="1">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="donatur_tetap" id="mushola" value="0"
                            {{ old('donatur_tetap') == 'Mushola' ? 'checked' : '' }}>
                        <label class="form-check-label" for="0">Tidak</label>
                    </div>
                </div>
                @error('jenis_bangunan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
  <div class="mb-3">
                <label>Logo Donatur</label>
                <input type="file" name="logo_donatur" class="form-control">
                @error('logo_donatur')
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
