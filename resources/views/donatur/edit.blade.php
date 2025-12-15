@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">Edit Donatur</h3>

        <form action="{{ route('donatur.update', $donatur) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="row">
                    <div class="col-12">
                        <label class="form-label"><span class="text-danger">*</span> Type Partisipan :</label>
                        <select name="donatur_tetap" class="form-control" value="{{ old('donatur_tetap') }}">
                            <option selected disabled>== Pilih Type Partisipan ==</option>
                            <option value="1">Donatur Tetap</option>
                            <option value="0">Partisipan Kebaikan</option>
                            
                        </select>
                        @error('donatur_tetap')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
                </div>
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
                <input type="text" name="alamat_donatur" class="form-control"
                    value="{{ old('alamat_donatur', $donatur->alamat_donatur) }}">
                @error('alamat_donatur')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
               
            
            <div class="mb-3">
    <label class="form-label">Logo Donatur</label>

    <!-- Tampilkan logo saat edit -->
    @if($donatur->logo_donatur)
        <div class="mb-2">
            <img src="{{ asset('storage/logo_donatur/'.$donatur->logo_donatur) }}" 
                 width="120" 
                 class="img-thumbnail shadow-sm">
        </div>
    @endif

    <!-- Input upload baru -->
    <input type="file" name="logo_donatur" class="form-control">

    @error('logo_donatur')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


            {{-- <div class="mb-3">
                <label>Jumlah Donasi</label>
                <input type="number" name="jumlah_donasi" class="form-control"
                    value="{{ old('jumlah_donasi', $donatur->jumlah_donasi) }}">
                @error('jumlah_donasi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div> --}}

            <button class="btn btn-success">Update</button>
            <a href="{{ route('donatur.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
