@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Detail Pelanggan: {{ $masjid->nama_pelanggan }}
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID Pelanggan</th>
                            <td>{{ $masjid->id_pelanggan }}</td>
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
                                        <img src="{{ asset('storage/foto_masjid/' . $masjid->foto_masjid) }}"
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
                                        <img src="{{ asset('storage/foto_meteran_listrik/' . $masjid->foto_meteran_listrik) }}"
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

                        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Kembali</a>

                    </tbody>
                </table>

              <div class="text-center">        @if($masjid->disetujui != 1)
    <form action="{{ route('masjid.setujui', $masjid->id_pelanggan) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success ">Setujui</button>
</form>

@else
    <span class="badge bg-success" style="color: rgb(255, 255, 255); font-size: 18px; padding: 10px 20px;">
    Sudah Disetujui
</span>


@endif</div>  
   
<hr>


<!-- Tombol Request Token -->
@if (!$adaRequestBelumRealisasi)
    <button class="btn btn-primary mb-3" id="btnRequestToken">Request Token</button>
@else
    <button class="btn btn-secondary mb-3" disabled>Menunggu Realisasi...</button>
@endif

<!-- Form Request Token -->
<div id="formRequestToken" class="card p-3 mb-3" style="display: none;">
    <form action="{{ route('masjid.requestToken', $masjid->id_pelanggan) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="jumlah_request_token" class="form-label">Jumlah Token (Rp)</label>
            <input type="number" name="jumlah_request_token" id="jumlah_request_token" class="form-control" required min="1">
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary me-2" id="btnBatalRequest">Batal</button>
            <button type="submit" class="btn btn-success">Kirim Request</button>
        </div>
    </form>
</div>

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


<!-- Form Realisasi Token -->
<div id="formRealisasiToken" class="card p-3 mb-3" style="display: none;">
    <form action="{{ route('masjid.realisasiToken', $masjid->id_pelanggan) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="jumlah_realisasi_token" class="form-label">Jumlah Realisasi Token (Rp)</label>
            <input type="number" name="jumlah_realisasi_token" id="jumlah_realisasi_token" class="form-control" required min="1">
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary me-2" id="btnBatalRealisasi">Batal</button>
            <button type="submit" class="btn btn-success">Simpan Realisasi</button>
        </div>
    </form>
</div>

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







<h4 class="mt-4">Histori Permintaan & Realisasi Token</h4>

@if ($historiBayar->isEmpty())
    <p class="text-muted">Belum ada histori permintaan token.</p>
@else
    <table class="table table-bordered mt-3">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Tanggal Request Token</th>
                <th>Jumlah Request Token</th>
                <th>Tanggal Realisasi Token</th>
                <th>Jumlah Realisasi Token</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historiBayar as $index => $bayar)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($bayar->tgl_request_token)
                            {{ \Carbon\Carbon::parse($bayar->tgl_request_token)->format('d/m/Y') }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if($bayar->jumlah_request_token)
                            Rp {{ number_format($bayar->jumlah_request_token, 0, ',', '.') }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if($bayar->tgl_realisasi_token)
                            {{ \Carbon\Carbon::parse($bayar->tgl_realisasi_token)->format('d/m/Y') }}
                        @else
                            <span class="text-muted">Belum direalisasikan</span>
                        @endif
                    </td>
                    <td>
                        @if($bayar->jumlah_realisasi_token)
                            Rp {{ number_format($bayar->jumlah_realisasi_token, 0, ',', '.') }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

               
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
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
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
