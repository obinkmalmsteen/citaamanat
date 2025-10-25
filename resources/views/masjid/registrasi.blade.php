<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Isian Data Masjid</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>



@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<style>
    .hidden {
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectField = document.querySelector('select[name="sesuai_id_mesjid"]');
        const alasanFieldDiv = document.querySelector('#alasan_id_berbeda-field').closest('.col-md-12');

        function toggleAlasanField() {
            if (selectField.value === 'Tidak') {
                alasanFieldDiv.classList.remove('hidden');
            } else {
                alasanFieldDiv.classList.add('hidden');
                document.querySelector('#alasan_id_berbeda-field').value = '';
            }
        }

        // Jalankan saat pertama kali halaman dimuat
        toggleAlasanField();

        // Jalankan setiap kali pilihan berubah
        selectField.addEventListener('change', toggleAlasanField);
    });
</script>
<div class="mt-4 text-center">
    <a href="{{ route('welcome') }}" class="btn btn-outline-dark" style="border-radius: 8px; padding: 8px 20px;">
        ⬅ Kembali ke Halaman Utama
    </a>
</div>


<body class="p-5">
    <div class="container">
        <h2>Form Registrasi Masjid</h2>
        <form method="POST" action="{{ route('masjidPublicStore') }}">
            @csrf
            {{-- start form data pengelola mesjid --}}
            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    Data Pengelola Mesjid
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="nama_ketua_dkm-field" class="pb-2">Nama Ketua DKM</label>
                            <input type="text" class="form-control" style="background-color: #fff8b3;"
                                name="nama_ketua_dkm" id="nama_ketua_dkm-field" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="telp_ketua_dkm-field" class="pb-2">Telepon/HP Ketua DKM</label>
                            <input type="text" class="form-control" style="background-color: #fff8b3;"
                                name="telp_ketua_dkm" id="telp_ketua_dkm-field" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="penerima_informasi-field" class="pb-2">
                                Nama Penerima Informasi
                                <small class="text-muted d-block">(Bisa ketua DKM, marbot, atau yang ditunjuk)</small>
                            </label>
                            <input type="text" class="form-control" style="background-color: #fff8b3;"
                                name="penerima_informasi" id="penerima_informasi-field" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="telp_penerima_informasi-field" class="pb-2">Nomor Telepon Penerima
                                Informasi</label>
                            <input type="text" class="form-control" style="background-color: #fff8b3;"
                                name="telp_penerima_informasi" id="telp_penerima_informasi-field" required>
                        </div>
                    </div>
                </div>
            </div>

            {{-- End form data pengelola mesjid --}}

            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    Data Detail Mesjid / Mushola
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <label class="form-label">
                                <span class="text-danger">*</span> 3. Jenis Bangunan (Masjid atau Mushola):
                            </label>
                            <div
                                style="background-color: #fff8b3; padding: 10px; border-radius: 5px; display: flex; gap: 30px; align-items: center;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_bangunan" id="masjid"
                                        value="Masjid" {{ old('jenis_bangunan') == 'Masjid' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="masjid">Masjid</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_bangunan" id="mushola"
                                        value="Mushola" {{ old('jenis_bangunan') == 'Mushola' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="mushola">Mushola</label>
                                </div>
                            </div>
                            @error('jenis_bangunan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="nama_masjid-field" class="pb-2">Nama Masjid / Mushola</label>
                            <input type="text" class="form-control" style="background-color: #fff8b3;"
                                name="nama_masjid" id="nama_masjid-field" required="">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="alamat_lengkap-field" class="pb-2">Alamat Lengkap</label>
                            <input type="text" class="form-control" style="background-color: #fff8b3;"
                                name="alamat_lengkap" id="alamat_lengkap-field" required="">
                        </div>

                        {{-- Provinsi --}}
                        <div class="col-md-6 mb-4">
                            <label>Provinsi</label>
                            <select name="province_id" id="province_id-field" class="form-control"
                                style="background-color:#fff8b3;">
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach ($provinces as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Kabupaten --}}
                        <div class="col-md-6 mb-4">
                            <label>Kabupaten / Kota</label>
                            <select name="regency_id" id="regency_id-field" class="form-control"
                                style="background-color:#fff8b3;">
                                <option value="">-- Pilih Kabupaten/Kota --</option>

                            </select>
                        </div>

                        {{-- Kecamatan --}}
                        <div class="col-md-6 mb-4">
                            <label>Kecamatan</label>
                            <select name="district_id" id="district_id-field" class="form-control"
                                style="background-color:#fff8b3;">
                                <option value="">-- Pilih Kecamatan --</option>
                            </select>
                        </div>

                        {{-- Kelurahan --}}
                        <div class="col-md-6 mb-4">
                            <label>Kelurahan / Desa</label>
                            <select name="village_id" id="village_id-field" class="form-control"
                                style="background-color:#fff8b3;">
                                <option value="">-- Pilih Kelurahan/Desa --</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="foto_masjid" class="form-label">Foto Masjid</label>
                            <input type="file" name="foto_masjid" id="foto_masjid-field" class="form-control"
                                style="background-color: #fff8b3;" accept="image/*" capture="environment">
                        </div>

                    </div>
                </div>
            </div>

            {{-- End form data pengelola mesjid --}}

            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    Data Meteran Listrik PLN
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <label for="name-field" class="pb-2">1. Id pelanggan PLN</label>
                            <input type="text" name="id_pelanggan" class="form-control" id="id_pelanggan-field"
                                style="background-color: #fff8b3;" required="">
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="nama_pelanggan-field" class="pb-2">2. Nama Pelanggan PLN</label>
                            <input type="text" class="form-control" style="background-color: #fff8b3;"
                                name="nama_pelanggan" id="nama_pelanggan-field" required="">
                        </div>

                        <!-- 4. Jenis Pembayaran Listrik -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">
                                <span class="text-danger">*</span> 4. Jenis Pembayaran Listrik :
                            </label>
                            <div
                                style="background-color: #fff8b3; padding: 10px; border-radius: 5px; display: flex; gap: 30px; align-items: center;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_layanan"
                                        id="prabayar" value="PraBayar"
                                        {{ old('jenis_layanan') == 'PraBayar' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="prabayar">Pra Bayar (Token)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_layanan"
                                        id="pascabayar" value="PascaBayar"
                                        {{ old('jenis_layanan') == 'PascaBayar' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pascabayar">Pasca Bayar</label>
                                </div>
                            </div>
                            @error('jenis_layanan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- 5. Nama ID Pelanggan PLN -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">
                                <span class="text-danger">*</span> Apakah Nama ID Pelanggan PLN memakai nama
                                Masjid/Mushola?
                            </label>
                            <div
                                style="background-color: #fff8b3; padding: 10px; border-radius: 5px; display: flex; gap: 30px; align-items: center;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sesuai_id_masjid"
                                        id="ya" value="Ya"
                                        {{ old('sesuai_id_masjid') == 'Ya' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sesuai_id_masjid"
                                        id="tidak" value="Tidak"
                                        {{ old('sesuai_id_masjid') == 'Tidak' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tidak">Tidak</label>
                                </div>
                            </div>
                            @error('sesuai_id_masjid')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="estimasi_biaya-field" class="pb-2">Perkiraan Biaya Listrik Tiap Bulan atau
                                sekali
                                mengisi Token (isi dengan angka Nominal)</label>
                            <input type="text" class="form-control" style="background-color: #fff8b3;"
                                name="estimasi_biaya" id="estimasi_biaya-field" required="">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="alasan_id_berbeda-field" class="pb-2">Apa alasan nya kenapa Id Pelanggan PLN
                                memakai
                                Nama yang berbeda dari nama Masjid atau Mushola nya</label>
                            <input type="text" class="form-control" style="background-color: #fff8b3;"
                                name="alasan_id_berbeda" id="alasan_id_berbeda-field">
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="foto_meteran_listrik" class="form-label">Foto Meteran Listrik</label>
                            <input type="file" name="foto_meteran_listrik" id="foto_meteran_listrik-field"
                                class="form-control" style="background-color: #fff8b3;" accept="image/*"
                                capture="environment">
                        </div>

                    </div>
                </div>
            </div>

            {{-- End form data pengelola mesjid --}}
<div class="form-check mb-4">
    <input class="form-check-input" type="checkbox" name="agreement" id="agreement" required>
    <label class="form-check-label" for="agreement">
        Saya telah membaca dan menyetujui bahwa semua data yang saya isi adalah benar.
    </label>
</div>


    </div>



    <div class="row">
        <div class="col-12 mb-4">
            <button type="submit" class="btn btn-sm btn-primary col-12">
                <i class="fas fa-save mr-2"></i>
                Simpan
            </button>
        </div>
    </div>

    </form>
    <script>
        $(document).ready(function() {

            // ========================
            // 1️⃣ Provinsi -> Kabupaten
            // ========================
            $('#province_id-field').on('change', function() {
                var provinceID = $(this).val();

                $('#regency_id-field').html('<option value="">-- Pilih Kabupaten/Kota --</option>');
                $('#district_id-field').html('<option value="">-- Pilih Kecamatan --</option>');
                $('#village_id-field').html('<option value="">-- Pilih Kelurahan/Desa --</option>');

                if (provinceID) {
                    $.get('/get-regencies/' + provinceID, function(data) {
                        $.each(data, function(index, regency) {
                            $('#regency_id-field').append('<option value="' + regency.id +
                                '">' + regency.name + '</option>');
                        });
                    });
                }
            });

            // ========================
            // 2️⃣ Kabupaten -> Kecamatan
            // ========================
            $('#regency_id-field').on('change', function() {
                var regencyID = $(this).val();

                $('#district_id-field').html('<option value="">-- Pilih Kecamatan --</option>');
                $('#village_id-field').html('<option value="">-- Pilih Kelurahan/Desa --</option>');

                if (regencyID) {
                    $.get('/get-districts/' + regencyID, function(data) {
                        $.each(data, function(index, district) {
                            $('#district_id-field').append('<option value="' + district.id +
                                '">' + district.name + '</option>');
                        });
                    });
                }
            });

            // ========================
            // 3️⃣ Kecamatan -> Kelurahan
            // ========================
            $('#district_id-field').on('change', function() {
                var districtID = $(this).val();

                $('#village_id-field').html('<option value="">-- Pilih Kelurahan/Desa --</option>');

                if (districtID) {
                    $.get('/get-villages/' + districtID, function(data) {
                        $.each(data, function(index, village) {
                            $('#village_id-field').append('<option value="' + village.id +
                                '">' + village.name + '</option>');
                        });
                    });
                }
            });
        });
    </script>
</body>

</html>
