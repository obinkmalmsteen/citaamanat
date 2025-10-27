@extends('layouts/app')


@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-university   mr-2"></i>
        {{ $title }}

    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <div class="mb-1 mr-2">
                <a href="{{ route('masjidCreate') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data Masjid
                </a>
            </div>
            <div>
                <a href="#" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i>
                    Excel
                </a>
                <a href="#" class="btn btn-sm btn-danger">
                    <i class="fas fa-file-pdf mr-2"></i>
                    PDF
                </a>
            </div>

        </div>


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>ID Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Masjid</th>
                        <th>Ketua DKM</th>
                        <th>No HP Ketua DKM</th>
                        <th>Penerima Informasi</th>
                         <th>Disetujui</th>
                        <th>
                            <i class="fas fa-cog"></i>
                        </th>
                    </tr>
                </thead>

                <tbody>
                   @foreach ($masjid as $item )
                       <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->id_pelanggan }}</td>
                        <td>{{ $item->nama_pelanggan }}</td>
                        <td>{{ $item->nama_masjid }}</td>
                        <td>{{ $item->nama_ketua_dkm }}</td>
                        <td>{{ $item->telp_ketua_dkm }}</td>
                        <td>{{ $item->penerima_informasi }}</td>
                      <td class="text-center">
    <input type="checkbox" class="approve-checkbox"
           data-id="{{ $item->id_pelanggan }}"
           {{ $item->disetujui ? 'checked' : '' }}>
</td>

                        <td class="text-center">
                            
                             <a href="{{ route('masjid.show', $item->id_pelanggan) }}" 
       class="btn btn-sm btn-info">
        Detail
    </a>
                        </td>

                       </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script>
$(document).ready(function() {
    $('.approve-checkbox').on('change', function() {
        var idPelanggan = $(this).data('id');
        var disetujui = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: '/masjid/approve/' + idPelanggan,
            type: 'POST',
            data: {
                disetujui: disetujui,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Status persetujuan diperbarui.');
            },
            error: function() {
                alert('Terjadi kesalahan saat menyimpan status persetujuan.');
            }
        });
    });
});
</script>
