<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Obink">

    <title>TAMAMA . Berikan Testimonial</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('mobile/img/favicontamama1.ico') }}">
    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="mobile/vendor/materializeicon/material-icons.css">

    <!-- Roboto fonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="mobile/vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link href="mobile/vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="mobile/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('mobile/css/mobile-menu.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



</head>

<body>
    @php
        $testimonial = $testimonial ?? null;
    @endphp

    @include('partials.mobile-slide-menu')
    <!-- Loader -->
    <div class="row no-gutters vh-100 loader-screen">
        <div class="col align-self-center text-white text-center">
            <img src="mobile/img/logoyayasanwhite.png" width="100" height="100" alt="logo">
            <h1><span class="font-weight-light">Cita</span>Amanat</h1>
            <div class="laoderhorizontal">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- Loader ends -->



    <div class="wrapper">

        <!-- header -->
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <button class="btn  btn-link text-dark menu-btn"><img src="img/menu.png" alt=""><span
                            class="new-notification"></span></button>
                </div>
                <div class="col text-center"><img src="img/logo-header.png" alt="" class="header-logo"></div>
                <div class="col-auto">
                    <a href="profile.html" class="btn  btn-link text-dark"><i
                            class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>
        <!-- header ends -->
        <!-- MOBILE HEADER (Background image + text di dalam gambar) -->
        <div class="mobile-header-aktifitas text-white d-block d-md-none">

            <div class="content-wrapper">
                <p class="text-uppercase  mb-1">Berikan testimoni</p>
                <p class="text-uppercase mb-1">Cita Amanat Martadiredja</p>
            </div>
        </div>

        @if (Auth::check())
            <div style="background:green;color:white;padding:5px">
                Anda LOGIN sebagai :<h5 class="mb-1 ">
                    @auth
                        <span class="user-name-title text-white">
                            {{ Auth::user()->masjid->nama_ketua_dkm ?? Auth::user()->nama }}
                        </span>

                    @endauth
                </h5>
            </div>
        @else
            <div style="background:red;color:white;padding:5px">
                STATUS: Anda Belum LOGIN
            </div>
        @endif
        <style>
            .info-icon {
                font-size: 32px;
                color: #16a34a;
                /* hijau */
                margin-top: 2px;
                flex-shrink: 0;
            }

            .info-item {
                display: flex;
                gap: 12px;
                padding: 12px 0;
            }

            .info-item-noline {
                display: flex;
                gap: 12px;
                padding: 12px 0;
            }


            .info-item:not(:last-child) {
                border-bottom: 1px solid #d1d1d1;
            }

            .info-item-noline:not(:last-child) {}

            .info-section {
                background: #ffffff;
                border-radius: 16px;
                padding: 16px;
                margin-bottom: 20px;
                box-shadow: 0 6px 16px rgba(0, 0, 0, .06);
            }

            .info-section:not(:last-child) {
                margin-bottom: 20px;
                border-bottom: 1px dashed #000000;
            }

            .section-header {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 12px 0;
                margin-bottom: 8px;
                border-bottom: 1px solid #e5e7eb;
            }

            .section-icon {
                font-size: 38px;
                color: #f2a900;
            }

            .section-title {
                font-size: 1.25rem;
                font-weight: 700;
                margin: 0;
                color: #f2a900;
            }

            #mapShow {
                position: relative;
                z-index: 1;
            }

            .leaflet-pane,
            .leaflet-top,
            .leaflet-bottom {
                z-index: 2 !important;
            }
        </style>

        <!-- page content here -->




        <div class="px-3 my-3">
            @php

                $user = Auth::user();
                $item = $masjid->first();
            @endphp
            <div class="d-flex justify-content-center">
                <div class="card shadow-sm border-0 rounded-3 w-100" style="max-width:420px;">
                    <div class="p-3">

                        {{-- STATUS --}}
                        <div class="mb-3 text-center">
                            <span class="fw-bold text-secondary">Status Anda</span><br>

                            @if ($item && $item->testimonial_status == 1)
                                <span class="badge warna-background text-light px-3 py-2 mt-2">
                                    Sudah Memberikan Testimoni
                                </span>
                            @else
                                <span class="badge bg-danger text-light px-3 py-2 mt-2">
                                    Belum Memberikan Testimoni
                                </span>
                            @endif
                        </div>

                        {{-- ========================= --}}
                        {{-- BELUM TESTIMONI --}}
                        {{-- ========================= --}}
                        @if ($item && $item->testimonial_status == 0)

                            <form action="{{ route('mobile.testimonial.store') }}" method="POST"
                                enctype="multipart/form-data" class="border rounded p-3 bg-light">

                                @csrf

                                <p class="text-center fw-bold mb-3">Silakan Isi Testimoni Anda</p>
                                <p class="text-center fw-bold mb-3">Untuk Video bisa anda lewati dulu (dikosongkan
                                    saja), Dan anda bisa menambahkan video kapan saja ketika berkenan dengan menambah
                                    atau mengedit video di kemudian hari.</p>

                                <p class="text-center fw-bold mb-3">Untuk Yang Bertanda * wajib di isi (tidak bisa
                                    dikosongkan).</p>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Ucapan *</label>
                                    <textarea name="ucapan" class="form-control" rows="10" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nama Pengelola * <br>(contoh: Ahmad Dhani
                                        ,Ketua DKM Masjid Al Ahmadun</label>
                                    <input type="text" name="keterangan" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Foto Pengelola *</label>
                                    <input type="file" name="foto_pengelola" class="form-control" accept="image/*"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Video (Opsional)</label>
                                    <input type="file" name="video" class="form-control" accept="video/*">
                                </div>

                                <button class="btn btn-success w-100">
                                    <i class="fas fa-save me-1"></i> Kirim Testimoni
                                </button>
                            </form>

                            {{-- ========================= --}}
                            {{-- SUDAH TESTIMONI --}}
                            {{-- ========================= --}}
                        @else
                            <div class="alert alert-success text-center mb-3">
                                🙏 Terima kasih, testimoni Anda sudah kami terima
                            </div>

                            @if ($testimonial)
                                <div class="border rounded p-3 bg-light mb-3">

                                    <p class="fw-bold mb-1">Ucapan:</p>
                                    <p class="text-muted">{{ $testimonial->ucapan }}</p>

                                    <p class="fw-bold mb-1">Pengelola:</p>
                                    <p class="text-muted">{{ $testimonial->keterangan }}</p>

                                    @if ($testimonial->photo)
                                        <img src="{{ asset('assets/storage/foto_pengelola/' . $testimonial->photo) }}"
                                            class="img-fluid rounded mb-3">
                                    @else
                                        <div class="alert alert-warning text-center mt-3">
                                            tidak ada foto
                                        </div>
                                    @endif

                                    @if ($testimonial->video)
                                        <video controls class="w-100 rounded">
                                            <source src="{{ asset('storage/' . $testimonial->video) }}">
                                        </video>
                                    @else
                                        <div class="alert alert-warning text-center mt-3">
                                            ⚠️ Video belum ditambahkan
                                        </div>
                                    @endif
                                </div>

                                <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalEditVideo">
                                    <i class="material-icons me-1">videocam</i>
                                    Tambah Video
                                </button>

                            @endif

                        @endif

                    </div>
                </div>
            </div>
        </div>




        {{-- <a href="{{ route('mobile.logout') }}">Logout</a> --}}
        <!-- footer -->
        <style>
            .btn-testimoni {
                background: linear-gradient(135deg, #2e7d32, #43a047);
                color: #fff;
                padding: 12px 16px;
                border-radius: 12px;
                font-weight: 600;
                text-decoration: none;
                box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
                transition: all 0.25s ease;
            }

            .btn-testimoni:hover {
                background: linear-gradient(135deg, #e09d00, #e7b205);
                transform: translateY(-2px);
                color: #fff;
            }

            .btn-testimoni .material-symbols-outlined {
                font-size: 22px;
            }

            /* footer */


            body {
                margin: 0 0 55px 0;
            }

            .navi {
                position: fixed;
                bottom: 0;
                width: 100%;
                height: 65px;
                box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
                background-color: #ffffff;
                display: flex;
                overflow-x: auto;

            }

            .navi__link {

                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                flex-grow: 1;
                min-width: 50px;
                overflow: hidden;
                white-space: nowrap;
                font-family: sans-serif;
                font-size: 13px;
                color: #8e8e8e;
                text-decoration: none;
                -webkit-tap-highlight-color: transparent;
                transition: background-color 0.1s ease-in-out;
            }

            .navi__link:hover {
                background-color: #eeeeee;
            }



            .navi__link--active {
                color: #6b650d;
            }

            .navi__icon {
                font-size: 24px;
                color: #a7a7a7;
                /* ⬅️ penting */
            }

            .navi__icon--active {
                font-size: 24px;
                color: #07c511;
                /* ⬅️ penting */
            }

            .navi__text {
                font-size: 16px;
                color: #a7a7a7;
                /* ⬅️ penting */
            }

            .navi__text--active {
                font-size: 16px;
                color: #07c511;
                /* ⬅️ penting */
            }

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
        <div class="footer">
            <nav class="navi">

                <a href="{{ route('mobilelandingpage') }}" class="navi__link">
                    <i class="material-icons navi__icon">dashboard</i>
                    <span class="navi__text">Home</span>
                </a>



                <a href="{{ route('mobilelistmasjid') }}" class="navi__link">
                    <i class="material-icons navi__icon">mosque</i>
                    <span class="navi__text">List Masjid</span>
                </a>

                {{-- 🔐 MENU PROFILE (LOGIN AWARE) --}}
                <a href="{{ Auth::check() ? route('mobilerequesttoken') : route('mobile.login') }}"
                    class="navi__link">

                    <i class="material-icons navi__icon">
                        {{ Auth::check() ? 'electric_bolt' : 'electric_bolt' }}
                    </i>

                    <span class="navi__text">
                        Request
                    </span>
                </a>
                <a href="{{ route('mobilehelp') }}" class="navi__link">
                    <i class="material-icons navi__icon">help</i>
                    <span class="navi__text">F.A.Q</span>
                </a>
                {{-- 🔐 MENU PROFILE (LOGIN AWARE) --}}
                <a href="{{ Auth::check() ? route('mobileprofile') : route('mobile.login') }}"
                    class="navi__link navi__link--active">

                    <i class="material-icons navi__icon--active">
                        {{ Auth::check() ? 'person' : 'person' }}
                    </i>

                    <span class="navi__text--active">
                        Profile
                    </span>
                </a>


            </nav>
        </div>

        <!-- footer ends -->
    </div>

<style>
.hourglass-spin {
    animation: hourglassRotate 1.2s linear infinite;
}

@keyframes hourglassRotate {
    0%   { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>



    {{-- modal tambah video --}}
    @if ($testimonial)
        <div class="modal fade" id="modalEditVideo" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-3">

                    <div class="modal-header">
                        <h6 class="modal-title fw-bold">
                            Edit Video Testimoni
                        </h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="{{ route('mobile.testimonial.updateVideo') }}" method="POST"
                        enctype="multipart/form-data" id="formUpdateVideo">
                        @csrf

                        <div class="modal-body">

                            {{-- VIDEO SAAT INI --}}
                            @if (!empty($testimonial) && $testimonial->video)
                                <video controls class="w-100 rounded mb-3">
                                    <source src="{{ asset('storage/' . $testimonial->video) }}">
                                </video>
                            @else
                                <div class="alert alert-warning text-center">
                                    ⚠️ Anda belum mengunggah video testimoni
                                </div>
                            @endif

                            {{-- INPUT VIDEO --}}
                            <div class="mb-3">
                                <label class="fw-semibold">
                                    Upload Video Baru <span class="text-danger">*</span>
                                </label>
                                <input type="file" name="video" class="form-control" accept="video/*" required>
                                <small class="text-muted">
                                    ⏳ Proses upload bisa memakan waktu, mohon tunggu
                                </small>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Batal
                            </button>

                            {{-- TOMBOL SUBMIT --}}
                            <button type="submit"
        class="btn btn-success w-100"
        id="btnUpdateVideo">

    <span class="btn-normal">
        <i class="material-icons me-1">save</i>
        Simpan Video
    </span>

    <span class="btn-loading d-none">
        <i class="material-icons hourglass-spin me-1">hourglass_top</i>
        Uploading...
    </span>
</button>

                        </div>
                    </form>


                </div>
            </div>
        </div>
  

    @endif


    <!-- jquery, popper and bootstrap js -->
    <script src="mobile/js/jquery-3.3.1.min.js"></script>
    <script src="mobile/js/popper.min.js"></script>
    <script src="mobile/vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>

    <!-- swiper js -->
    <script src="mobile/vendor/swiper/js/swiper.min.js"></script>

    <!-- template custom js -->
    <script src="mobile/js/main.js"></script>

    <!-- page level script -->
    <script>
        $(window).on('load', function() {

        });
    </script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var coordString = "{{ $item->map_lokasi_masjid }}";
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
   <script>
document.getElementById('formUpdateVideo').addEventListener('submit', function () {
    const btn = document.getElementById('btnUpdateVideo');

    btn.disabled = true;
    btn.querySelector('.btn-normal').classList.add('d-none');
    btn.querySelector('.btn-loading').classList.remove('d-none');
});
</script>


</body>

</html>
