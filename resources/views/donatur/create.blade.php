@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-4">Tambah Partisipan</h3>

        <form action="{{ route('donatur.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <label class="form-label">
                        <span class="text-danger">*</span> Type Partisipan :
                    </label>

                    <select name="donatur_tetap" id="donatur_tetap" class="form-control">
                        <option value="" disabled {{ old('donatur_tetap') === null ? 'selected' : '' }}>
                            == Pilih Type Partisipan ==
                        </option>
                        <option value="1" {{ old('donatur_tetap') == '1' ? 'selected' : '' }}>
                            Donatur Tetap
                        </option>
                        <option value="0" {{ old('donatur_tetap') == '0' ? 'selected' : '' }}>
                            Partisipan Kebaikan
                        </option>
                    </select>

                    @error('donatur_tetap')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label>Nama Partisipan</label>
                <input type="text" name="nama_donatur" class="form-control" value="{{ old('nama_donatur') }}">
                @error('nama_donatur')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Alamat Partisipan</label>
                <input type="text" name="alamat_donatur" class="form-control" value="{{ old('alamat_donatur') }}">
                @error('alamat_donatur')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Logo Partisipan (Jika ada)</label>
                <input type="file" name="logo_donatur" class="form-control">
                @error('logo_donatur')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="row mt-3" id="nominalWrapper" style="display:none;">
                <div class="col-12">
                    <label class="form-label">
                        <span class="text-danger">*</span> Nominal Donasi
                    </label>
                    <input type="text" id="nominal_donasi" class="form-control" 
                        value="{{ old('nominal_donasi') }}">

                    <!-- input tersembunyi utk dikirim ke server -->
                    <input type="hidden" name="nominal_donasi" id="nominal_donasi_raw">

                    @error('nominal_donasi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <script>
                document.getElementById('donatur_tetap').addEventListener('change', function() {
                    document.getElementById('nominalWrapper').style.display =
                        this.value == '0' ? 'block' : 'none';
                });
            </script>

            <script>
    const input = document.getElementById('nominal_donasi');
    const rawInput = document.getElementById('nominal_donasi_raw');

    input.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        if (value === '') {
            this.value = '';
            rawInput.value = '';
            return;
        }

        rawInput.value = value;
        this.value = new Intl.NumberFormat('id-ID').format(value);
    });
</script>
            {{-- <div class="mb-3">
                <label>Jumlah Donasi</label>
                <input type="number" name="jumlah_donasi" class="form-control" value="{{ old('jumlah_donasi') }}">
                @error('jumlah_donasi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div> --}}

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('donatur.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

