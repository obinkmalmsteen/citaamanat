@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">List Donatur</h3>

        <a href="{{ route('donatur.create') }}" class="btn btn-primary mb-3">Tambah Donatur</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama Donatur</th>
                        <th>Alamat Donatur</th>
                        <th>Donatur Tetap</th>
                        <th>Logo Donatur</th>
                        <th>Jumlah Donasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donaturs as $donatur)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $donatur->nama_donatur }}</td>
                            <td>{{ $donatur->alamat_donatur }}</td>
                            <td>
                                @if ($donatur->donatur_tetap == 1)
                                    <i class="fa fa-check text-success"></i>
                                @else
                                    <i class="fa text-dark"> - </i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($donatur->logo_donatur)
                                    <img src="{{ asset('public/storage/logo_donatur/' . $donatur->logo_donatur) }}" width="60">
                                @endif

                            </td>


                            <td>Rp {{ number_format($donatur->jumlah_donasi) }}</td>
                            <td>
                                <a href="{{ route('donatur.edit', $donatur) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('donatur.destroy', $donatur) }}" method="POST"
                                    style="display:inline-block;">
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
