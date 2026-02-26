@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">List Pemasukan</h3>

        <div class="row">
            <!-- Total Donasi -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    TOTAL PEMASUKAN</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                    {{ number_format($totalSemuaDonasi, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Donatur-->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    DONATUR TETAP</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalDonaturTetap }} </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Donatur tidak tetap-->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    PARTISIPAN KEBAIKAN</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalDonaturTidakTetap }} </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <a href="{{ route('donatur.create') }}" class="btn btn-primary mb-3">Tambah Partisipan</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif



        <form method="GET" action="{{ route('donatur.index') }}" class="mb-3">
            <div class="row g-2 align-items-end">
                <div class="col-md-4">
                    <label class="form-label">Filter Type Partisipan</label>
                    <select name="donatur_tetap" class="form-control">
                        <option value="">Semua Partisipan</option>
                        <option value="1" {{ request('donatur_tetap') === '1' ? 'selected' : '' }}>
                            Donatur Tetap
                        </option>
                        <option value="0" {{ request('donatur_tetap') === '0' ? 'selected' : '' }}>
                            Partisipan Kebaikan
                        </option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Terapkan</button>
                </div>

                @if (request()->has('donatur_tetap'))
                    <div class="col-md-2">
                        <a href="{{ route('donatur.index') }}" class="btn btn-secondary w-100">
                            Reset
                        </a>
                    </div>
                @endif
            </div>
        </form>




        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama Partisipan</th>
                        <th>Alamat Partisipan</th>
                        <th>Status Partisipan </th>
                        <th>Logo Partisipan</th>
                        <th>Alamat Website</th>
                        <th>Jumlah Donasi</th>
                        <th>Edit Donasi</th>
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
                                    <span class="badge bg-success text-white">Donatur Tetap</span>
                                @endif
                                @if ($donatur->donatur_tetap == 0)
                                    <span class="badge bg-warning">Partisipan Kebaikan</span>
                                @endif

                            </td>
                            <td class="text-center">
                                @if ($donatur->logo_donatur)
                                    <img src="{{ asset('public/storage/logo_donatur/' . $donatur->logo_donatur) }}"
                                        width="60">
                                @endif
                            </td>
                            <td>{{ $donatur->web_address }}</td>
                            <td>Rp {{ number_format($donatur->totalDonasi(), 0, ',', '.') }}</td>

                            <td>
                                @if ($donatur->donatur_tetap == 1)
                                    <a href="{{ route('donatur.show', $donatur) }}" class="btn btn-sm btn-info">
                                        Edit Donasi
                                    </a>
                                @else
                                    <span class="text-muted">_______</span>
                                @endif
                            </td>


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

            <div class="alert alert-success">
                <strong>Total Semua Donasi:</strong>
                Rp {{ number_format($totalSemuaDonasi, 0, ',', '.') }}
            </div>

            {{ $donaturs->links() }}
        </div>
    @endsection
