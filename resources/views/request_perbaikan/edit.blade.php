@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Request Perbaikan</h3>

    <form action="{{ route('request-perbaikan.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Area Perbaikan</label>
            <input type="text" name="area_perbaikan" class="form-control" value="{{ $item->area_perbaikan }}">
        </div>

        <div class="mb-3">
            <label>Jenis Kerusakan</label>
            <input type="text" name="jenis_kerusakan" class="form-control" value="{{ $item->jenis_kerusakan }}">
        </div>

        <div class="mb-3">
            <label>Type Perbaikan</label>
            <input type="text" name="type_perbaikan" class="form-control" value="{{ $item->type_perbaikan }}">
        </div>

        <div class="mb-3">
            <label>Estimasi Biaya</label>
            <input type="number" name="estimasi_biaya" class="form-control" value="{{ $item->estimasi_biaya }}">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $item->keterangan }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
