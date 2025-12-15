@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Histori Donasi</h4>

    <form action="{{ route('donatur.donasi.update', $donasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Jumlah Donasi</label>
            <input type="number"
                   name="nominal_donasi"
                   class="form-control"
                   value="{{ old('nominal_donasi', $donasi->nominal_donasi) }}"
                   required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('donatur.show', $donasi->donatur_id) }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
