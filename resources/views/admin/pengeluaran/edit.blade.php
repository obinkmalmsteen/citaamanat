@extends('layouts.app')

@section('content')
<h3>Edit Pengeluaran</h3>

<form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')

@include('admin.pengeluaran.form')

<button class="btn btn-primary mt-3">Update</button>
</form>
@endsection
