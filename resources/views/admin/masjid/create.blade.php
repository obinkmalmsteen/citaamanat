@extends('layouts/app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-university  mr-2"></i>
        {{ $title }}

    </h1>

    <div class="card">

        <div class="card-header">
            <a href="{{ route('masjid') }}" class="btn btn-sm btn-success">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

      <!-- Form isi data Start --> 
        <div class="card-body">
            <form action="{{ route('masjidStore') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label class="form-label"><span class="text-danger">*</span> ID Pelanggan PLN :</label>
                        <input type="text" name="id_pelanggan" class="form-control" value="{{ old('id_pelanggan') }}">
                        @error('id_pelanggan')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label class="form-label"><span class="text-danger">*</span> Nama Pelanggan PLN :</label>
                        <input type="text" name="nama_pelanggan" class="form-control"  value="{{ old('nama_pelanggan') }}">
                        @error('nama_pelanggan')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
                </div>

                    <div class="row">
                    <div class="col-12">
                        <label class="form-label"><span class="text-danger">*</span> Nama Masjid / Mushola :</label>
                        <input type="text" name="nama_masjid" class="form-control"  value="{{ old('nama_masjid') }}">
                        @error('nama_masjid')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
                </div>

                 <div class="row">
                    <div class="col-12">
                        <label class="form-label"><span class="text-danger">*</span> Nama Ketua DKM :</label>
                        <input type="text" name="nama_ketua_dkm" class="form-control"  value="{{ old('nama_ketua_dkm') }}">
                        @error('nama_ketua_dkm')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label class="form-label"><span class="text-danger">*</span> Jenis Layanan PLN :</label>
                        <select name="jenis_layanan" class="form-control" value="{{ old('jenis_layanan') }}">
                            <option selected disabled>== Pilih Jenis Layanan ==</option>
                            <option value="Pra-Bayar">Pra-Bayar (Token) </option>
                            <option value="Pasca-Bayar">Pasca-Bayar </option>
                            
                        </select>
                        @error('jenis_layanan')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
                </div>

               

                <div class="row" >
                    <div class="col-12">
                    <button type="submit" class="btn btn-sm btn-primary col-12">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
                </div>
            </form>
        </div>
<!-- Form isi data End -->

    </div>
@endsection
