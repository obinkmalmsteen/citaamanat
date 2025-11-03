@extends('layouts/app')


@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-university   mr-2"></i>
        {{ $title }}

    </h1>

    <div class="card">


        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">

            @if (Auth::check() && Auth::user()->jabatan != 'User')
                <div class="mb-1 mr-2">
                    <a href="{{ route('masjidCreate') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Data Masjid
                    </a>
                </div>
                <div>
                    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

                      <a href="#" onclick="confirmAndExport('dataTable', 'masjids')" class="btn btn-sm btn-success">
            <i class="fas fa-file-excel mr-2"></i> Excel
        </a>

        <script>
            function confirmAndExport(tableID, filename = '') {
                if (confirm("Anda hendak mendownload isi tabel ini.\nApakah betul? Tekan 'OK' untuk melanjutkan atau 'Cancel' untuk membatalkan.")) {
                    var wb = XLSX.utils.table_to_book(document.getElementById(tableID), { sheet: "Sheet1" });
                    XLSX.writeFile(wb, (filename || 'data') + ".xlsx");
                } else {
                    alert("Proses dibatalkan.");
                }
            }
        </script>
                    <a href="#" class="btn btn-sm btn-danger">
                        <i class="fas fa-file-pdf mr-2"></i>
                        PDF
                    </a>
                </div>
            @endif

        </div>





        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
<h5>Daftar Masjid</h5>
             <select id="filterStatus" class="form-select form-select-sm" style="width: 200px;">
                <option value="">Tampilkan Semua</option>
                <option value="1">Disetujui</option>
                <option value="0">Belum Disetujui</option>
            </select>
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
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($masjid as $item)
                        <tr data-disetujui="{{ $item->disetujui }}">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->id_pelanggan }}</td>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->nama_masjid }}</td>
                            <td>{{ $item->nama_ketua_dkm }}</td>
                            <td>{{ $item->telp_ketua_dkm }}</td>
                            <td>{{ $item->penerima_informasi }}</td>
                            <td>
                                @if ($item->disetujui == 1)
                                    <i class="fa fa-check text-success"></i>
                                @else
                                    <i class="fa fa-hourglass-half text-warning"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('masjid.show', $item->id_pelanggan) }}"
                                    class="btn btn-sm btn-info">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            document.getElementById('filterDisetujui').addEventListener('change', function() {
                const filter = this.value;
                const rows = document.querySelectorAll('#dataTable tbody tr');
                rows.forEach(row => {
                    const status = row.getAttribute('data-disetujui');
                    if (filter === '' || status === filter) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>




    </div>
@endsection

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
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