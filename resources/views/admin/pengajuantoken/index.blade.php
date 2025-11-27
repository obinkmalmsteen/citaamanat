@extends('layouts/app')


@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-university   mr-2"></i>
        {{ $title }}

    </h1>




    <div class="card">

<div>
                <!-- Bagian kiri (misal judul atau teks) -->
                <h5 class="mb-0">Histori Pembayaran</h5>
            </div>
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            

            <div class="row mb-4 ">
                <div class="col-md-4 ">
                    <label>Dari Tanggal:</label>
                    <input type="date" id="minDate" class="form-control">
                </div>

                <div class="col-md-4">
                    <label>Sampai Tanggal:</label>
                    <input type="date" id="maxDate" class="form-control">
                </div>

                <div class="col-md-3 mt-2">
                    <!-- type="button" penting supaya tidak submit form -->
                    <button id="resetDate" type="button" class="btn btn-primary btn-sm">Reset Tanggal</button>
                </div>
            </div>




<div class="col-md-2">
    <label>Status:</label>
            <select id="filterStatus" class="form-select form-select-sm form-control" style="width: 200px;">
                <option value="" {{ request('status') === null ? '' : '' }}>Tampilkan Semua</option>
                <option value="1" {{ request('status') == '1' ? '' : '' }}>Terealisasi</option>
                <option value="0" {{ request('status') == '0' || request('status') === null ? 'selected' : '' }}>Belum
                    Direalisasi</option>
            </select>
            </div>

<div class="col-md-2">
    <label>Jenis Layanan:</label>
    <select id="filterJenisLayanan" class="form-control">
        <option value="">Semua</option>
        <option value="PraBayar">Prabayar</option>
        <option value="PascaBayar">Pascabayar</option>
    </select>
</div>


            <div>
                <!-- Bagian kanan (tombol export) -->
                <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
                <a href="#" id="btnExport" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i> Download Data Ke Excel
                </a>


                <script>
                    document.getElementById('btnExport').addEventListener('click', function(e) {
                        e.preventDefault();
                        var status = document.getElementById('filterStatus').value;
                        // encodeURIComponent jaga aman jika ada karakter aneh
                        var url = "{{ route('masjid.export') }}" + (status !== '' ? '?status=' + encodeURIComponent(status) :
                            '');
                        window.location.href = url;
                    });
                </script>


            </div>

        </div>

<style>
    #dataTable {
        font-size: 13px;
        color:  rgb(43, 42, 42) ;
    }

    /* No */
#dataTable th:nth-child(1),
#dataTable td:nth-child(1) {
    width: 35px;     /* contoh */
    text-align: center;
}

/* ID Pelanggan */
#dataTable th:nth-child(2),
#dataTable td:nth-child(2) {
    width: 100px;
}

/* Nama Masjid */
#dataTable th:nth-child(3),
#dataTable td:nth-child(3) {
    width: 150px;
}

/* Kota */
#dataTable th:nth-child(4),
#dataTable td:nth-child(4) {
    width: 100px;
}

/* Provinsi */
#dataTable th:nth-child(5),
#dataTable td:nth-child(5) {
    width: 100px;
}

/* Nomor Token */
#dataTable th:nth-child(6),
#dataTable td:nth-child(6) {
    width: 160px;
}

/* Harga */
#dataTable th:nth-child(7),
#dataTable td:nth-child(7) {
    width: 100px;
}

/* Status */
#dataTable th:nth-child(8),
#dataTable td:nth-child(8) {
    width: 40px;
    text-align: center;
}

/* Tanggal */
#dataTable th:nth-child(9),
#dataTable td:nth-child(9) {
    width: 100px;
}

/* Tombol Aksi */
#dataTable th:nth-child(10),
#dataTable td:nth-child(10) {
    width: 80px;
    text-align: center;
}

</style>


        <div class="table-responsive">
            <table class="table table-bordered table-sm small-text"id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Id Pelanggan</th>
                        <th>Nama Masjid</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Nomor Token Listrik</th>
                        <th>Harga Token listrik</th>
                        <th>Status Realisasi</th>
                        <th>Tgl Realisasi</th>
                        <th>No Telepon</th>
                        <th>Jenis Layanan</th>
                        <th>
                            <i class="fas fa-cog"></i>
                        </th>
                        <th>Kirim Pesan</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pengajuantoken as $item)
                        <tr>
                            <td class="text-center" style="vertical-align: middle;"> {{ $loop->iteration }}</td>
                            <td class="text-center copyable" style="vertical-align: middle ;">{{ $item->id_pelanggan }}</td>

                            <td class="text-center" style="vertical-align: middle;"> {{ $item->nama_masjid }}</td>
                            <td class="text-center" style="vertical-align: middle;"> {{ $item->nama_kota }}</td>
                            <td class="text-center" style="vertical-align: middle;"> {{ $item->nama_provinsi }}</td>
                            <td class="text-center" style="vertical-align: middle;"> {{ $item->no_token_listrik }}</td>
                            <td class="text-center" style="vertical-align: middle;">    


                                    @if ($item->jumlah_realisasi_token)
                                        Rp {{ number_format($item->jumlah_realisasi_token, 0, ',', '.') }}
                                    @else
                                        -
                                    @endif

</td>

                           <td class="text-center" style="vertical-align: middle;"> 
                                @if ($item->status_realisasi == 1)
                                    <i class="fa fa-check text-success" style="transform: scale(1.6);"></i>
 {{-- Icon checklist --}}
                                @else
                                    <i class="fa fa-hourglass-half text-warning " style="transform: scale(1.6);"></i> {{-- Icon waiting --}}
                                @endif
                            </td>

                            <td class="text-center" style="vertical-align: middle;"> {{ $item->tgl_realisasi_token }}</td>
                            <td class="text-center" style="vertical-align: middle;"> {{ $item->telp_ketua_dkm }}</td>
                            <td class="text-center" style="vertical-align: middle;"> {{ $item->jenis_layanan }}</td>
                            <td class="text-center" style="vertical-align: middle;"> 

                                <a href="{{ route('masjid.show', $item->id_pelanggan) }}" class="btn btn-sm btn-info">
                                    Detail
                                </a>
                            </td>
                            <td class="text-center">
@if($item->pesan_terkirim_at)
    <button class="btn btn-secondary btn-sm" disabled>
        Pesan Terkirim
    </button>
@else
    <a href="{{ route('kirim.pesan', $item->id_pelanggan) }}"
       class="btn btn-success btn-sm">
       Kirim WA
    </a>
@endif


                              
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

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Cari semua cell (td) di kolom ID Pelanggan
        document.querySelectorAll("#dataTable td.copyable").forEach(td => {
            td.addEventListener("dblclick", function() {
                const textToCopy = td.innerText.trim();

                // Buat sementara elemen textarea untuk copy
                const textarea = document.createElement("textarea");
                textarea.value = textToCopy;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand("copy");
                document.body.removeChild(textarea);

                // Umpan balik kecil (highlight sementara)
                td.style.backgroundColor = "#d1e7dd"; // hijau lembut
                td.style.transition = "background-color 0.4s";
                setTimeout(() => td.style.backgroundColor = "", 800);
            });
        });
    });
</script>

<script>
$(document).ready(function() {

    const table = $('#dataTable').DataTable({
        pageLength: 20,
        ordering: false
    });

    // ============================
    // KONVERSI FORMAT TANGGAL
    // ============================
    function convertToYMD(dateStr) {
        if (!dateStr) return "";
        if (/^\d{4}-\d{2}-\d{2}$/.test(dateStr)) return dateStr;

        const parts = dateStr.includes('-') ? dateStr.split('-') : dateStr.split('/');
        if (parts.length !== 3) return "";
        return `${parts[2]}-${parts[1].padStart(2, '0')}-${parts[0].padStart(2, '0')}`;
    }

    // ============================
    // FILTER GABUNGAN (tanggal + status + layanan)
    // ============================
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {

        // Nilai dari input
        const min = $('#minDate').val();
        const max = $('#maxDate').val();
        const statusSelected = $('#filterStatus').val();
        const layananSelected = $('#filterJenisLayanan').val().toLowerCase();

        const row = $(table.row(dataIndex).node());

        // -------- FILTER TANGGAL ----------
        let colDate = row.find('td:eq(8)').text().trim();
        colDate = convertToYMD(colDate);

        if (min && colDate < min) return false;
        if (max && colDate > max) return false;

        // -------- FILTER STATUS ----------
        const statusCell = row.find('td:eq(7) i');
        let statusValue = "";

        if (statusCell.hasClass('fa-check')) statusValue = "1";
        else if (statusCell.hasClass('fa-hourglass-half')) statusValue = "0";

        if (statusSelected !== "" && statusValue !== statusSelected) {
            return false;
        }

        // -------- FILTER JENIS LAYANAN ----------
        // Kolom ke-10 sesuai thead Anda
        const jenisText = row.find('td:eq(10)').text().trim().toLowerCase();

        if (layananSelected !== "" && jenisText !== layananSelected) {
            return false;
        }

        return true;
    });

    // ============================
    // EVENT FILTER
    // ============================
    $('#minDate, #maxDate').on('change', function () {
        table.draw();
    });

    $('#filterStatus').on('change', function () {
        table.draw();
        table.page('first').draw('page');
    });

    $('#filterJenisLayanan').on('change', function () {
        table.draw();
        table.page('first').draw('page');
    });

    // ============================
    // RESET TANGGAL
    // ============================
    $('#resetDate').on('click', function(e) {
        e.preventDefault();
        $('#minDate').val('');
        $('#maxDate').val('');
        table.page('first').draw('page');
        table.draw();
    });

});
</script>


