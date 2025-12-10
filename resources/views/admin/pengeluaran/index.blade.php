@extends('layouts.app')

@section('content')


<div class="row">
        <!-- Total Donasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                TOTAL DANA</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($totalSemuaDonasi, 0, ',', '.') }}</div>
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
                                PENGELUARAN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> Rp {{ number_format($totalSemuaPengeluaran, 0, ',', '.') }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- Sisa saldo-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                SISA SALDO</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> Rp {{ number_format($sisaSaldo, 0, ',', '.') }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      

    </div>
<div class="d-flex justify-content-between mb-3">
    <h3>Data Pengeluaran Dana</h3>

   


    <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary">+ Tambah Pengeluaran</a>
</div>
 
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

 <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
        <tr>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Jumlah</th>
            <th>Bukti</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{ $row->tanggal }}</td>
            <td>{{ ucfirst(str_replace('_',' ', $row->kategori)) }}</td>
            <td>{{ $row->deskripsi }}</td>
            <td>Rp {{ number_format($row->jumlah,0,',','.') }}</td>
            <td>
                @if($row->bukti)
                <img src="{{ asset('storage/'.$row->bukti) }}" width="80">
                @endif
            </td>
            <td>
                <a href="{{ route('pengeluaran.edit',$row->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('pengeluaran.destroy',$row->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
{{ $data->links() }}

@endsection
