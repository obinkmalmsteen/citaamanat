@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Detail Pelanggan: {{ $masjid->nama_pelanggan }}


            </div>

            <div><a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Kembali</a></div>

            {{-- panel aturan start --}}

            <div class="row justify-content-center mt-4">
                <div class="col-md-8">

                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-body p-4">
                            <h4>SOP PENGAJUAN & REALISASI TOKEN LISTRIK</h4>
                            <p><b>1. Frekuensi Pengisian</b><br> Token Listrik (PraBayar maupun PascaBayar) diberikan <b>1
                                    Kali Setiap Bulan.</b></p>

                            <p><b>2. Kewajiban DKM</b><br>DKM Wajib melakukan pengajuan token setiap bulan sebagai bentuk
                                konfirmasi bahwa DKM masih Aktif.</p>

                            <p><b>3. Jadwal Realisasi</b><br>Kami melakukan pembelian token secara berkala dan kolektif per
                                <b>10 hari (tgl 10, 20 dan 30)</b> setiap bulan
                            </p>

                            <p style="color: #d9534f; font-weight: bold;"> HARAP MENJADI PERHATIAN! <br>Demi Kelancaran Data
                                untuk Proses Realisasi, maka diharapkan untuk membuat pengajuan paling dekat berjarak 3 hari
                                (H-3) sebelum jadwal realisasi, (Jangan terlalu mepet dengan tgl-tgl tersebut).</p>
                            <p>4. Jika sudah mengajukan permintaan token diharapkan Cek secara berkala ke akun anda, dan
                                segera isikan token jika sudah tersedia, karena jika tidak segera dipakai maka token itu
                                akan Hangus dan jadi Mubadzir.</p>
                        </div>
                    </div>

                </div>
            </div>
            {{-- panel aturan end--}}

            <div class="card-body">

                {{-- Tambahkan pembungkus untuk tombol --}}
                <div class="text-center my-4">
                    @if (!$adaRequestBelumRealisasi)
                    <div class="d-flex justify-content-center my-3">
                        <button class="btn btn-success w-50 py-4" id="btnRequestToken">
                            PENGAJUAN TOKEN / PEMBAYARAN LISTRIK
                        </button>
                        </div>
                    @else
                        <div id="progressContainer">
                            <div class="progress" style="height: 40px;">
                                <div id="progressBar" class="progress-bar bg-secondary" role="progressbar"
                                    style="width: 0%;">
                                </div>
                            </div>
                            <small id="progressText" class="text-muted d-block mt-2 text-center"></small>
                        </div>
                    @endif
                </div>

                <input type="hidden" id="tgl_request_token" value="{{ $tglRequestTokenTerakhir }}">



                <!-- Form Request Token -->

                <div id="formRequestToken" class="card p-3 mb-3" style="display: none;">
                    <form action="{{ route('masjid.requestToken', $masjid->id_pelanggan) }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-center ">
                            <button type="button" class="btn btn-secondary w-25 py-4 me-2" id="btnBatalRequest">Batal</button>
                            <button type="submit" class="btn btn-success w-25 py-2">Kirim Permintaan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <input type="hidden" id="tgl_request_token" value="{{ $tglRequestTokenTerakhir }}">


    <div class="text-center my-4">
        <!-- Tombol Realisasi Token -->
        @if ($adaRequestBelumRealisasi)
            @if (Auth::user()->jabatan === 'Admin' || Auth::user()->jabatan === 'Karyawan')
                <!-- Hanya Admin dan Karyawan yang bisa klik -->
                <button class="btn btn-warning mb-3" id="btnRealisasiToken">Realisasikan Token</button>
            @else
                <!-- User biasa tidak bisa klik -->
                <button class="btn btn-secondary mb-3" disabled>Tunggu Proses Realisasi...</button>
            @endif
        @endif

    </div>


    <!-- Form Realisasi Token -->
    <div id="formRealisasiToken" class="card p-3 mb-3" style="display: none;">
        <form action="{{ route('masjid.realisasiToken', $masjid->id_pelanggan) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="no_token_listrik" class="form-label">Nomor Token Listrik</label>
                <input type="text" name="no_token_listrik" id="no_token_listrik" class="form-control" required
                    min="1">
            </div>
            <div class="mb-3">
                <label for="jumlah_realisasi_token" class="form-label">Harga Token Listrik</label>
                <input type="number" name="jumlah_realisasi_token" id="jumlah_realisasi_token" class="form-control"
                    required min="1">
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" id="btnBatalRealisasi">Batal</button>
                <button type="submit" class="btn btn-success">Simpan Realisasi</button>
            </div>
        </form>
    </div>


    </div>

    <div class="card-body">

        <!-- Card histori Realisasi Token START-->

        <h4 class="mt-4">Histori Permintaan & Realisasi Token</h4>

        @if ($historiBayar->isEmpty())
            <p class="text-muted">Belum ada histori permintaan token.</p>
        @else
            <style>
                .history-slider {
                    display: flex;
                    overflow-x: auto;
                    gap: 16px;
                    padding-bottom: 10px;
                    scroll-snap-type: x mandatory;
                }

                .history-card {
                    min-width: 320px;
                    flex: 0 0 auto;
                    scroll-snap-align: start;
                }

                .history-slider::-webkit-scrollbar {
                    height: 6px;
                }

                .history-slider::-webkit-scrollbar-thumb {
                    background: #0d6efd;
                    border-radius: 10px;
                }
            </style>
            <style>
                .profile-item {
                    display: flex;
                    align-items: center;
                    gap: 12px;
                    padding: 4px 0;
                }

                .profile-item .icon {
                    font-size: 26px;
                    color: #0d6efd;
                    width: 32px;
                    text-align: center;
                }

                .profile-item label {
                    font-size: 13px;
                    font-weight: 700;
                    color: #6c757d;
                    margin-bottom: 2px;
                    letter-spacing: .3px;
                    text-transform: uppercase;
                }

                .profile-item .value {
                    font-size: 17px;
                    font-weight: 600;
                    color: #222;
                }

                .info {
                    flex: 1;
                }

                hr {
                    margin: 8px 0;
                    opacity: .15;
                }

                .map-square {
                    width: 100%;
                    height: 320px;
                }
            </style>

            <div class="history-slider mt-3">

                @foreach ($historiBayar as $index => $bayar)
                    <div class="card shadow history-card rounded-4">

                        @php
                            $nomor = $historiBayar->count() - $index;

                            // Tentukan warna bar
                            $warnaHeader =
                                $bayar->status_realisasi == 1
                                    ? 'bg-success' // Hijau
                                    : 'bg-warning text-dark'; // Oranye
                        @endphp

                        <div class="card-header {{ $warnaHeader }} text-white rounded-top-4">
                            <strong>Permintaan Token Ke {{ $nomor }}</strong>
                        </div>


                        <div class="card-body">

                            <div class="mb-2">
                                <small class="text-muted">"Silahkan isikan nomor ini jika sudah tersedia"</small><br>
                                <small class="text-muted">Nomor Token</small><br>
                                <span class="fw-semibold">
                                    <h5><b>{{ $bayar->no_token_listrik ? trim(chunk_split($bayar->no_token_listrik, 4, ' ')) : '-' }}</b>
                                    </h5>
                                </span>
                            </div>


                            <hr>
                            <div class="mb-2">
                                <small class="text-muted">Tanggal Realisasi</small><br>
                                <span class="fw-semibold">
                                    @if ($bayar->tgl_realisasi_token)
                                        {{ \Carbon\Carbon::parse($bayar->tgl_realisasi_token)->format('d/m/Y') }}
                                    @else
                                        <span class="text-warning"><b>Belum direalisasikan</b></span>
                                    @endif
                                </span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">Tanggal Request</small><br>
                                <span class="fw-semibold">
                                    @if ($bayar->tgl_request_token)
                                        {{ \Carbon\Carbon::parse($bayar->tgl_request_token)->format('d/m/Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">ID Pelanggan</small><br>
                                <span class="fw-semibold">{{ $bayar->id_pelanggan ?? '-' }}</span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">Nomor Meteran</small><br>
                                <span class="fw-semibold">{{ $bayar->no_meteran_listrik ?? '-' }}</span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">Nama Masjid</small><br>
                                <span class="fw-semibold">{{ $bayar->nama_masjid ?? '-' }}</span>
                            </div>

                            <hr>

                            <div class="mb-2">
                                <small class="text-muted">Nominal Token</small><br>
                                <span class="fw-semibold">
                                    @if ($bayar->jumlah_realisasi_token)
                                        Rp {{ number_format($bayar->jumlah_realisasi_token, 0, ',', '.') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>

                            <div class="mt-3">
                                @if ($bayar->status_realisasi == 1)
                                    <span class="badge bg-success text-light px-3 py-2">
                                        <i class="fa fa-check text-light"></i> Selesai
                                    </span>
                                @else
                                    <span class="badge bg-warning text-dark px-3 py-2">
                                        <i class="fa fa-hourglass-half text-dark"></i> Menunggu
                                    </span>
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        @endif
    </div>

    <!-- Card histori Realisasi Token END-->



    <!-- Card data masjid lengkap start-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <div class="container py-4">
        <div class="card shadow border-0 rounded-4 p-4">


            <!-- HEADER -->
            <div class="text-center mb-4">
                <div class="text-center">
                    @if ($masjid->disetujui != 1)
                        <form action="{{ route('masjid.setujui', $masjid->id_pelanggan) }}" method="POST">
                            @csrf
                            <i>Masjid belum di verifikasi. silahkan tekan tombol untuk memverifikasi </i>
                            <hr>
                            <button type="submit" class="btn btn-warning ">Setujui / Verifikasi</button>
                        </form>
                    @else
                        <span class="badge bg-success w-100 py-2"
                            style="color: rgb(255, 255, 255); font-size: 18px; padding: 10px 20px;">
                            Sudah Terverifikasi
                        </span>
                    @endif
                </div>
                <i class=""></i> {{ $masjid->jenis_bangunan }}
                <h3 class="fw-bold">{{ $masjid->nama_masjid }}</h3>
                <p class="text-muted mb-1">
                    ID Pelanggan {{ $masjid->id_pelanggan }}
                </p>

            </div>

            <hr>

            <!-- PROFILE GRID -->
            <div class="row g-4">

                <!-- KOLOM KIRI -->
                <div class="col-md-6">

                    @php
                        $leftItems = [
                            ['icon' => 'bi-person', 'label' => 'Nama Pelanggan', 'value' => $masjid->nama_pelanggan],
                            [
                                'icon' => 'bi-lightning-charge',
                                'label' => 'Jenis Layanan',
                                'value' => $masjid->jenis_layanan,
                            ],
                            [
                                'icon' => 'bi-people',
                                'label' => 'Nama Ketua DKM',
                                'value' => [
                                    'nama' => $masjid->nama_ketua_dkm,
                                    'telp' => $masjid->telp_ketua_dkm,
                                ],
                            ],
                            [
                                'icon' => 'bi-people',
                                'label' => 'Nama Penerima Informasi',
                                'value' => [
                                    'nama' => $masjid->penerima_informasi,
                                    'telp' => $masjid->telp_penerima_informasi,
                                ],
                            ],

                            [
                                'icon' => 'bi-cash-stack',
                                'label' => 'Estimasi Biaya',
                                'value' => 'Rp ' . number_format($masjid->estimasi_biaya, 0, ',', '.'),
                            ],
                            ['icon' => 'bi-shield-check', 'label' => 'Kode Relawan', 'value' => $masjid->kode_relawan],
                        ];
                    @endphp

                    @foreach ($leftItems as $item)
                        <div class="profile-item">
                            <i class="bi {{ $item['icon'] }} icon"></i>
                            <div class="w-100">
                                <div class="text-muted small">{{ $item['label'] }}</div>

                                @if (is_array($item['value']))
                                    <div class="row mt-1">

                                        <div class="col-md-12 fw-semibold">{{ $item['value']['nama'] }}
                                            <i class="bi-telephone {{ $item['icon'] }} icon"> </i>
                                            : {{ $item['value']['telp'] }}
                                        </div>

                                    </div>
                                @else
                                    <div class="fw-semibold mt-1">{{ $item['value'] }}</div>
                                @endif
                            </div>
                        </div>
                        <hr>
                    @endforeach

                </div>

                <!-- KOLOM KANAN -->
                <div class="col-md-6">

                    @php
                        $rightItems = [
                            ['icon' => 'bi-geo-alt', 'label' => 'Provinsi', 'value' => $masjid->province->name ?? '-'],
                            [
                                'icon' => 'bi-geo',
                                'label' => 'Kota / Kabupaten',
                                'value' => $masjid->regency->name ?? '-',
                            ],
                            ['icon' => 'bi-pin-map', 'label' => 'Kecamatan', 'value' => $masjid->district->name ?? '-'],
                            ['icon' => 'bi-map', 'label' => 'Kelurahan', 'value' => $masjid->village->name ?? '-'],
                            [
                                'icon' => 'bi-house-door',
                                'label' => 'Alamat Lengkap',
                                'value' => $masjid->alamat_lengkap,
                            ],
                            ['icon' => 'bi-card-text', 'label' => 'Pernyataan', 'value' => $masjid->pernyataan],
                             ['icon' => 'bi-card-text', 'label' => 'Koordinat Map', 'value' => $masjid->map_lokasi_masjid],
                        ];
                    @endphp

                    @foreach ($rightItems as $item)
                        <div class="profile-item">
                            <i class="bi {{ $item['icon'] }} icon"></i>
                            <div class="info">
                                <label>{{ $item['label'] }}</label>
                                <div class="value">{{ $item['value'] }}</div>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                </div>
            </div>

            <!-- FOTO -->
            <h5 class="fw-bold mt-4 mb-3">
                <i class="bi bi-images"></i> Foto Dokumentasi
            </h5>
            <div class="row g-4">
                <div class="col-md-6 text-center">
                    <label class="fw-bold d-block mb-2">Foto Masjid</label>
                    @if ($masjid->foto_masjid)
                        <img src="{{ asset('public/storage/foto_masjid/' . $masjid->foto_masjid) }}"
                            class="img-fluid rounded shadow">
                    @else
                        <p class="text-muted">Belum ada foto.</p>
                    @endif
                </div>
                <div class="col-md-6 text-center">
                    <label class="fw-bold d-block mb-2">Foto Meteran</label>
                    @if ($masjid->foto_meteran_listrik)
                        <img src="{{ asset('public/storage/foto_meteran_listrik/' . $masjid->foto_meteran_listrik) }}"
                            class="img-fluid rounded shadow">
                    @else
                        <p class="text-muted">Belum ada foto.</p>
                    @endif
                </div>
            </div>

            <hr class="my-4">

            <!-- MAP -->
            <div class="text-center">
                <label class="fw-bold d-block mb-3">
                    <i class="bi bi-geo-fill"></i> Lokasi Masjid di Peta
                </label>
                <div id="mapShow" class="map-square rounded shadow"></div>
            </div>
            <hr>
            <hr>
            <a href="{{ route('masjid.editFull', $masjid->id_pelanggan) }}" class="btn btn-danger">
                Edit Data
            </a>
        </div>

    </div>

    <!-- Card data masjid END-->

    </div>
    </div>
@endsection
<style>
    .map-square {
        width: 500px;
        height: 400px;
        border-radius: 12px;
        border: 2px solid #ccc;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 500px) {
        .map-square {
            width: 100%;
            height: 300px;
        }
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var coordString = "{{ $masjid->map_lokasi_masjid }}";
        var lat = -7.7956;
        var lng = 110.3695;

        if (coordString && coordString.includes(',')) {
            var parts = coordString.split(',');
            lat = parseFloat(parts[0]);
            lng = parseFloat(parts[1]);
        }

        var map = L.map('mapShow').setView([lat, lng], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);
        L.marker([lat, lng]).addTo(map);
    });
</script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    {{ session()->forget('success') }}

@endif

@if (session('warning'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian',
            text: '{{ session('warning') }}',
            showConfirmButton: true
        });
    </script>
@endif
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btn = document.getElementById("btnRequestToken");
        const tglRequestInput = document.getElementById("tgl_request_token");
        const progressBar = document.getElementById("progressBar");
        const progressText = document.getElementById("progressText");

        const tglStr = tglRequestInput.value;
        if (!tglStr) return;

        const tglTerakhir = new Date(tglStr);
        const hariIni = new Date();

        const bulanTerakhir = tglTerakhir.getMonth();
        const tahunTerakhir = tglTerakhir.getFullYear();

        const bulanSekarang = hariIni.getMonth();
        const tahunSekarang = hariIni.getFullYear();

        // Jika request masih dalam bulan yang sama → tampilkan progress
        if (bulanSekarang === bulanTerakhir && tahunSekarang === tahunTerakhir) {

            if (progressBar) {
                const totalHariBulanIni = new Date(tahunSekarang, bulanSekarang + 1, 0).getDate();
                const hariSekarang = hariIni.getDate();

                const progress = (hariSekarang / totalHariBulanIni) * 100;
                const sisaHari = totalHariBulanIni - hariSekarang;

                progressBar.style.width = progress + "%";
                progressBar.innerHTML = Math.floor(progress) + "%";

                if (progressText) {
                    progressText.innerHTML =
                        `Tombol PERMINTRAAN TOKEN  Akan Aktif Dalam <b>${sisaHari}</b> Hari Lagi (reset pada tanggal 1 bulan depan).`;
                }
            }

            // Jika user klik tombol normal, tetap blok
            if (btn) {
                btn.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Mohon Maaf',
                        text: "Anda telah melakukan permintaan bulan ini. Mohon tunggu hingga bulan depan.",
                        confirmButtonText: 'OK'
                    });
                    return false;

                });

            }
        }
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btnRequest = document.getElementById('btnRequestToken');
        const formRequest = document.getElementById('formRequestToken');
        const btnBatalRequest = document.getElementById('btnBatalRequest');

        const btnRealisasi = document.getElementById('btnRealisasiToken');
        const formRealisasi = document.getElementById('formRealisasiToken');
        const btnBatalRealisasi = document.getElementById('btnBatalRealisasi');

        if (btnRequest) {
            btnRequest.addEventListener('click', () => {
                formRequest.style.display = 'block';
                btnRequest.style.display = 'none';
            });

            btnBatalRequest.addEventListener('click', () => {
                formRequest.style.display = 'none';
                btnRequest.style.display = 'inline-block';
            });
        }

        if (btnRealisasi) {
            btnRealisasi.addEventListener('click', () => {
                formRealisasi.style.display = 'block';
                btnRealisasi.style.display = 'none';
            });

            btnBatalRealisasi.addEventListener('click', () => {
                formRealisasi.style.display = 'none';
                btnRealisasi.style.display = 'inline-block';
            });
        }
    });
</script>
