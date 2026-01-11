<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Cita Amanat martadiredja</title>
<link rel="icon" type="image/x-icon" href="{{ asset('mobile/img/favicontamama1.ico') }}">
    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="mobile/vendor/materializeicon/material-icons.css">

    <!-- Roboto fonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="mobile/vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->

    <link href="mobile/vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Chosen multiselect CSS -->
    <link href="mobile/vendor/chosen_v1.8.7/chosen.min.css" rel="stylesheet">

    <!-- nouislider CSS -->
    <link href="mobile/vendor/nouislider/nouislider.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
>


    <!-- Custom styles for this template -->
    <link href="mobile/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    
    <div class="row no-gutters vh-100 loader-screen">
        <div class="col align-self-center text-white text-center">
            <img src="mobile/img/logo_tamama_putih.png" width="100" height="100" alt="logo">
            <h1><span class="font-weight-light"></span>Cita Amanat Martadiredja</h1>
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
    <div class="wrapper">
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <button class="btn  btn-link text-white menu-btn"><img src="mobile/img/linkmenu.png"
                            alt=""><span class="new-notification"></span></button>
                </div>
                <div class="col text-center">
                    <h6 class=" mt-3 text-white">Cita Amanat Martadiredja</h6>
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



        
        <!-- MOBILE HEADER (hanya tampil di HP) -->
        <!-- MOBILE HEADER (Background image + text di dalam gambar) -->
        <div class="mobile-header text-white d-block d-md-none">

            <div class="content-wrapper">
                <p class="text-uppercase  mb-1">Yayasan</p>
                <p class="text-uppercase mb-1">Cita Amanat Martadiredja</p>
            </div>
        </div>




        {{-- kontainer all start --}}
        <div class="container">

            {{-- row 1 start --}}

            <div class="subtitle h6 mb-3">
                <div class="d-inline-block">
                    Visi Kami:<br>

                </div>
            </div>
            {{-- row 1 end --}}

            {{-- row 2 start --}}
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto align-self-center pr-1">
                                    <span class="">
                                        <img src="/mobile/img/logo masjid.png" width="70" height="70"
                                            class="img-fluid rounded-circle" alt="">
                                    </span>
                                </div>
                                <div class="col pl-1">
                                    <p class="text-secondary mb-0 small justify"> "Kami Akan Berusaha Untuk
                                        Mewujudkan Sarana Ibadah Yang Layak, Nyaman, dan Berkelanjutan Melalui
                                        Revitalisasi Insfrastruktur Masjid dan Mushola."</p>
                                    <p class="text-dark my-0">Founder | Erick Martadiredja </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- row 2 end --}}
            {{-- FULL BLEED BACKGROUND --}}
            <div class="mobile-menu-full">
                <div class="mobile-menu-inner">
                    <div class="mobile-menu-grid">

                        @foreach ($mobileMenus as $menu)
                            @php
                                // Cek apakah route butuh login
                                $route = $menu['route'];
                                $needsLogin = in_array($route, [
                                    'mobilerequesttoken',
                                    'mobileprofile', // ⬅️ tambahkan di sini
                                ]);
                                // tambah route lain jika perlu

                                // Tentukan link
                                $href = $needsLogin
                                    ? (Auth::check()
                                        ? route($route)
                                        : route('mobile.login'))
                                    : (Route::has($route)
                                        ? route($route)
                                        : '#');
                            @endphp



                            <a href="{{ $href }}" class="mobile-menu-item">

                                <div class="menu-icon">
                                    <span class="material-symbols-outlined">{{ $menu['icon'] }}</span>
                                </div>

                                <span class="menu-label">
                                    {{ $menu['label'] }}
                                </span>

                            </a>
                        @endforeach

                    </div>
                </div>
            </div>

            {{-- end menu icon --}}





            @php
                $images = [
                    'masjid001.jpg',
                    'masjid002.jpg',
                    'masjid003.jpg',
                    'masjid004.jpg',
                    'masjid005.jpg',
                    'masjid006.jpg',
                    'masjid007.jpg',
                    'masjid008.jpg',
                    'masjid009.jpg',
                    'masjid010.jpg',
                    'masjid011.jpg',
                    'masjid012.jpg',

                    'masjid014.jpg',
                    'masjid015.jpg',
                    'masjid016.jpg',
                    'masjid017.jpg',
                    'masjid018.jpg',
                    'masjid019.jpg',
                    'masjid020.jpg',
                    'masjid021.jpg',
                    'masjid022.jpg',
                    'masjid023.jpg',
                    'masjid024.jpg',
                ];
            @endphp

            <div class="container my-4">
                <p class="text-success mb-3">Program Utama Kami :<br><span class="text-dark"><b>Terangi Beribu
                            Masjid/Mushola</b></span></p>

                <!-- Swiper -->
                <div class="swiper news-slide">
                    <div class="swiper-wrapper">

                        @foreach ($images as $img)
                            <div class="swiper-slide">
                                <div class="slider-card">
                                    <img src="{{ asset('mosque/fotomasjid/' . $img) }}" alt="Masjid">
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>


            <style>
                html,
                body {
                    overflow-x: hidden;
                }

                .collapsible-text {
                    max-height: 40px;
                    /* tinggi awal (collapse) */
                    overflow: hidden;
                    transition: max-height 0.4s ease;
                }

                .collapsible-text.expanded {
                    max-height: 500px;
                    /* tinggi besar ketika expand */
                }

                .card .card-body {
                    position: relative;
                }

                /* pastikan parent positioning */
                .expand-icon {
                    position: absolute;
                    left: 40%;
                    transform: translateX(-50%);
                    bottom: -18px;
                    /* negatif -> turun keluar dari padding card */
                    font-size: 25px;
                    color: #888;
                    z-index: 5;
                }

                /* Saat expanded → icon akan menghadap ke atas (rotate 180°) */
                .expanded-icon {
                    transform: translateX(-50%) rotate(180deg);
                }

                .justify {
                    text-align: justify;
                }



                .slider-card {
                    border-radius: 6px;
                    overflow: hidden;
                    height: 140px;
                }

                .slider-card img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    border-radius: 6px;
                }

                .news-slide {
                    position: relative;
                    padding-bottom: 28px;
                    /* ruang secukupnya */
                }

                .news-slide .swiper-pagination {
                    position: absolute;
                    bottom: 4px;
                    /* naikkan titik */
                    left: 0;
                    right: 0;
                    text-align: center;
                }

                .swiper-pagination {
                    margin-top: 0 !important;
                }

                

                .testimonial-vertical {
                    height: 360px;
                    /* 3 x ±120px */
                    overflow: hidden;
                }

                .testimonial-card {
                    height: 110px;
                }

                .testimonial-photo {
                    width: 70px;
                    height: 95px;
                    border-radius: .5rem;
                    overflow: hidden;
                    background: #f1f1f1;
                    flex-shrink: 0;

                    margin-right: 6px;
                    margin-bottom: 6px;

                }

                .testimonial-photo img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                .testimonial-row {
                    gap: 14px;
                    /* JARAK FOTO & TEKS */
                    padding: 10px 12px;
                }

                .video-testimonial-card {
                    border-radius: .75rem;
                    overflow: hidden;
                }

                .video-testimonial-card video {
                    border-radius: .75rem .75rem 0 0;
                }

                .mobileVideoTestimonialSwiper {
                    padding-bottom: 10px;
                }

                .nav-icon {
                    padding: 6px 10px;
                }

                .nav-icon i {
                    display: block;
                    /* ⬅️ PAKSA BARIS BARU */
                    font-size: 22px;
                    line-height: 1;
                }


                .nav-label {
                    display: block;
                    /* ⬅️ INI KUNCI UTAMA */
                    font-size: 11px;
                    line-height: 1;
                    margin-top: 1px;
                }




                .nav-icon.active .nav-label,
                .nav-icon.active i {
                    color: #00dd2c;
                    /* warna aktif */
                }

                .nav-grid {
                    display: grid;
                    grid-template-rows: auto auto;
                    justify-items: center;
                    row-gap: 2px;
                    padding: 6px 10px;
                }

                .nav-grid i {
                    font-size: 29px;
                    line-height: 1;
                }

                .nav-grid span {
                    font-size: 15px;
                    line-height: 1;
                }
            </style>





            {{-- row 4 start --}}
            <div class="card mb-3 border-0 shadow-sm" onclick="toggleExpand(this)">
                <div class="card-body">
                    <div class="row">
                        {{-- <div class="col-auto align-self-center pr-1">
                            <span class="">
                                <img src="/mobile/img/logo masjid.png" width="70" height="70"
                                    class="img-fluid rounded-circle" alt="">
                            </span>
                        </div> --}}

                        <div class="col pl-1">
                            <h6 class="text">Terangi Beribu Masjid Dan Mushola</h6>
                            <p class="text-secondary mb-0 medium justify collapsible-text">
                                Sebuah gerakan mengembalikan kejayaan Masjid dan Mushola sebagai pusat dari kegiatan
                                Agama,
                                mendidik dan mencetak generasi berjiwa Islami dengan mewujudkan tempat yang nyaman dan
                                asri
                                serta penerangan yang baik dan cukup. Kami hadir menyalurkan dan memastikan setiap
                                Masjid dan
                                Mushola tersedia token listrik yang cukup, demi kelangsungan operasional masjid yang
                                sehat.
                            </p>
                            <!-- ICON KECIL BAWAH TENGAH -->
                            <div class="expand-icon">▾</div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- row 42 end --}}

            {{-- icon 12 --}}





            <div class="row">
                <div class="col-4">
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto align-self-center pr-1">
                                    <span class="btn btn-warning button-rounded-26">
                                        <i class="material-icons md-18 text-mute">history</i>
                                    </span>
                                </div>
                                <div class="col pl-1">
                                    <p class="text-secondary mb-0 small">Masjid Pendaftar Baru</p>
                                    <h6 class="text-dark my-0">{{ $masjidBelumDisetujui }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto align-self-center pr-1">
                                    <span class="btn btn-success button-rounded-26">
                                        <i class="material-icons md-18 text-mute">home</i>
                                    </span>
                                </div>
                                <div class="col pl-1">
                                    <p class="text-secondary mb-0 small">Masjid Terverifikasi</p>
                                    <h6 class="text-dark my-0">{{ $masjidDisetujui }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto align-self-center pr-1">
                                    <span class="btn btn-primary button-rounded-26">
                                        <i class="material-icons md-18 text-mute">payment</i>
                                    </span>
                                </div>
                                <div class="col pl-1">
                                    <p class="text-secondary mb-0 small">Token Listrik Terealisasi</p>
                                    <h6 class="text-dark my-0">{{ $totalRequestRealisasi }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- login register start --}}

            <h6 class="subtitle">Registrasi Masjid/Mushola</h6>
            <div class="row">

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <figure class="product-image my-0"><img src="mobile/img/online-registration.png"
                                            width="70" height="70" alt="" class=""></figure>
                                </div>
                                <div class="col pl-0">
                                    <h6 class="text-dark my-0">1. Daftarkan Masjid/Mushola Anda</h6>
                                    <p class="text-secondary mb-1">Silakan daftarkan masjid baru Disini</p>

                                </div>

                                <div class="col-auto pl-0 align-self-center">
                                    <a href="{{ route('mobileregistrasi') }}"
                                        class="btn btn-default button-rounded-56 shadow">
                                        <i class="material-icons">create</i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <figure class="product-image my-0"><img src="mobile/img/mosque.png"
                                            width="70" height="70" alt="" class=""></figure>
                                </div>
                                <div class="col pl-0">
                                    <h6 class="text-dark my-0">2. Data Status Masjid/Mushola</h6>
                                    <p class="text-secondary mb-1">Melihat lebih lanjut List Masjid Yang dan status
                                        Masjid yang Anda Daftarkan.</p>

                                </div>
                                <div class="col-auto pl-0 align-self-center">
                                    <a href="{{ route('mobilelistmasjid') }}"
                                        class="btn btn-default button-rounded-56 shadow">
                                        <i class="material-icons">list</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <figure class="product-image my-0"><img src="mobile/img/registrasi.png"
                                            width="70" height="70" alt="" class=""></figure>
                                </div>
                                <div class="col pl-0">
                                    <h6 class="text-dark my-0">3. Login</h6>
                                    <p class="text-secondary mb-1">Jika status Pendaftaran telah diverifikasi, maka
                                        silahkan login Disini.</p>

                                </div>
                                <div class="col-auto pl-0 align-self-center">
                                    <a href="{{ route('mobile.login') }}"
                                        class="btn btn-default button-rounded-56 shadow">
                                        <i class="material-icons">list</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>





            <style>
                /* background putih menembus kiri-kanan */
                .mobile-menu-full {
                    background: #fff;
                    width: 100vw;
                    /* ⬅️ KUNCI */
                    margin-left: 50%;
                    transform: translateX(-50%);
                    /* ⬅️ KUNCI */
                }


                /* isi tetap rapi & tidak nempel */
                .mobile-menu-inner {
                    padding: 16px 12px;
                }

                /* grid menu */
                .mobile-menu-grid {
                    display: grid;
                    grid-template-columns: repeat(4, 1fr);
                    gap: 14px;
                }

                .mobile-menu-item {
                    text-align: center;
                    text-decoration: none;
                    color: #333;
                }

                .menu-icon {
                    width: 56px;
                    height: 56px;
                    margin: 0 auto 6px;
                    border-radius: 12px;
                    background: #f4f6f8;

                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .menu-icon span {
                    color: #1ba43b;
                    /* hijau lebih tua */
                }

                .menu-text span {
                    color: #1e7e34;
                    /* hijau lebih tua */
                }


                .menu-item {
                    text-align: center;
                }

                .menu-icon span {
                    font-size: 28px;
                    display: block;
                    margin-bottom: 4px;
                }

                .menu-text {
                    font-size: 9px;
                    line-height: 1.2;

                }

                .menu-item {
                    text-align: center;
                    cursor: pointer;
                    -webkit-tap-highlight-color: transparent;
                    /* Hapus garis saat tap di mobile */
                    outline: none;
                    /* Hapus garis saat focus */
                }


                /* KOTAK ICON */
                .menu-icon {
                    width: 62px;
                    height: 62px;
                    margin: 0 auto 6px;
                    background: #ffffff;
                    border-radius: 14px;
                    display: flex;
                    align-items: center;
                    justify-content: center;

                    transition: transform 0.15s ease, box-shadow 0.15s ease;
                }

                /* ICON */
                .menu-icon span {
                    font-size: 32px;
                    color: #02a31a;
                    transition: transform 0.15s ease;
                }

                /* SAAT DIKLIK / TAP */
                .menu-item:active .menu-icon {
                    transform: scale(1.12);
                    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
                }

                .menu-item:active .menu-icon span {
                    transform: scale(1.15);
                }
            </style>

            <!-- video testimoni -->
            <h6 class="subtitle">Video Testimoni</h6>

            <div class="swiper mobileVideoTestimonialSwiper">
                <div class="swiper-wrapper">

                    @foreach ($testimonials->whereNotNull('video') as $testimonial)
                        <div class="swiper-slide">

                            <div class="card shadow-sm border-0 mb-3 video-testimonial-card">

                                <div class="ratio ratio-16x9">
                                    <video controls preload="metadata" class="w-100 rounded-top">
                                        <source src="{{ asset('public/storage/' . $testimonial->video) }}"
                                            type="video/mp4">
                                    </video>
                                </div>

                                <div class="card-body py-2 text-center">
                                    <h6 class="mb-0">
                                        {{ $testimonial->nama_testi }}
                                    </h6>
                                    <small class="text-muted">
                                        {{ $testimonial->keterangan }}
                                    </small>
                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            </div>



            <!-- page content ends -->
            <h6 class="subtitle">Testimonial</h6>

            <div class="swiper testimonial-vertical">
                <div class="swiper-wrapper">

                    @foreach ($testimonials->whereNotNull('photo') as $testimonial)
                        <div class="swiper-slide">

                            <div class="card shadow-sm border-0 testimonial-card">

                                <div class="card-body d-flex align-items-start testimonial-row">


                                    {{-- FOTO --}}
                                    <div class="testimonial-photo">
                                        <img src="{{ asset('public/storage/foto_pengelola/' . $testimonial->photo) }}"
                                            alt="{{ $testimonial->nama_testi }}">
                                    </div>

                                    {{-- TEKS --}}
                                    <div class="testimonial-content">
                                        <h6 class="mb-1">
                                            {{ $testimonial->nama_testi }}
                                        </h6>

                                        <small class="text-muted d-block mb-1">
                                            {{ $testimonial->keterangan }}
                                        </small>

                                        <p class="small fst-italic mb-0">
                                            “{{ Str::limit($testimonial->ucapan, 90) }}”
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            </div>


            <!-- page content ends -->
        </div>




        <div class="container-fluid warna-background  text-white mt-3">
            <div class="row">
                <div class="container">
                    <div class="row  py-4 ">
                        <div class="col">
                            <h3 class="text-uppercase mb-3">Cita Amanat Martadiredja</h3>
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
    </style>
    <div class="footer">
        <nav class="navi">

            <a href="{{ route('mobilelandingpage') }}" class="navi__link navi__link--active">
                <i class="material-icons navi__icon--active">dashboard</i>
                <span class="navi__text--active">Home</span>
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



    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="header-title mb-0">Logout</h5>
                </div>
                <div class="modal-body text-center pr-4 pl-4">


                    <h5 class="my-3 text-success">Anda Berhasil Logout</h5>

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

    <!-- nouislider js -->
    <script src="mobile/vendor/nouislider/nouislider.min.js"></script>

    <!-- chart js -->
    <script src="mobile/vendor/chartjs/Chart.min.js"></script>
    <script src="mobile/vendor/chartjs/utils.js"></script>

    <!-- chosen multiselect js -->
    <script src="mobile/vendor/chosen_v1.8.7/chosen.jquery.min.js"></script>

    <!-- template custom js -->
    <script src="mobile/js/main.js"></script>

    <!-- page level script -->
    <script>
        $(window).on('load', function() {
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

            /* range picker for filter */
            var html5Slider = document.getElementById('rangeslider');
            noUiSlider.create(html5Slider, {
                start: [0, 100],
                connect: true,
                range: {
                    'min': 0,
                    'max': 500
                }
            });

            var inputNumber = document.getElementById('input-number');
            var select = document.getElementById('input-select');

            html5Slider.noUiSlider.on('update', function(values, handle) {
                var value = values[handle];

                if (handle) {
                    inputNumber.value = value;
                } else {
                    select.value = Math.round(value);
                }
            });
            select.addEventListener('change', function() {
                html5Slider.noUiSlider.set([this.value, null]);
            });
            inputNumber.addEventListener('change', function() {
                html5Slider.noUiSlider.set([null, this.value]);
            });

            /* chosen select*/
            $(".chosen").chosen();
        });

        /* chart js */
        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
            'November', 'December'
        ];
        var config = {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: '#805433',
                    borderColor: '#FFC400',
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                title: {
                    display: false,
                    text: 'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = new Chart(ctx, config);
        };
    </script>
    <script>
        function toggleExpand(card) {
            const text = card.querySelector('.collapsible-text');
            const icon = card.querySelector('.expand-icon');

            text.classList.toggle('expanded');

            // toggle icon rotate
            icon.classList.toggle('expanded-icon');
        }
    </script>
    <script>
        new Swiper('.testimonial-vertical', {
            direction: 'vertical',
            slidesPerView: 3,
            spaceBetween: 12,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            mousewheel: true,
        });
    </script>
    <script>
        new Swiper('.mobileVideoTestimonialSwiper', {
            slidesPerView: 1.05,
            spaceBetween: 14,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: true,
            },
        });
    </script>


    @if (session('logout_success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#logoutModal').modal('show');
            });
        </script>
    @endif

    <!-- jquery, popper and bootstrap js -->
    <script src="mobile/js/jquery-3.3.1.min.js"></script>
    <script src="mobile/js/popper.min.js"></script>
    <script src="mobile/vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <!-- swiper js -->

    <script src="mobile/vendor/swiper/js/swiper.min.js"></script>

</body>

</html>
