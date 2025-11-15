@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Detail Pelanggan: {{ $masjid->nama_pelanggan }}


            </div>

            <div><a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Kembali</a></div>

            {{-- panel aturan --}}

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
                                <b>10 hari (tgl 10, 20 dan 30)</b> setiap bulan</p>

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
            {{-- panel aturan --}}






            <div class="card-body">

                {{-- Tambahkan pembungkus untuk tombol --}}
                <div class="text-center my-4">
                    @if (!$adaRequestBelumRealisasi)
                        <button class="btn btn-success w-100 py-2" id="btnRequestToken">
                            Permintaan Pengisian Token / Pembayaran Listrik
                        </button>
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
                        <div class="d-flex justify-content-end ">
                            <button type="button" class="btn btn-secondary me-2" id="btnBatalRequest">Batal</button>
                            <button type="submit" class="btn btn-success">Kirim Permintaan</button>
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
                <input type="number" name="no_token_listrik" id="no_token_listrik" class="form-control" required
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
                            <small class="text-muted">Harga Token</small><br>
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

    <!-- Card histori Realisasi Token END-->




    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>ID Pelanggan</th>
                    <td>{{ $masjid->id_pelanggan }}</td>

                </tr>
                <tr>
                    <th>Nomor Meteran Listrik</th>
                    <td>{{ $masjid->no_meteran_listrik }}</td>
                </tr>
                <tr>
                    <th>Nama Pelanggan</th>
                    <td>{{ $masjid->nama_pelanggan }}</td>

                </tr>
                <tr>
                    <th>Jenis Bangunan</th>
                    <td>{{ $masjid->jenis_bangunan }}</td>
                </tr>
                <tr>
                    <th>Nama Masjid</th>
                    <td>{{ $masjid->nama_masjid }}</td>
                    <td>
                        <a href="{{ route('masjid.editField', ['id' => $masjid->id_pelanggan, 'field' => 'nama_masjid']) }}"
                            class="btn btn-sm btn-primary">
                            Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Jenis Layanan</th>
                    <td>{{ $masjid->jenis_layanan }}</td>
                </tr>
                <tr>
                    <th>Sesuai ID Masjid</th>
                    <td>{{ $masjid->sesuai_id_masjid }}</td>
                </tr>
                <tr>
                    <th>Alasan ID Berbeda</th>
                    <td>{{ $masjid->alasan_id_berbeda }}</td>
                </tr>
                <tr>
                    <th>Nama Ketua DKM</th>
                    <td>{{ $masjid->nama_ketua_dkm }}</td>
                </tr>
                <tr>
                    <th>No. Telp Ketua DKM</th>
                    <td>{{ $masjid->telp_ketua_dkm }}</td>
                </tr>
                <tr>
                    <th>Penerima Informasi</th>
                    <td>{{ $masjid->penerima_informasi }}</td>
                </tr>
                <tr>
                    <th>Telp Penerima Informasi</th>
                    <td>{{ $masjid->telp_penerima_informasi }}</td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td>{{ $masjid->province->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kota/Kabupaten</th>
                    <td>{{ $masjid->regency->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td>{{ $masjid->district->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kelurahan</th>
                    <td>{{ $masjid->village->name ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Alamat Lengkap</th>
                    <td>{{ $masjid->alamat_lengkap }}</td>
                </tr>
                <tr>
                    <th>Estimasi Biaya</th>
                    <td>Rp {{ number_format($masjid->estimasi_biaya, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Kode Relawan</th>
                    <td>{{ $masjid->kode_relawan }}</td>
                </tr>
                <tr>
                    <th>Pernyataan</th>
                    <td>{{ $masjid->pernyataan }}</td>
                </tr>

                {{-- Foto-foto --}}
                <tr>
                    <th>Foto Masjid</th>
                    <td>
                        <div class="mb-3">
                            @if ($masjid->foto_masjid)
                                <img src="{{ asset('public/storage/foto_masjid/' . $masjid->foto_masjid) }}"
                                    alt="Foto Masjidun" width="300" class="rounded shadow">
                            @else
                                <p class="text-muted">Belum ada foto masjid.</p>
                            @endif
                        </div>
                    </td>

                </tr>
                <tr>
                    <th>Foto Meteran Listrik</th>
                    <td>
                        <div class="mb-3">
                            @if ($masjid->foto_meteran_listrik)
                                <img src="{{ asset('public/storage/foto_meteran_listrik/' . $masjid->foto_meteran_listrik) }}"
                                    alt="Foto Meteran" width="300" class="rounded shadow">
                            @else
                                <p class="text-muted">Belum ada foto meteran.</p>
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Map Lokasi Masjid</th>
                    <td>
                        <div class="mb-3 text-center">
                            <label>Lokasi di Peta:</label>
                            <div id="mapShow" class="map-square mx-auto"></div>
                        </div>
                    </td>
                </tr>

                <td></td>

            </tbody>
        </table>



        <div class="text-center">
            @if ($masjid->disetujui != 1)
                <form action="{{ route('masjid.setujui', $masjid->id_pelanggan) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success ">Setujui</button>
                </form>
            @else
                <span class="badge bg-success" style="color: rgb(255, 255, 255); font-size: 18px; padding: 10px 20px;">
                    Sudah Disetujui
                </span>
            @endif
        </div>




        <hr>




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


    </div>
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
