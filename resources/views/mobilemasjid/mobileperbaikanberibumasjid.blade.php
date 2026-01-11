<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Obink">

    <title>TAMAMA ·Perbaikan Beribu Masjid</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('mobile/img/favicontamama1.ico') }}">
    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="mobile/vendor/materializeicon/material-icons.css">

    <!-- Roboto fonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="mobile/vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">



    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('mobile/vendor/swiper/css/swiper.min.css') }}">

    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('mobile/css/style.css') }}">

    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <!-- Swiper CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Mobile menu -->
    <link rel="stylesheet" href="{{ asset('mobile/css/mobile-menu.css') }}?v={{ time() }}">

    {{-- <link rel="stylesheet" href="{{ asset('mobile/css/mobile-menu.css') }}"> --}}
</head>
<style>
    .swiper-container {
        height: 60vw;
        max-height: 400px;
    }
</style>

<body>

    @include('partials.mobile-slide-menu')
    <div class="row no-gutters  vh-100 loader-screen">
        <div class="col align-self-center text-white text-center">
            <img src="mobile/img/logo_tamama_putih.png" width="100" height="100" alt="logo">
            <h1><span class="font-weight-light"></span> Cita Amanat Martadiredja </h1>

            <div class="laoderhorizontal">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
     <div class="sidebar">
        <div class="text-center">
            <div class="figure-menu shadow">
                <figure><img src="mobile/img/useeer.png" alt=""></figure>
            </div>
            <h5 class="mb-1 ">
                @auth
                    <span class="user-name-title text-white">
                        {{ Auth::user()->masjid->nama_ketua_dkm ?? Auth::user()->nama }}
                    </span>

                @endauth
            </h5>
            <br>
            <p class="mb-1 ">
                @auth
                    <span class="user-name-title text-white">Ketua DKM :
                        {{ Auth::user()->masjid->nama_masjid ?? Auth::user()->nama }}
                    </span>

                @endauth
            </p>
            <br>
            <p class="mb-1 ">
                @auth
                    <span class="user-name-title text-white">
                        {{ Auth::user()->masjid->regency->name ?? '' }}
                    </span>

                @endauth
            </p>
            @auth
                <span class="user-name-title">

                    <p class="text-light">
                        {{ Auth::user()->masjid->province->name ?? '' }}
                    </p>
                </span>
            @endauth

        </div>
        <br>
        <div class="row mx-0">
            <div class="col">

                <h5 class="subtitle text-uppercase"><span>Menu</span></h5>
                <div class="list-group main-menu">
                    @auth <a href="index.html" class="list-group-item list-group-item-action active">Total Pengajuan
                        Token :{{ Auth::user()->masjid->total_pengajuan ?? Auth::user()->nama }} Kali</a>@endauth
                    
                    <a href="{{ route('mobile.logout') }}"
                        class="list-group-item list-group-item-action mt-4">Logout</a>
                </div>
            </div>
        </div>

    </div>

    <style>
        .product-card {
            border-radius: 16px;
            overflow: hidden;
            /* penting agar gambar ikut rounded */
            position: relative;
        }

        .product-image {
            width: 100% !important;
            height: 140px !important;
            /* atur sesuai selera */
            overflow: hidden;
        }

        .product-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
            /* ini yang bikin rapi */
        }

        /* tombol bulat hijau */
        .btn-circle {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            position: absolute;
            bottom: 16px;
            right: 16px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* MOBILE FIRST */
        .mobile-section {
            margin-top: 2rem;
        }

        /* Judul */
        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: .75rem;
            text-align: center;
        }

        /* Deskripsi */
        .section-desc {
            font-size: .95rem;
            line-height: 1.6;
            text-align: justify;
            color: #555;
        }

        /* Gambar utama */
        .main-img {
            max-height: 260px;
            object-fit: contain;
            margin-bottom: 1rem;
        }

        /* Galeri horizontal (mobile) */
        .gallery-scroll {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            padding-bottom: 8px;
            margin-top: 1rem;
        }

        .gallery-scroll img {
            flex: 0 0 auto;
            width: 140px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, .12);
        }

        /* Hilangkan scrollbar jelek */
        .gallery-scroll::-webkit-scrollbar {
            display: none;
        }

        /* DESKTOP ENHANCEMENT */
        @media (min-width: 992px) {

            .section-title {
                font-size: 1.8rem;
                text-align: left;
            }

            .section-desc {
                font-size: 1rem;
            }

            .main-img {
                max-height: 420px;
            }

            .gallery-scroll {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                overflow: visible;
            }

            .gallery-scroll img {
                width: 100%;
                height: 140px;
            }
        }

        .mobile-back-wrapper {
            display: flex;
            justify-content: center;
            margin: 24px 0;
        }

        /* Tombol utama */
        .mobile-back-btn {
            display: flex;
            align-items: center;
            gap: 8px;

            padding: 12px 20px;
            border-radius: 999px;

            background: #00d620;
            /* bootstrap primary */
            color: #000000;
            font-size: 14px;
            font-weight: 500;

            text-decoration: none;
            box-shadow: 0 8px 20px rgba(13, 110, 253, .35);

            transition: transform .15s ease, box-shadow .15s ease;
        }

        /* Tap effect (mobile) */
        .mobile-back-btn:active {
            transform: scale(0.96);
            box-shadow: 0 4px 10px rgba(13, 110, 253, .25);
        }

        /* Icon */
        .mobile-back-btn .material-icons {
            font-size: 20px;
        }

        .mobile-back-btn .back-text {
            color: #fff;
        }

        .mobile-back-btn .material-icons {
            color: #fff;
        }

        /* Desktop (opsional: sembunyikan) */
        @media (min-width: 768px) {
            .mobile-back-wrapper {
                display: none;
            }
        }

        .gallery-item {
            cursor: pointer;
        }

        .modal-body img {
            max-height: 60vh;
            object-fit: contain;
        }

        .card {
            overflow: hidden;
            /* biar rounded rapi */
        }

        .gallery-scroll {
            gap: 12px;
        }

        .section-desc {
            font-size: .9rem;
            line-height: 1.6;
        }
    </style>
    <div class="wrapper">
        <div class="header ">
            <div class="row no-gutters">
                <div class="col-auto">
                    <button class="btn  btn-link text-dark menu-btn"><img src="mobile/img/menu.png" alt=""><span
                            class="new-notification"></span></button>
                </div>
                <div class="col text-center"><img src="mobile/img/logo tamamama.png" alt="" class="header-logo">
                </div>
                <div class="col-auto d-flex align-items-center">

                    @auth
                        <span class="user-name text-white">
                            {{ Auth::user()->masjid->nama_ketua_dkm ?? Auth::user()->nama }}
                        </span>

                    @endauth
                    <a href="#" class="btn btn-link text-white p-0 me-1">
                        <i class="material-icons">account_circle</i>
                    </a>
                </div>
            </div>
        </div>

        <!-- MOBILE HEADER (Background image + text di dalam gambar) -->
        <div class="mobile-header-aktifitas text-white d-block d-md-none">

            <div class="content-wrapper">
                <p class="text-uppercase  mb-1">Aktifitas Kami</p>

            </div>
            <div>

                <a href="{{ url()->previous() }}" class="btn-back mr-2">
                    <i class="material-icons">arrow_back</i>
                </a>

            </div>
        </div>



        <div class="container ">

            <h6 class="subtitle">Program Terangi Beribu Masjid Dan Mushola</h6>


            <!-- page content ends -->


            <div class="row g-4 align-items-center mobile-section">

                <!-- IMAGE UTAMA -->
                <div class="col-12 col-lg-4 col-xl-5">
                    <div class="team-img text-center">
                        <img src="/mosque/img/002bangun.png" class="img-fluid main-img" alt="">
                    </div>
                </div>

                <!-- KONTEN -->
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="team-item">

                        <h3 id="bagian-perbaikan" class="section-title">
                            Perbaikan Beribu Masjid & Mushola
                        </h3>

                        <p class="section-desc">
                            Memperbaiki bangunan, memperkuat iman dalam wujudkan mimpi bersama
                            untuk mempercantik rumah-rumah Allah. Bersama kita tidak hanya
                            membangun fisik, tetapi merawat peradaban dan warisan Islami
                            untuk generasi mendatang.
                        </p>

                        <div class="card shadow-sm ">
                            <!-- GALERI MOBILE -->
                            <div class="gallery-scroll">

                                <img src="/mosque/img/perbaikan001.png"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="Bantuan dana untuk renovasi majelis taklim Shalawat & Dzikir Khairil Anam Kp. Babakan Kinin Rt 04 RW 15 Ds Cileunyi"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                                <img src="/mosque/img/perbaikan002.png"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="Bantuan dana untuk renovasi majelis taklim Shalawat & Dzikir Khairil Anam Kp. Babakan Kinin Rt 04 RW 15 Ds Cileunyi"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                                <img src="/mosque/img/perbaikan003.png"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="Bantuan dana untuk renovasi majelis taklim Shalawat & Dzikir Khairil Anam Kp. Babakan Kinin Rt 04 RW 15 Ds Cileunyi"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                                <img src="/mosque/img/perbaikan004.png"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="Bantuan dana untuk renovasi majelis taklim Shalawat & Dzikir Khairil Anam Kp. Babakan Kinin Rt 04 RW 15 Ds Cileunyi"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                                <img src="/mosque/img/perbaikan005.png"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="Bantuan dana untuk renovasi majelis taklim Shalawat & Dzikir Khairil Anam Kp. Babakan Kinin Rt 04 RW 15 Ds Cileunyi"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">
                                <img src="/mosque/img/perbaikan006.png"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="Bantuan dana untuk renovasi majelis taklim Shalawat & Dzikir Khairil Anam Kp. Babakan Kinin Rt 04 RW 15 Ds Cileunyi"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                            </div>
                            <!-- DESKRIPSI -->
                            <div class="card-body pt-0">
                                <p class="section-desc mb-0">
                                    Bantuan dana untuk renovasi majelis taklim Shalawat & Dzikir Khairil Anam
                                    Kp. Babakan Kinin Rt 04 RW 15 Ds Cileunyi Kulon Kec Cileunyi Kab. Bandung
                                    sebesar Rp. 5.000.000,- <br>
                                    <small class="text-muted">[20-08-2025]</small>
                                </p>
                            </div>
                        </div>

                        <div class="card shadow-sm mt-4">
                            <!-- GALERI MOBILE -->
                            <div class="gallery-scroll">

                                <img src="/mosque/img/perbaikan1.jpg"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="pengadaan Power Mixer di Pondok Pesantren Tahfidz Quran At Tamim Cileunyi"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                                <img src="/mosque/img/perbaikan2.jpg"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="pengadaan Power Mixer di Pondok Pesantren Tahfidz Quran At Tamim Cileunyi"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                                <img src="/mosque/img/perbaikan3.jpg"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="pengadaan Power Mixer di Pondok Pesantren Tahfidz Quran At Tamim Cileunyi"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                                <img src="/mosque/img/perbaikan4.jpg"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="pengadaan Power Mixer di Pondok Pesantren Tahfidz Quran At Tamim Cileunyi"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                                <img src="/mosque/img/perbaikan5.jpg"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="pengadaan Power Mixer di Pondok Pesantren Tahfidz Quran At Tamim Cileunyi"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">
                                <img src="/mosque/img/perbaikan6.jpg"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="pengadaan Power Mixer di Pondok Pesantren Tahfidz Quran At Tamim Cileunyi"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                            </div>
                            <!-- DESKRIPSI -->
                            <div class="card-body pt-0">
                                <p class="section-desc mb-0">
                                    Kegiatan perbaikan 1000 Masjid, dalam perbaikan sound system berupa pengadaan Power
                                    Mixer di Pondok Pesantren Tahfidz Quran At Tamim Cileunyi – Kabupaten Bandung
                                    sebesar Rp. 2.000.000,- [29-08-2025]
                                    <br>
                                    <small class="text-muted">[20-08-2025]</small>
                                </p>
                            </div>
                        </div>

                        <div class="card shadow-sm mt-4">
                            <!-- GALERI MOBILE -->
                            <div class="gallery-scroll">

                                <img src="/mosque/img/perbaikantoilet1.png"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="Perbaikan Toilet Masjid At Taqwa Kampung Banceuy-Cianjur"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                                <img src="/mosque/img/perbaikantoilet2.png"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="Perbaikan Toilet Masjid At Taqwa Kampung Banceuy-Cianjur"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                                <img src="/mosque/img/perbaikantoilet3.png"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="Perbaikan Toilet Masjid At Taqwa Kampung Banceuy-Cianjur"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                                <img src="/mosque/img/perbaikantoilet4.png"
                                    data-title="Realisasi Perbaikan Masjid / Mushola"
                                    data-desc="Perbaikan Toilet Masjid At Taqwa Kampung Banceuy-Cianjur"
                                    data-bs-toggle="modal" data-bs-target="#galleryModal" class="gallery-item"
                                    alt="">

                            </div>
                            <!-- DESKRIPSI -->
                            <div class="card-body pt-0">
                                <p class="section-desc mb-0">
                                    Bantuan perbaikan Toilet Masjid At Taqwa Kampung Banceuy RT. 02/01 desa Cikahuripan
                                    Gekbrong Cianjur Senilai Rp. 1.500.000,-

                                    <br>
                                    <small class="text-muted">[20-08-2025]</small>
                                </p>
                            </div>
                        </div>



                    </div>
                </div>

            </div>


            <div class="mobile-back-wrapper">
                <a href="{{ url()->previous() }}" class="mobile-back-btn">
                    <span class="material-icons">arrow_back</span>
                    <span class="back-text">Kembali</span>
                </a>
            </div>







        </div>
    
    <div class="container-fluid warna-background  text-white mt-3">
        <div class="row">
            <div class="container">
                <div class="row  py-4 ">
                    <div class="col">
                        <h3 class="text-uppercase mb-3">Perbaiki Beribu Masjid</h3>
                        {{-- <p class="mb-3">Use Coupan Code<br><span class="text-dark">DFR0020</span></p> --}}
                    </div>
                    <div class="col-3 col-md-3 col-lg-2 col-xl-2">
                        <img src="mobile/img/logoyayasanwhite.png" alt="" class="mw-100 mt-3">
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        {{-- <p>Get the all new furnitures at very low price</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    <style>
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

        /* Wrapper */
        .gallery-nav {
            padding: 12px 16px;
        }

        /* Tombol next & prev */
        .gallery-btn {
            width: 56px;
            height: 56px;
            border-radius: 50%;

            border: none;
            background: rgba(101, 196, 0, 0.953);
            color: #fff;

            display: flex;
            align-items: center;
            justify-content: center;

            box-shadow: 0 6px 16px rgba(0, 0, 0, .3);
            transition: transform .15s ease, background .15s ease;
        }

        /* Icon */
        .gallery-btn .material-icons {
            font-size: 32px;
        }

        /* Tap effect (mobile) */
        .gallery-btn:active {
            transform: scale(0.9);
            background: rgb(236, 154, 1);
        }

        /* Desktop sedikit lebih kecil */
        @media (min-width: 768px) {
            .gallery-btn {
                width: 44px;
                height: 44px;
            }

            .gallery-btn .material-icons {
                font-size: 26px;
            }
        }

        .modal-body img {
            width: 100%;
            max-height: 75vh;
            object-fit: cover;
        }
    </style>
    <div class="footer">
        <nav class="navi">

            <a href="{{ route('mobilelandingpage') }}" class="navi__link navi__link">
                <i class="material-icons navi__icon">dashboard</i>
                <span class="navi__text">Home</span>
            </a>



            <a href="{{ route('mobilelistmasjid') }}" class="navi__link">
                <i class="material-icons navi__icon">mosque</i>
                <span class="navi__text">List Masjid</span>
            </a>

            {{-- 🔐 MENU PROFILE (LOGIN AWARE) --}}
            <a href="{{ Auth::check() ? route('mobilerequesttoken') : route('mobile.login') }}" class="navi__link">

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
            <a href="{{ Auth::check() ? route('mobileprofile') : route('mobile.login') }}" class="navi__link">

                <i class="material-icons navi__icon">
                    {{ Auth::check() ? 'person' : 'person' }}
                </i>

                <span class="navi__text">
                    Profile
                </span>
            </a>


        </nav>
    </div>
    </div>

    <!-- notification -->
    <div class="notification bg-white shadow border-primary">
        <div class="row">
            <div class="col-auto align-self-center pr-0">
                <i class="material-icons text-primary md-36">fullscreen</i>
            </div>
            <div class="col">
                <h6>Viewing in Phone?</h6>
                <p class="mb-0 text-secondary">Double tap to enter into fullscreen mode for each page.</p>
            </div>
            <div class="col-auto align-self-center pl-0">
                <button class="btn btn-link closenotification"><i
                        class="material-icons text-secondary text-mute md-18 ">close</i></button>
            </div>
        </div>
    </div>
    <!-- notification ends -->
    {{-- modal --}}
    <div class="modal fade" id="galleryModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content rounded-0">

                <div class="modal-header border-0">
                    <h6 class="modal-title" id="galleryTitle"></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body text-center">
                    <img id="galleryImage" src="" class="img-fluid rounded mb-3">
                    <p id="galleryDesc" class="text-muted small"></p>
                </div>

                <div class="modal-footer border-0 justify-content-between gallery-nav">
                    <button type="button" class="gallery-btn prev" id="prevImg">
                        <span class="material-icons">chevron_left</span>
                    </button>

                    <button type="button" class="gallery-btn next" id="nextImg">
                        <span class="material-icons">chevron_right</span>
                    </button>
                </div>


            </div>
        </div>
    </div>
    {{-- end modal --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
            /* swiper slider carousel */
            var swiper = new Swiper('.small-slide', {
                slidesPerView: 'auto',
                spaceBetween: 0,
            });

            var swiper = new Swiper('.news-slide', {
                slidesPerView: 5,
                spaceBetween: 0,
                pagination: {
                    el: '.swiper-pagination',
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 0,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 0,
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 0,
                    },
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 0,
                    }
                }
            });

            /* notification view and hide */
            setTimeout(function() {
                $('.notification').addClass('active');
                setTimeout(function() {
                    $('.notification').removeClass('active');
                }, 3500);
            }, 500);
            $('.closenotification').on('click', function() {
                $(this).closest('.notification').removeClass('active')
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const items = document.querySelectorAll('.gallery-item');
            let currentIndex = 0;

            const modalImg = document.getElementById('galleryImage');
            const modalTitle = document.getElementById('galleryTitle');
            const modalDesc = document.getElementById('galleryDesc');

            function showImage(index) {
                const item = items[index];
                modalImg.src = item.src;
                modalTitle.textContent = item.dataset.title;
                modalDesc.textContent = item.dataset.desc;
                currentIndex = index;
            }

            items.forEach((img, index) => {
                img.addEventListener('click', () => showImage(index));
            });

            document.getElementById('nextImg').onclick = () => {
                showImage((currentIndex + 1) % items.length);
            };

            document.getElementById('prevImg').onclick = () => {
                showImage((currentIndex - 1 + items.length) % items.length);
            };

        });
    </script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

</body>

</html>
