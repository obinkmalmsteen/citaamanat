@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">List Donatur</h3>

    <a href="{{ route('donatur.create') }}" class="btn btn-primary mb-3">Tambah Donatur</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Donatur</th>
                <th>Jumlah Donasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donaturs as $donatur)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $donatur->nama_donatur }}</td>
                    <td>Rp {{ number_format($donatur->jumlah_donasi) }}</td>
                    <td>
                        <a href="{{ route('donatur.edit', $donatur) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('donatur.destroy', $donatur) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $donaturs->links() }}
</div>
@endsection
