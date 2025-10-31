@extends('layouts/app')


@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-university   mr-2"></i>
        {{ $title }}

    </h1>

    <div class="card">


        <div class="card-header d-flex flex-wrap justify-content-between">

        </div>


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Id Pelanggan</th>
                        <th>Nama Masjid</th>
                        <th>Nomor Token Listrik</th>
                        <th>Harga Token listrik</th>
                        <th>Status Realisasi</th>
                        <th>
                            <i class="fas fa-cog"></i>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pengajuantoken as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->id_pelanggan }}</td>
                            <td>{{ $item->nama_masjid }}</td>
                            <td>{{ $item->no_token_listrik }}</td>
                            <td>{{ $item->jumlah_realisasi_token }}</td>
                            <td>
                                @if ($item->status_realisasi == 1)
                                    <i class="fa fa-check text-success"></i> {{-- Icon checklist --}}
                                @else
                                    <i class="fa fa-hourglass-half text-warning"></i> {{-- Icon waiting --}}
                                @endif
                            </td>



                            <td class="text-center">

                                <a href="{{ route('masjid.show', $item->id_pelanggan) }}" class="btn btn-sm btn-info">
                                    Detail
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <form action="{{ route('histori.import') }}" method="POST" enctype="multipart/form-data" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="file" name="file" class="form-control" required>
                <button type="submit" class="btn btn-primary">Upload & Update</button>
            </div>
        </form>


    </div>
@endsection
