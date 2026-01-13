<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Obink">

    <title>TAMAMA . Profile</title>
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



</head>

<body>
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
        @if (Auth::check())
            <div style="background:green;color:white;padding:5px">
                STATUS: SUDAH LOGIN
            </div>
        @else
            <div style="background:red;color:white;padding:5px">
                STATUS: BELUM LOGIN
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
        <div class="container">
            @php
                
$item = $masjid->first();
                $user = Auth::user();
            @endphp

           
            <div class="d-flex justify-content-center my-3">
                @if (Auth::check() && Auth::user()->nama)
                    <div class="card shadow-sm border-0 rounded-3 w-100" style="max-width: 420px;">

                        <div class="info-section">
 <div class="mb-3">
                                <label class="fw-bold text-secondary"></label>
                                @if ($item->testimonial_status)
                                    <span class="badge warna-background text-light px-3 py-2"> ✔ Terimakasih Anda Sudah Memberikan
                                        Testimonial</span>
                                @else
                                    <span class="badge bg-danger text-light px-3 py-2">X Anda Belum Memberikan
                                        Testimonial</span><br>
                                        <span>Demi Kelancaran untuk kebaikan maka kami meminta sedikit waktu anda untuk memberikan beberapa patah kata sebagai ucapan penyemangat bagi kami.</span>
                        
                                @endif


                            </div>

                            <div class="info-item mb-2">
                                <a href="{{ route('mobilegivetestimoni') }}"
                                    class="btn btn-testimoni d-flex align-items-center justify-content-center gap-2">
                                    <span class="material-symbols-outlined">share_reviews</span>
                                    <span> Menuju Halaman Testimoni </span>
                                </a>
                            </div>
                            
                            <div class="section-header">
                                <i class="material-icons section-icon">badge</i>
                                <h6 class="section-title">Data Pengurus Masjid</h6>
                            </div>


                            <div class="col-md-6 text-center">
                                <label class="fw-bold d-block mb-2">Foto Masjid</label>
                                @if ($item->foto_masjid)
                                    <img src="{{ asset('public/storage/foto_masjid/' . $item->foto_masjid) }}"
                                        class="img-fluid rounded shadow">
                                @else
                                    <p class="text-muted">Belum ada foto.</p>
                                @endif
                            </div>


                            <div class="info-item mb-1">
                                <span class="material-symbols-outlined info-icon mr-4">person</span>
                                <div>
                                    <small class="text-muted d-block">Nama Ketua DKM</small>
                                    <span class="fw-semibold">{{ $item->nama_ketua_dkm ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="info-item mb-1">
                                <span class="material-symbols-outlined info-icon mr-4">call</span>
                                <div>
                                    <small class="text-muted d-block">Telp Ketua DKM</small>
                                    <span class="fw-semibold">{{ $item->telp_ketua_dkm ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="info-item mb-1">
                                <span class="material-symbols-outlined info-icon mr-4">person</span>
                                <div>
                                    <small class="text-muted d-block">Nama Penerima Informasi</small>
                                    <span class="fw-semibold">{{ $item->penerima_informasi ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="info-item mb-3">
                                <span class="material-symbols-outlined info-icon mr-4">phone</span>
                                <div>
                                    <small class="text-muted d-block">Telp Penerima Informasi</small>
                                    <span class="fw-semibold">{{ $item->telp_penerima_informasi ?? '-' }}</span>
                                </div>
                            </div>
                        </div>


                        {{-- section kedua --}}

                        <div class="info-section">

                            <div class="section-header">
                                <span class="material-icons section-icon">mosque</span>
                                <h6 class="section-title">Data Detail Bangunan</h6>
                            </div>


                            <div class="info-item mb-1">
                                <span class="material-symbols-outlined info-icon mr-4">home_work</span>
                                <div>
                                    <small class="text-muted d-block">Jenis Bangunan</small>
                                    <span class="fw-semibold">{{ $item->jenis_bangunan ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="info-item mb-1">
                                <span class="material-symbols-outlined info-icon mr-4">label</span>
                                <div>
                                    <small class="text-muted d-block">Nama</small>
                                    <span class="fw-semibold">{{ $item->nama_masjid ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="info-item mb-1">
                                <span class="material-symbols-outlined info-icon mr-4">location_on</span>
                                <div>
                                    <small class="text-muted d-block">Alamat</small>
                                    <span class="fw-semibold">{{ $item->alamat_lengkap ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="info-item-noline  mb-1">
                                <i class="material-icons info-icon me-2  mr-4">location_on</i>
                                <div>
                                    <small class="text-muted d-block">Kelurahan</small>
                                    <span class="fw-semibold">
                                        {{ $item->village->name ?? '-' }}
                                    </span>
                                </div>
                            </div>
                            <div class="info-item-noline  mb-1">
                                <i class="material-icons info-icon me-2  mr-4">location_on</i>
                                <div>
                                    <small class="text-muted d-block">Kecamatan</small>
                                    <span class="fw-semibold">
                                        {{ $item->district->name ?? '-' }}
                                    </span>
                                </div>
                            </div>
                            <div class="info-item-noline  mb-1">
                                <i class="material-icons info-icon me-2  mr-4">location_on</i>
                                <div>
                                    <small class="text-muted d-block">Kota/Kabupaten</small>
                                    <span class="fw-semibold">
                                        {{ $item->regency->name ?? '-' }}
                                    </span>
                                </div>
                            </div>
                            <div class="info-item-noline  mb-1">
                                <i class="material-icons info-icon me-2  mr-4">location_on</i>
                                <div>
                                    <small class="text-muted d-block">Provinsi</small>
                                    <span class="fw-semibold">
                                        {{ $item->province->name ?? '-' }}
                                    </span>
                                </div>
                            </div>


                            <div class="text-center">
                                <label class="fw-bold d-block mb-3">
                                    <i class="bi bi-geo-fill"></i> Lokasi Masjid di Peta
                                </label>
                                <div id="mapShow" class="map-square rounded shadow"></div>
                                <span class="fw-semibold">
                                    {{ $item->map_lokasi_masjid ?? '-' }}
                                </span>
                            </div>
                        </div>

                        {{-- section ketiga --}}
                        <div class="info-section">

                            <div class="section-header">
                                <i class="material-icons section-icon">bolt</i>
                                <h6 class="section-title">Detail Listrik PLN Masjid</h6>
                            </div>


                            <div class="col-md-6 text-center">
                                <label class="fw-bold d-block mb-2">Foto Meteran Listrik</label>
                                @if ($item->foto_meteran_listrik)
                                    <img src="{{ asset('public/storage/foto_masjid/' . $item->foto_meteran_listrik) }}"
                                        class="img-fluid rounded shadow">
                                @else
                                    <p class="text-muted">Belum ada foto.</p>
                                @endif
                            </div>


                            <div class="info-item mb-1">
                                <span class="material-symbols-outlined info-icon mr-4">bolt</span>
                                <div>
                                    <small class="text-muted d-block">ID Pelanggan</small>
                                    <span class="fw-semibold">{{ $item->id_pelanggan ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="info-item mb-1">
                                <span class="material-symbols-outlined info-icon mr-4">recent_patient</span>
                                <div>
                                    <small class="text-muted d-block">Nama Pelanggan</small>
                                    <span class="fw-semibold">{{ $item->nama_pelanggan ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="info-item mb-1">
                                <span class="material-symbols-outlined info-icon mr-4">electric_meter</span>
                                <div>
                                    <small class="text-muted d-block">Jenis Pembayaran Listrik</small>
                                    <span class="fw-semibold">{{ $item->jenis_layanan ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="info-item mb-3">
                                <span class="material-symbols-outlined info-icon mr-4">payments</span>
                                <div>
                                    <small class="text-muted d-block">Estimasi Biaya Perbulan</small>
                                    <span
                                        class="fw-semibold">{{ 'Rp ' . number_format($item->estimasi_biaya, 0, ',', '.') }}</span>

                                </div>
                            </div>
                            <div class="info-item mb-1">
                                <span class="material-symbols-outlined info-icon mr-4">quickreply</span>
                                <div>
                                    <small class="text-muted d-block">Total Pengajuan Token</small>
                                    <span class="fw-semibold">{{ ($item->total_pengajuan ?? '-') . ' Kali' }}</span>
                                </div>
                            </div>
                           


                        </div>


                    </div>


                @endif
            </div>
        </div>
        <!-- page content ends -->

        {{-- <div class="d-flex justify-content-center my-3">
                @if (Auth::check() && Auth::user()->nama)
                    <a href="{{ route('mobilerequesttokenlanjut') }}" class="btn btn-primary w-50 py-3 text-center">
                        <p class="me-2">Lanjut Pengajuan Token</p>
                    </a>
                @endif

            </div> --}}
        <div class="d-flex justify-content-center my-3">
            @if (Auth::check() && Auth::user()->nama)
                <a href="{{ route('mobile.logout') }}" class="btn btn-grey w-50 py-3 text-center">
                    <p class="me-2">Logout</p>
                </a>
            @endif

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





    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Logout</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">
                    <figure class="avatar avatar-120 rounded-circle mt-0 border-0">
                        <img src="{{ asset('img/user1.png') }}" alt="user image">
                    </figure>

                    <h5 class="my-3 text-success">Anda berhasil logout</h5>

                    <button class="btn btn-default btn-rounded btn-block" data-dismiss="modal">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>

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
</body>

</html>
