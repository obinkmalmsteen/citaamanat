@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit {{ ucfirst(str_replace('_',' ',$field)) }}</h4>

    <form action="{{ route('masjid.updateField', $masjid->id_pelanggan) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="{{ $field }}" value="{{ $masjid->$field }}" class="form-control" required>

        <button class="btn btn-success mt-3" type="submit">Simpan</button>
        <a href="{{ route('masjid.show', $masjid->id_pelanggan) }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
