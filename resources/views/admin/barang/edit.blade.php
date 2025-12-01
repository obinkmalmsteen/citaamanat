@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Barang</h3>

    <form action="{{ route('barang.update',$barang->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control" required>
        </div>

<div class="mb-3">
    <label>Jenis Barang</label>
 <select name="jenis_id" class="form-control" required>
    @foreach ($jenis as $j)
        <option value="{{ $j->id }}" 
            {{ $barang->jenis_id == $j->id ? 'selected' : '' }}>
            {{ $j->nama_jenis }}
        </option>
    @endforeach
</select>

</div>



        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" value="{{ $barang->stok }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Satuan</label>
            <input type="text" name="satuan" value="{{ $barang->satuan }}" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
