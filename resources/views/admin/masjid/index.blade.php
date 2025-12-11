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

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5>Status Masjid</h5>
                        <select id="filterStatus" class="form-select form-select-sm" style="width: 200px;">
                            <option value="">Tampilkan Semua</option>
                            <option value="1">Disetujui</option>
                            <option value="0" selected >Belum Disetujui</option>

                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5>Jumlah Pengajuan</h5>
                        <select name="filter_pengajuan" class="form-select form-select-sm" style="width: 200px;">

                            <option value="Semua" {{ request('filter_pengajuan') == 'Semua' ? 'selected' : '' }}>Semua
                            </option>
                            <option value="0" {{ request('filter_pengajuan') == '0' ? 'selected' : '' }}>Belum Pernah
                                (0)</option>
                            <option value="1" {{ request('filter_pengajuan') == '1' ? 'selected' : '' }}>Sudah Pernah
                                (≥1)</option>

                        </select>
                    </div>
                </div>

                <div>
                    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

                    <a href="{{ url('/export/masjids') }}" class="btn btn-sm btn-success">
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
                    <a href="#" class="btn btn-sm btn-danger">
                        <i class="fas fa-file-pdf mr-2"></i>
                        PDF
                    </a>
                </div>
            @endif

        </div>


        @if (Auth::check() && Auth::user()->jabatan != 'User')
            {{-- =======================
        TABEL UNTUK ADMIN
    ======================== --}}
    
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
                            <th>Aksi</th>
                            <th>Pengajuan</th>
                            <th>Tgl Daftar</th>
                            {{-- <th>Koordinat</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($masjid as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->id_pelanggan }}</td>
                                <td>{{ $item->nama_pelanggan }}</td>
                                <td>{{ $item->nama_masjid }}</td>
                                <td>{{ $item->nama_ketua_dkm }}</td>
                                <td>{{ $item->telp_ketua_dkm }}</td>
                                <td>{{ $item->penerima_informasi }}</td>
                                <td>
                                    @if ($item->disetujui)
                                        <i class="fa fa-check text-success"></i>
                                    @else
                                        <i class="fa fa-hourglass-half text-warning"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('masjid.show', $item->id_pelanggan) }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                </td>
                                <td>{{ $item->total_pengajuan }}</td>
                                <td>{{ $item->created_at }}</td>
                                {{-- <td>{{ $item->map_lokasi_masjid }}</td> --}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            {{-- =======================
        CARD ELEGAN UNTUK USER
    ======================== --}}
            @php $item = $masjid->first(); @endphp

            <div class="row justify-content-center mt-4">
                <div class="col-md-7">

                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-header bg-white text-dark py-3 rounded-top-4">
                            <h4 class="m-0">
                                <i class="fa fa-mosque me-2"></i> Profil Singkat Masjid Anda
                            </h4>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center my-3">
                            <a href="{{ route('masjid.show', $item->id_pelanggan) }}"
                                class="btn btn-primary w-50 py-3 text-center">
                                <i class="me-2"></i> PENGAJUAN TOKEN
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="mb-3">
                                <label class="fw-bold text-secondary">ID Pelanggan</label>
                                <div class="fs-5"><b>{{ $item->id_pelanggan }}</b></div>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Nama Pelanggan</label>
                                <div class="fs-5"><b>{{ $item->nama_pelanggan }}</b></div>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Nama Masjid</label>
                                <div class="fs-4 fw-bold text-dark"><b>{{ $item->nama_masjid }}</b></div>
                            </div>

                            <hr>

                            <h5 class="text-muted mb-3">Informasi DKM</h5>

                            <div class="mb-2">
                                <label class="fw-bold text-secondary">Ketua DKM</label>
                                <div class="fs-5"><b>{{ $item->nama_ketua_dkm }}</b></div>
                            </div>

                            <div class="mb-2">
                                <label class="fw-bold text-secondary">No HP Ketua DKM</label>
                                <div class="fs-5"><b>{{ $item->telp_ketua_dkm }}</b></div>
                            </div>

                            <div class="mb-3">
                                <label class="fw-bold text-secondary">Penerima Informasi</label>
                                <div class="fs-5"><b>{{ $item->penerima_informasi }}</b></div>
                            </div>
                            <div class="mb-3">
                                <label class="fw-bold text-secondary"></label>
                                @if ($item->testimonial_status)
                                    <span class="badge bg-success text-light px-3 py-2"> ✔ Sudah Memberikan
                                        Testimonial</span>
                                @else
                                    <span class="badge bg-danger text-light px-3 py-2">X Belum Memberikan Testimonial</span>
                                @endif


                            </div>




                            <hr>

                            {{-- <div class="mb-4">
                                <label class="fw-bold text-secondary">Status</label><br>
                                @if ($item->disetujui)
                                    <span class="badge bg-success text-light px-3 py-2">Disetujui ✔</span>
                                @else
                                    <span class="badge bg-warning text-dark px-3 py-2">Menunggu Persetujuan</span>
                                @endif
                            </div> --}}





                        </div>
                    </div>

                </div>
            </div>
        @endif

        <!-- MAP -->
        <div class="mb-3">
            <label for="map">Tandai Lokasi Masjid di Peta</label>
            <div id="map" style="height: 400px; border-radius: 10px;"></div>


        </div>
        <!-- MAP END-->


        <script>
            document.getElementById('filterPengajuan').addEventListener('change', function() {
                console.log("Filter dipilih:", this.value);
                this.form.submit();
            });
        </script>


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

        const table = $('#dataTable').DataTable({
            "pageLength": 10,
            "ordering": true,
        });

        // Fungsi untuk menerapkan kedua filter
        function applyFilters() {

            const selectedStatus = $('#filterStatus').val();
            const selectedPengajuan = $('[name="filter_pengajuan"]').val();

            // Reset custom filter
            $.fn.dataTable.ext.search = [];

            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {

                // === FILTER STATUS (kolom 8) ===
                const statusCell = $(table.row(dataIndex).node()).find('td:eq(7) i');
                let statusValue = "";
                if (statusCell.hasClass('fa-check')) statusValue = "1";
                else if (statusCell.hasClass('fa-hourglass-half')) statusValue = "0";

                const matchStatus = (selectedStatus === "" || statusValue === selectedStatus);

                // === FILTER PENGAJUAN (kolom 9 misalnya, sesuaikan!) ===
                const pengajuanCell = $(table.row(dataIndex).node()).find('td:eq(9)').text().trim();
                // Asumsi: angka pengajuan, contoh: "0", "2", "10"
                const jumlahPengajuan = parseInt(pengajuanCell);

                let matchPengajuan = true;
                if (selectedPengajuan === "0") matchPengajuan = jumlahPengajuan === 0;
                if (selectedPengajuan === "1") matchPengajuan = jumlahPengajuan >= 1;
                if (selectedPengajuan === "Semua") matchPengajuan = jumlahPengajuan >= 0;

                // Return true jika kedua filter cocok
                return matchStatus && matchPengajuan;
            });

            // Refresh tabel
            table.draw();
            table.page('first').draw('page');
        }

        // Event kedua filter
        $('#filterStatus').on('change', applyFilters);
        $('[name="filter_pengajuan"]').on('change', applyFilters);

         // === DEFAULT FILTER: Belum Disetujui ===
    applyFilters();

    });
</script>
<script>
    const masjids = @json($masjid);
</script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        // Default map jika tidak ada marker
        var defaultLat = -7.7956;
        var defaultLng = 110.3695;
        var map = L.map('map').setView([defaultLat, defaultLng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var markersGroup = L.featureGroup();

        masjids.forEach(function(item) {

            if (!item.map_lokasi_masjid) return;

            let coords = item.map_lokasi_masjid.split(',');
            let lat = parseFloat(coords[0]);
            let lng = parseFloat(coords[1]);

            if (isNaN(lat) || isNaN(lng)) return;

            // Marker dengan tooltip permanen (selalu tampil)
            let marker = L.marker([lat, lng]).addTo(map);

            marker.bindTooltip(item.nama_masjid, {
                // permanent: true,   // tampil terus
                direction: 'top', // posisi tulisan di atas marker
                className: 'leaflet-tooltip-nama-masjid' // bisa custom CSS
            });

            markersGroup.addLayer(marker);
        });

        if (markersGroup.getLayers().length > 0) {
            map.fitBounds(markersGroup.getBounds());
        }

    });
</script>


{{-- @if (Auth::check() && Auth::user()->jabatan == 'User' && $item->testimonial_status != 1 && $item->total_pengajuan >= 1)
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Terima Kasih Sudah berpartisipasi dalam Program Terangi Beribu Masjid",
                text: "Sebagai bentuk dukungan, berikan testimoni, agar program ini terus berjalan, setelah itu Anda bisa melakukan pengajuan token seperti Biasa",
                icon: "info",
                confirmButtonText: "Berikan Testimonial",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href =
                        "{{ route('testimonial.index', $item->id_pelanggan) }}?open=form";
                }
            });
        });
    </script>
@endif          obink testimonial paksa  --}}  
