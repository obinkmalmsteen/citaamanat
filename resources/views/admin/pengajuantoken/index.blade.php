@extends('layouts/app')


@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-university   mr-2"></i>
        {{ $title }}

    </h1>




    <div class="card">


        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <div>
                <!-- Bagian kiri (misal judul atau teks) -->
                <h5 class="mb-0">Histori Pembayaran</h5>
            </div>
            <select id="filterStatus" class="form-select form-select-sm" style="width: 200px;">
                <option value="">Tampilkan Semua</option>
                <option value="1">Terealisasi</option>
                <option value="0">Belum Direalisasi</option>
            </select>

            <div>
                <!-- Bagian kanan (tombol export) -->
                <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

                <a href="#" onclick="confirmAndExport('dataTable', 'histori_bayar')" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i> Excel
                </a>

                <script>
                    function confirmAndExport(tableID, filename = '') {
                        if (confirm(
                                "Anda hendak mendownload isi tabel ini.\nApakah betul? Tekan 'OK' untuk melanjutkan atau 'Cancel' untuk membatalkan."
                            )) {
                            var wb = XLSX.utils.table_to_book(document.getElementById(tableID), {
                                sheet: "Sheet1"
                            });
                            XLSX.writeFile(wb, (filename || 'data') + ".xlsx");
                        } else {
                            alert("Proses dibatalkan.");
                        }
                    }
                </script>
            </div>




        </div>



        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        <th>
                            <i class="fas fa-cog"></i>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pengajuantoken as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center copyable">{{ $item->id_pelanggan }}</td>

                            <td>{{ $item->nama_masjid }}</td>
                            <td>{{ $item->nama_kota }}</td>
                            <td>{{ $item->nama_provinsi }}</td>
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
        // Inisialisasi DataTable
        const table = $('#dataTable').DataTable({
            "pageLength": 10, // jumlah baris per halaman (opsional)
            "ordering": false, // nonaktifkan sorting jika tidak perlu
        });

        // Tambahkan event untuk filter
        $('#filterStatus').on('change', function() {
            const selected = $(this).val();

            // Gunakan custom filter dari DataTables
            $.fn.dataTable.ext.search = [];
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                const statusCell = $(table.row(dataIndex).node()).find(
                'td:eq(7) i'); // kolom ke-8
                let statusValue = "";

                if (statusCell.hasClass('fa-check')) statusValue = "1";
                else if (statusCell.hasClass('fa-hourglass-half')) statusValue = "0";

                return selected === "" || statusValue === selected;
            });

            // Refresh tabel dan pindah ke halaman pertama
            table.draw();
            table.page('first').draw('page');
        });
    });
</script>
