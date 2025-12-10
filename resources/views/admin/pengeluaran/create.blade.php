@extends('layouts.app')

@section('content')
<h3>Tambah Pengeluaran</h3>

<form action="{{ route('pengeluaran.store') }}" method="POST" enctype="multipart/form-data">
@csrf

@include('admin.pengeluaran.form')

<button class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection
