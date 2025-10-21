@extends('layouts/app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-plus  mr-2"></i>
        {{ $title }}

    </h1>

    <div class="card">

        <div class="card-header">
            <a href="{{ route('user') }}" class="btn btn-sm btn-success">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

      <!-- Form isi data Start --> 
        <div class="card-body">
            <form action="{{ route('userStore') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label class="form-label"><span class="text-danger">*</span> Nama :</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                        @error('nama')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label class="form-label"><span class="text-danger">*</span> Email :</label>
                        <input type="email" name="email" class="form-control @error('email')is-invalid      
                        @enderror" value="{{ old('email') }}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label class="form-label"><span class="text-danger">*</span> Jabatan :</label>
                        <select name="jabatan" class="form-control" value="{{ old('jabatan') }}">
                            <option selected disabled>== Pilih Jabatan ==</option>
                            <option value="Admin">Admin</option>
                            <option value="Karyawan">Karyawan</option>
                            <option value="PenerimaManfaat">Penerima Manfaat</option>
                        </select>
                        @error('jabatan')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label class="form-label"><span class="text-danger">*</span> Password :</label>
                        <input type="password" name="password" class="form-control" >
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>  
                        @enderror
                    </div>
                </div>

                <div class="row">
                     <div class="col-12">
                        <label class="form-label"><span class="text-danger">*</span> Password Konfirmasi :</label>
                        <input type="password" name="password_confirmation" class="form-control">
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
