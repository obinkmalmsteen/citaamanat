@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Request Perbaikan</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('request-perbaikan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Area Perbaikan</label>
                    <select name="area_perbaikan" class="form-select">
                        <option selected disabled>Pilih area</option>
                        <option>Area Satpam & Parkir</option>
                        <option>Area Penerimaan Barang</option>
                        <option>Area Pengolahan Barang</option>
                        <option>Area Penyimpanan Barang</option>
                        <option>Area Produksi</option>
                        <option>Area Pemorsian</option>
                        <option>Area Loading/Unloading</option>
                        <option>Area Office</option>
                        <option>Area Toilet</option>
                        <option>Area Mushola</option>
                        <option>Area Gudang Basah</option>
                        <option>Area Gudang Kering</option>
                        <option>Area Penyimpanan Alat Masak</option>
                        <option>Area Penyimpanan Bahan Baku</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Jenis Kerusakan</label>
                    <input name="jenis_kerusakan" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Type Perbaikan</label>
                    <select name="type_perbaikan" class="form-select">
                        <option selected disabled>Pilih tipe</option>
                        <option>Las</option>
                        <option>Tukang Bangunan</option>
                        <option>Tukang Reparasi</option>
                        <option>Listrik</option>
                        <option>AC</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Estimasi Biaya</label>
                    <input type="number" name="estimasi_biaya" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="2"></textarea>
                </div>

                <button class="btn btn-success mt-3">Simpan</button>
            </form>
        </div>
    </div>

</div>
@endsection
