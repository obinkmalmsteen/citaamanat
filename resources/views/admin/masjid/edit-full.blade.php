@extends('layouts.app')

@section('content')


<div class="container">
    <i  class="text-danger">Pergunakan fungsi Edit data ini dengan Semestinya dan penuh Tanggung Jawab!</i>
    <h3>Edit Data Masjid</h3>

    <form action="{{ route('masjid.updateFull', $masjid->id_pelanggan) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Masjid</label>
        <input type="text" class="form-control" name="nama_masjid" value="{{ $masjid->nama_masjid }}">

        <label>Nama Ketua DKM</label>
        <input type="text" class="form-control" name="nama_ketua_dkm" value="{{ $masjid->nama_ketua_dkm }}">

        <label>Telepon Ketua DKM</label>
        <input type="text" class="form-control" name="telp_ketua_dkm" value="{{ $masjid->telp_ketua_dkm }}">

        <label>Alamat Masjid</label>
        <textarea class="form-control" name="alamat_lengkap">{{ $masjid->alamat_lengkap }}</textarea>

        <button class="btn btn-success mt-3">Simpan Semua Perubahan</button>
        <a href="{{ route('masjid.show', $masjid->id_pelanggan) }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
