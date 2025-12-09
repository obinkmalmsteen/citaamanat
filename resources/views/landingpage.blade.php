<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cita Amanat Martadiredja</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/mosque/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/mosque/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/mosque/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/mosque/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



</head>

<body class="index-page">

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar d-none d-lg-block">
            <div class="topbar-inner">
                <div class="row gx-0">
                    <div class="col-lg-7 text-start">
                        {{-- <div class="h-100 d-inline-flex align-items-center me-4">
                            <span class="fa fa-phone-alt me-2 text-dark"></span>
                            <a href="#" class="text-secondary"><span>+012 345 6789</span></a>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center">
                            <span class="far fa-envelope me-2 text-dark"></span>
                            <a href="#" class="text-secondary"><span>info@example.com</span></a>
                        </div> --}}
                    </div>
                    <div class="col-lg-5 text-end">
                        <div class="h-100 d-inline-flex align-items-center">
                            <span class="text-body">Follow Us:</span>
                            <a class="text-dark px-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="text-dark px-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="text-dark px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="text-dark px-2" href=""><i class="fab fa-instagram"></i></a>
                            <a class="text-body ps-4" href="{{ route('login') }}"><i
                                    class="fa fa-lock text-dark me-1"></i>login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-1 navbar-transparent">

                <a href="{{ route('landingpage') }}" class="navbar-brand">

                    <h3 class="mb-0"> <span><img src="/mosque/img/logoyayasan.png" class="img-fluid flex-shrink-10"
                                alt="" width="50"> </span><span class="text-primary fs-5">Cita Amanat
                            Martadiredja</span> </h3>
                </a>
                <button class="navbar-toggler p-0 no-btn-style" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" aria-label="Toggle navigation">
                    <span class="fa fa-bars text-primary fs-3"></span>
                </button>


                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav ms-lg-auto mx-xl-auto">
                        <a href="{{ route('landingpage') }}" class="nav-item nav-link active">Beranda</a>
                        <a href="{{ route('aktifitas') }}" class="nav-item nav-link">Aktifitas</a>
                        <a href="{{ route('tentangkami') }}" class="nav-item nav-link">Tentang Kami</a>
                        <a href="{{ route('acara') }}" class="nav-item nav-link">Acara</a>
                        {{-- <a href="{{ route('kontakkami') }}" class="nav-item nav-link">Kontak Kami</a> --}}
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0 rounded-0">
                                <a href="{{ route('testimoni') }}" class="dropdown-item">Testimonial</a>
                                <a href="{{ route('listmasjid') }}" class="dropdown-item">List Masjid</a>
                                <a href="{{ route('registrasi') }}" class="dropdown-item">Registrasi</a>
                                <a href="{{ route('listdonatur') }}" class="dropdown-item">Donatur</a>
                            </div>
                        </div>

                    </div>
                    {{-- <a href="" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">Donate</a> --}}
                </div>
            </nav>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Topbar start -->
    <div class="container-fluid ">
        <div class="container topbar d-none d-lg-block">

        </div>
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-1 navbar-transparent">


            </nav>
        </div>
    </div>
    <!-- Topbar End -->





    <!-- Hero Start -->
    <div class="container-fluid hero-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <p class="fs-5 text-uppercase text-white"><b>Selamat Datang Di Laman</b></p>
                        <h1 class="display-6 text-black">Cita Amanat Martadiredja</h1>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero End -->
    <style>
        /* Container indikator harus bisa di-scroll */
        .carousel-indicators {
            position: absolute;
            bottom: -20px;
            left: 0;
            right: 0;
            width: 100%;
            overflow-x: auto;
            white-space: nowrap;
            padding: 5px 10px;
            text-align: left !important;
            /* ⬅ memastikan mulai dari kiri */
            justify-content: flex-start !important;
            /* ⬅ paksa align kiri */
            scrollbar-width: none;
        }

        .carousel-indicators::-webkit-scrollbar {
            display: none;
            /* Chrome */
        }

        /* Membuat titik tetap bulat */
        .carousel-indicators [data-bs-target] {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #ffffff;
            opacity: 0.4;
            margin: 0 4px;
            flex: 0 0 auto;
            /* supaya ukuran tidak mengecil */
        }

        /* Titik aktif */
        .carousel-indicators .active {
            opacity: 1;
            background-color: #0d6efd;
        }

        .purecounter {
            font-weight: 600 !important;
            font-size: 2.4rem !important;
        }

        .shadow-sm:hover {
            transform: translateY(-3px);
            transition: 0.3s;
        }

        .counter-box {
            background-color: #f9f9f9;
            /* abu tipis sekali */
            border: 1px solid #efefef;
            /* garis halus */
        }

        .counter-box:hover {
            transform: translateY(-3px);
            transition: 0.3s ease;
        }

        .purecounter {
            font-weight: 700;
            font-size: 2.8rem;
        }
    </style>



    <!-- About Satrt -->
    <div class="container-fluid about py-15">
        <div class="container py-5">
            <div class="row g-5 mb-5">
                <div class="col-xl-6">
                    <div class="row g-4">
                        <div id="carouselMasjid" class="carousel slide" data-ride="carousel">
                            <div id="staticCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    @php
                                        $images = [
                                            'mosque/fotomasjid/masjid001.jpg',
                                            'mosque/fotomasjid/masjid002.jpg',
                                            'mosque/fotomasjid/masjid003.jpg',
                                            'mosque/fotomasjid/masjid004.jpg',
                                            'mosque/fotomasjid/masjid005.jpg',
                                            'mosque/fotomasjid/masjid006.jpg',
                                            'mosque/fotomasjid/masjid007.jpg',
                                            'mosque/fotomasjid/masjid008.jpg',
                                            'mosque/fotomasjid/masjid009.jpg',
                                            'mosque/fotomasjid/masjid010.jpg',
                                            'mosque/fotomasjid/masjid011.jpg',
                                            'mosque/fotomasjid/masjid012.jpg',
                                            'mosque/fotomasjid/masjid013.jpg',
                                            'mosque/fotomasjid/masjid014.jpg',
                                            'mosque/fotomasjid/masjid015.jpg',
                                            'mosque/fotomasjid/masjid016.jpg',
                                            'mosque/fotomasjid/masjid017.jpg',
                                            'mosque/fotomasjid/masjid018.jpg',
                                            'mosque/fotomasjid/masjid019.jpg',
                                            'mosque/fotomasjid/masjid020.jpg',

                                            'mosque/fotomasjid/masjid021.jpg',
                                            'mosque/fotomasjid/masjid022.jpg',
                                            'mosque/fotomasjid/masjid023.jpg',
                                            'mosque/fotomasjid/masjid024.jpg',
                                            'mosque/fotomasjid/masjid025.jpg',
                                            'mosque/fotomasjid/masjid026.jpg',
                                            'mosque/fotomasjid/masjid027.jpg',
                                            'mosque/fotomasjid/masjid028.jpg',
                                        ];
                                    @endphp

                                    <!-- INDICATORS -->
                                    <div class="carousel-indicators">
                                        @foreach ($images as $key => $img)
                                            <button type="button" data-bs-target="#staticCarousel"
                                                data-bs-slide-to="{{ $key }}"
                                                class="{{ $key === 0 ? 'active' : '' }}"
                                                aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                                                aria-label="Slide {{ $key + 1 }}"></button>
                                        @endforeach
                                    </div>

                                    @foreach ($images as $key => $img)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <img src="{{ asset($img) }}" class="d-block w-100 rounded"
                                                style="height:350px; object-fit:cover;"
                                                alt="Slide {{ $key + 1 }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            {{-- <a class="carousel-control-prev" href="#carouselMasjid" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Prev</span>
    </a>
    <a class="carousel-control-next" href="#carouselMasjid" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a> --}}
                        </div>
                        {{-- pure counter --}}
                        <div class="container my-4">
                            <div class="row g-3">

                                <!-- Item 1 -->
                                <div class="col-12 col-md-4">
                                    <div class="counter-box p-3 text-center rounded-3 shadow-sm h-100">
                                        <h2 class="text-primary mb-2">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="{{ $masjidBelumDisetujui }}"
                                                data-purecounter-duration="2"></span>
                                        </h2>
                                        <small class="fw-bold text-secondary">
                                            Masjid Pendaftar Baru
                                        </small>
                                    </div>
                                </div>

                                <!-- Item 2 -->
                                <div class="col-12 col-md-4">
                                    <div class="counter-box p-3 text-center rounded-3 shadow-sm h-100">
                                        <h2 class="text-primary mb-2">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="{{ $masjidDisetujui }}"
                                                data-purecounter-duration="2"></span>
                                        </h2>
                                        <small class="fw-bold text-secondary">
                                            Masjid Sudah Terverifikasi
                                        </small>
                                    </div>
                                </div>

                                <!-- Item 3 -->
                                <div class="col-12 col-md-4">
                                    <div class="counter-box p-3 text-center rounded-3 shadow-sm h-100">
                                        <h2 class="text-primary mb-2">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="{{ $totalRequestRealisasi }}"
                                                data-purecounter-duration="2"></span>
                                        </h2>
                                        <small class="fw-bold text-secondary">
                                            Jumlah Realisasi Token
                                        </small>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- // --}}
                        {{-- <div class="col-6">
                            <img src="/mosque/img/about2.png" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s"
                                alt="">
                            <img src="/mosque/img/003.png" class="img-fluid pt-3 wow zoomIn" data-wow-delay="0.1s"
                                alt="">
                        </div> --}}
                    </div>
                </div>


                <div class="col-xl-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="fs-5 text-uppercase text-primary"><b>Program Utama Kami</b></p>
                    <h1 class="display-5 pb-4 m-0">Terangi Beribu Masjid & Mushola</h1>
                    <p class="pb-4" style="text-align: justify;">
                        Sebuah gerakan mengembalikan kejayaan Masjid dan Mushola sebagai pusat dari
                        kegiatan Agama, mendidik dan mencetak generasi berjiwa Islami dengan mewujudkan tempat yang
                        nyaman dan asri serta penerangan yang baik dan cukup.

                        Kami hadir menyalurkan dan memastikan setiap Masjid dan Mushola tersedia token listrik
                        yang cukup, demi kelangsungan operasional masjid yang sehat.
                    </p>


                    <div class="bg-light p-3 mb-4">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-3">
                                <img src="/mosque/img/logoyayasan.png" class="img-fluid rounded-circle"
                                    alt="">
                            </div>
                            <div class="col-9">
                                <p class="mb-0 justify"><i>"Kami Akan Berusaha Untuk Mewujudkan Sarana Ibadah Yang
                                        Layak,
                                        Nyaman, dan
                                        Berkelanjutan Melalui Revitalisasi Insfrastruktur Masjid dan Mushola."</i></p>
                            </div>

                        </div>
                    </div>





                </div>
            </div>

            <div class="container text-center bg-success-custom py-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-2">
                        <i class="fa fa-mosque fa-5x text-white"></i>
                    </div>
                    <div class="col-lg-7 text-center text-primary">
                        <h5 class="mb-0 text-light">"Penerangan adalah fasilitas penting yang menunjang
                            kenyamanan dan
                            kekhusyukan beribadah di masjid. <br> Cahaya yang menerangi masjid, InsyaAllah
                            menjadi
                            cahaya bagi para jamaahnya."</h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- kolom registrasi  -->
    <div class="container-fluid activities bg-light py-10 wow fadeIn">
        <div class="container py-10">
            <div class="mx-auto text-center mb-3 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                {{-- <p class="fs-5 text-uppercase text-primary">Mulai</p> --}}
                <h3 class="display-6">Registrasi Masjid / Mushola Anda </h3>
            </div>

            <div class="row g-4">


                <div class="col-lg-6 col-xl-4">

                    <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.5s">

                        <i class="fa fa-pen fa-4x text-dark"></i>

                        <div class="ms-4">

                            <h4>1. Daftarkan Masjid / Mushola </h4>
                            <p class="mb-4">Silakan daftarkan masjid baru melalui tombol di bawah ini:</p>
                            <a href="{{ route('registrasi') }}" class="btn btn-primary px-3">Daftar
                                Sekarang</a>
                            <div class="btn-md-square bg-primary rounded-circle position-absolute"
                                style="top: 25px; left: -25px;">
                                <i class="fa fa-quote-left text-dark"></i>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-6 col-xl-4">
                    <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.1s">
                        <i class="fa fa-mosque fa-4x text-dark"></i>
                        <div class="ms-4">
                            <h4>2. Data Masjid / Mushola</h4>
                            <p class="mb-4">Melihat lebih lanjut List Masjid Yang Sudah Mendaftar dan Untuk
                                Mengetahui Status Masjid, Apakah Sudah Disetujui Atau Belum Dari Masjid Yang
                                Anda Daftarkan.</p>
                            <a href="{{ route('data.masjid.publik') }}" class="btn btn-primary px-3">Lihat
                                Data
                                Pendaftar</a>
                        </div>
                    </div>
                </div>



                <div class="col-lg-6 col-xl-4">
                    <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.1s">
                        <i class="fa fa-book fa-4x text-dark"></i>
                        <div class="ms-4">
                            <h4>3. Login</h4>
                            <p class="mb-4">Jika status Pendaftaran telah diverifikasi, maka silahkan login
                                ID dan
                                password adalah Nomor ID Pelangan yang didaftarkan.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary px-3">Login</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!--  Activities Start -->





    <div class="container-fluid testimonial py-5">
        <div class="container py-15">
            <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                {{-- <p class="fs-5 text-uppercase text-primary">MAPS</p> --}}
                <h3 class="display-6">Sebaran Lokasi Masjid</h3>
            </div>
            <div class="mb-1">
                <label for="map">Lokasi</label>
                <div id="map" style="height: 400px;  border-radius: 10px;"></div>
            </div>
        </div>
    </div>
    <!-- MAP -->


    <!-- MAP END-->

    <!-- Events Start
        <div class="container-fluid event py-5">
            <div class="container py-5">
                <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Upcoming <span class="text-primary">Events</span></h1>
                <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
                    <div class="col-3 col-lg-2 pe-0">
                        <div class="text-center border-bottom border-dark py-3 px-2">
                            <h6>01 Jan 2045</h6>
                            <p class="mb-0">Fri 06:55</p>
                        </div>
                    </div>
                    <div class="col-9 col-lg-6 border-start border-dark pb-5">
                        <div class="ms-3">
                            <h4 class="mb-3">Milad Un Nabi</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
                            <a href="#" class="btn btn-primary px-3">Join Now</a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="overflow-hidden mb-5">
                            <img src="/mosque/img/events-1.jpg" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                </div>
                <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.3s">
                    <div class="col-3 col-lg-2 pe-0">
                        <div class="text-center border-bottom border-dark py-3 px-2">
                            <h6>01 Jan 2045</h6>
                            <p class="mb-0">Wed 11:30</p>
                        </div>
                    </div>
                    <div class="col-9 col-lg-6 border-start border-dark pb-5">
                        <div class="ms-3">
                            <h4 class="mb-3">Eid Ul Fitr</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
                            <a href="#" class="btn btn-primary px-3">Join Now</a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="overflow-hidden mb-5">
                            <img src="/mosque/img/events-2.jpg" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                </div>
                <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.5s">
                    <div class="col-3 col-lg-2 pe-0">
                        <div class="text-center border-bottom border-dark py-3 px-2">
                            <h6>01 Jan 2045</h6>
                            <p class="mb-0">Thu 11:30</p>
                        </div>
                    </div>
                    <div class="col-9 col-lg-6 border-start border-dark pb-5">
                        <div class="ms-3">
                            <h4 class="mb-3">Eud Ul Azha</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
                            <a href="#" class="btn btn-primary px-3">Join Now</a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="overflow-hidden mb-5">
                            <img src="/mosque/img/events-3.jpg" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        Events End -->


    <!-- Sermon Start
        <div class="container-fluid sermon py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <p class="fs-5 text-uppercase text-primary">Sermons</p>
                    <h1 class="display-3">Join The Islamic Community</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-6 col-xl-4">
                        <div class="sermon-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="overflow-hidden p-4 pb-0">
                                <img src="/mosque/img/sermon-1.jpg" class="img-fluid w-100" alt="">
                            </div>
                            <div class="p-4">
                                <div class="sermon-meta d-flex justify-content-between pb-2">
                                    <div class="">
                                        <small><i class="fa fa-calendar me-2 text-muted"></i><a href="" class="text-muted me-2">13 Nov 2023</small></a>
                                        <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted">Admin</small></a>
                                    </div>
                                    <div class="">
                                        <a href="" class="me-1"><i class="fas fa-video text-muted"></i></a>
                                        <a href="" class="me-1"><i class="fas fa-headphones text-muted"></i></a>
                                        <a href="" class="me-1"><i class="fas fa-file-alt text-muted"></i></a>
                                        <a href="" class=""><i class="fas fa-image text-muted"></i></a>
                                    </div>
                                </div>
                                <a href="" class="d-inline-block h4 lh-sm mb-3">How to get closer to Allah</a>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                   <div class="col-lg-6 col-xl-4">
                        <div class="sermon-item wow fadeIn" data-wow-delay="0.3s">
                            <div class="overflow-hidden p-4 pb-0">
                                <img src="/mosque/img/sermon-2.jpg" class="img-fluid w-100" alt="">
                            </div>
                            <div class="p-4">
                                <div class="sermon-meta d-flex justify-content-between pb-2">
                                    <div class="">
                                        <small><i class="fa fa-calendar me-2 text-muted"></i><a href="" class="text-muted me-2">13 Nov 2023</small></a>
                                        <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted">Admin</small></a>
                                    </div>
                                    <div class="">
                                        <a href="" class="me-1"><i class="fas fa-video text-muted"></i></a>
                                        <a href="" class="me-1"><i class="fas fa-headphones text-muted"></i></a>
                                        <a href="" class="me-1"><i class="fas fa-file-alt text-muted"></i></a>
                                        <a href="" class=""><i class="fas fa-image text-muted"></i></a>
                                    </div>
                                </div>
                                <a href="" class="d-inline-block h4 lh-sm mb-3">Importance of Hajj in Islam</a>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                   <div class="col-lg-6 col-xl-4">
                        <div class="sermon-item wow fadeIn" data-wow-delay="0.5s">
                            <div class="overflow-hidden p-4 pb-0">
                                <img src="/mosque/img/sermon-3.jpg" class="img-fluid w-100" alt="">
                            </div>
                            <div class="p-4">
                                <div class="sermon-meta d-flex justify-content-between pb-2">
                                    <div class="">
                                        <small><i class="fa fa-calendar me-2 text-muted"></i><a href="" class="text-muted me-2">13 Nov 2023</small></a>
                                        <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted">Admin</small></a>
                                    </div>
                                    <div class="">
                                        <a href="" class="me-1"><i class="fas fa-video text-muted"></i></a>
                                        <a href="" class="me-1"><i class="fas fa-headphones text-muted"></i></a>
                                        <a href="" class="me-1"><i class="fas fa-file-alt text-muted"></i></a>
                                        <a href="" class=""><i class="fas fa-image text-muted"></i></a>
                                    </div>
                                </div>
                                <a href="" class="d-inline-block h4 lh-sm mb-3">Importance of “Piller” of Islam</a>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        Sermon End -->


    <!-- Blog Start
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Latest From <span class="text-primary">Our Blog</span></h1>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-6 col-xl-4">
                        <div class="blog-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="blog-img position-relative overflow-hidden">
                                <img src="/mosque/img/blog-1.jpg" class="img-fluid w-100" alt="">
                                <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0 end-0">01 Jan 2045</div>
                            </div>
                            <div class="p-4">
                                <div class="blog-meta d-flex justify-content-between pb-2">
                                    <div class="">
                                        <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted me-2">By Admin</small></a>
                                        <small><i class="fa fa-comment-alt me-2 text-muted"></i><a href="" class="text-muted me-2">12 Comments</small></a>
                                    </div>
                                    <div class="">
                                        <a href=""><i class="fas fa-bookmark text-muted"></i></a>
                                    </div>
                                </div>
                                <a href="" class="d-inline-block h4 lh-sm mb-3">Importance of “Piller” of Islam</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                aliquip ex ea commodo consequat.</p>
                                <a href="#" class="btn btn-primary px-3">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="blog-item wow fadeIn" data-wow-delay="0.3s">
                            <div class="blog-img position-relative overflow-hidden">
                                <img src="/mosque/img/blog-2.jpg" class="img-fluid w-100" alt="">
                                <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0 end-0">01 Jan 2045</div>
                            </div>
                            <div class="p-4">
                                <div class="blog-meta d-flex justify-content-between pb-2">
                                    <div class="">
                                        <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted me-2">By Admin</small></a>
                                        <small><i class="fa fa-comment-alt me-2 text-muted"></i><a href="" class="text-muted me-2">12 Comments</small></a>
                                    </div>
                                    <div class="">
                                        <a href=""><i class="fas fa-bookmark text-muted"></i></a>
                                    </div>
                                </div>
                                <a href="" class="d-inline-block h4 lh-sm mb-3">How to get closer to Allah</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                aliquip ex ea commodo consequat.</p>
                                <a href="#" class="btn btn-primary px-3">More Details</a>
                            </div>
                        </div>
                    </div>
                   <div class="col-lg-6 col-xl-4">
                        <div class="blog-item wow fadeIn" data-wow-delay="0.5s">
                            <div class="blog-img position-relative overflow-hidden">
                                <img src="/mosque/img/blog-3.jpg" class="img-fluid w-100" alt="">
                                <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0 end-0">01 Jan 2045</div>
                            </div>
                            <div class="p-4">
                                <div class="blog-meta d-flex justify-content-between pb-2">
                                    <div class="">
                                        <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted me-2">By Admin</small></a>
                                        <small><i class="fa fa-comment-alt me-2 text-muted"></i><a href="" class="text-muted me-2">12 Comments</small></a>
                                    </div>
                                    <div class="">
                                        <a href=""><i class="fas fa-bookmark text-muted"></i></a>
                                    </div>
                                </div>
                                <a href="" class="d-inline-block h4 lh-sm mb-3">Importance of Hajj in Islam</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                aliquip ex ea commodo consequat.</p>
                                <a href="#" class="btn btn-primary px-3">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        Blog End -->


    <!-- Team Start


        <div class="container-fluid team py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <p class="fs-5 text-uppercase text-primary">Our Team</p>
                    <h1 class="display-3">Meet Our Organizer</h1>
                </div>
                <div class="row g-5">
                    <div class="col-lg-4 col-xl-5">
                        <div class="team-img wow zoomIn" data-wow-delay="0.1s">
                            <img src="/mosque/img/team-1.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-xl-7">
                        <div class="team-item wow fadeIn" data-wow-delay="0.1s">
                            <h1>Anamul Hasan</h1>
                            <h5 class="fw-normal fst-italic text-primary mb-4">President</h5>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. aliquip ex ea commodo consequat.</p>
                            <div class="team-icon d-flex pb-4 mb-4 border-bottom border-primary">
                                <a class="btn btn-primary btn-lg-square me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-lg-square me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a href="#" class="btn btn-primary btn-lg-square me-2"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="btn btn-primary btn-lg-square"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="team-item wow zoomIn" data-wow-delay="0.2s">
                                    <img src="/mosque/img/team-2.jpg" class="img-fluid w-100" alt="">
                                    <div class="team-content text-dark text-center py-3">
                                        <div class="team-content-inner">
                                            <h5 class="mb-0">Mustafa Kamal</h5>
                                            <p class="text-dark">Imam</p>
                                            <div class="team-icon d-flex align-items-center justify-content-center">
                                                <a class="btn btn-primary btn-sm-square me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                                <a class="btn btn-primary btn-sm-square me-2" href=""><i class="fab fa-twitter"></i></a>
                                                <a href="#" class="btn btn-primary btn-sm-square me-2"><i class="fab fa-instagram"></i></a>
                                                <a href="#" class="btn btn-primary btn-sm-square"><i class="fab fa-linkedin-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="team-item wow zoomIn" data-wow-delay="0.4s">
                                    <img src="/mosque/img/team-3.jpg" class="img-fluid w-100" alt="">
                                    <div class="team-content text-dark text-center py-3">
                                        <div class="team-content-inner">
                                            <h5 class="mb-0">Nahiyan Momen</h5>
                                            <p class="text-dark">Teacher</p>
                                            <div class="team-icon d-flex align-items-center justify-content-center">
                                                <a class="btn btn-primary btn-sm-square me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                                <a class="btn btn-primary btn-sm-square me-2" href=""><i class="fab fa-twitter"></i></a>
                                                <a href="#" class="btn btn-primary btn-sm-square me-2"><i class="fab fa-instagram"></i></a>
                                                <a href="#" class="btn btn-primary btn-sm-square"><i class="fab fa-linkedin-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="team-item wow zoomIn" data-wow-delay="0.6s">
                                    <img src="/mosque/img/team-4.jpg" class="img-fluid w-100" alt="">
                                    <div class="team-content text-dark text-center py-3">
                                        <div class="team-content-inner">
                                            <h5 class="mb-0">Asfaque Ali</h5>
                                            <p class="text-dark">Volunteer</p>
                                            <div class="team-icon d-flex align-items-center justify-content-center">
                                                <a class="btn btn-primary btn-sm-square me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                                <a class="btn btn-primary btn-sm-square me-2" href=""><i class="fab fa-twitter"></i></a>
                                                <a href="#" class="btn btn-primary btn-sm-square me-2"><i class="fab fa-instagram"></i></a>
                                                <a href="#" class="btn btn-primary btn-sm-square"><i class="fab fa-linkedin-in"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        Team End -->

    <div class="container-fluid testimonial py-15">
        <div class="container py-15">

            <div class="row">
                <!-- ============================= -->
                <!--  KOLOM KIRI: VIDEO            -->
                <!-- ============================= -->
                <div class="col-lg-6 mb-5">
                    <div class="text-center mx-auto mb-4" style="max-width: 700px;">
                        <p class="fs-5 text-uppercase text-primary">Testimonial Video</p>
                        <h5 class="display-6">Video Terbaru</h5>
                    </div>

                    <div class="swiper myVideoTestimonialSwiper">
                        <div class="swiper-wrapper">
                            @foreach ($testimonials->whereNotNull('video') as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testimonial-item p-3 shadow-sm bg-white rounded">
                                        <div class="ratio ratio-16x9 mb-3">
                                            <video controls class="rounded shadow-sm w-100">
                                                <source src="{{ asset('public/storage/' . $testimonial->video) }}"
                                                    type="video/mp4">
                                            </video>
                                        </div>
                                        <h5 class="text-center mb-1">{{ $testimonial->nama_testi }}</h5>
                                        <p class="text-muted text-center mb-2">{{ $testimonial->keterangan }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- ============================= -->
                <!--  KOLOM KANAN: TESTI FOTO/TEXT -->
                <!-- ============================= -->
                <div class="col-lg-6 mb-5">
                    <div class="text-center mx-auto mb-4" style="max-width: 700px;">
                        <p class="fs-5 text-uppercase text-primary">Testimonial</p>
                        <h1 class="display-6">Apa Kata Mereka</h1>
                    </div>

                    <div class="swiper myTestimonialSwiper">
                        <div class="swiper-wrapper">

                            @foreach ($testimonials->whereNotNull('photo') as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testimonial-item p-3 shadow-sm bg-white rounded">
                                        <div class="d-flex mb-3">
                                            <div class="position-relative">
                                                @if ($testimonial->photo)
                                                    <img src="{{ asset('public/storage/foto_pengelola/' . $testimonial->photo) }}"
                                                        class="img-fluid rounded"
                                                        style="width: 120px; height: 150px; object-fit: cover;">
                                                @else
                                                    <img src="/mosque/img/person.png" class="img-fluid rounded"
                                                        style="width: 100px; height: 130px; object-fit: cover;">
                                                @endif
                                            </div>

                                            <div class="ps-3 my-auto">
                                                <h5 class="mb-0">{{ $testimonial->nama_testi }}</h5>
                                                <p class="m-0">{{ $testimonial->keterangan }}</p>
                                            </div>
                                        </div>

                                        <p class="fs-5 fst-italic m-0">
                                            " {{ $testimonial->ucapan }} "
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>



    <!-- Sermon Start -->
    <div class="container-fluid sermon py-15">
        <div class="container py-15">
            <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <p class="fs-5 text-uppercase text-primary">Aktifitas Kami</p>
                <h3 class="display-7">Program yang Telah Direalisasikan dan Agenda Masa Depan</h3>
            </div>
            <div class="row g-4 justify-content-center">

                <div class="col-lg-6 col-xl-3">
                    <div class="sermon-item h-100 d-flex flex-column wow fadeIn" data-wow-delay="0.3s">
                        <div class="overflow-hidden p-4 pb-0">
                            <img src="/mosque/img/renov.png" class="img-fluid w-100" alt="">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <a href="" class="d-inline-block h4 lh-sm mb-3">Perbaikan Beribu Masjid &
                                Mushola</a>
                            <p class="mb-3" style="text-align: justify; flex-grow: 1;">Memperbaiki Bangunan,
                                memperkuat
                                Iman dalam wujudkan mimpi bersama untuk mempercantik
                                rumah-rumah Allah.

                                Mengembalikan masjid sebagai pusat ibadah, kebudayaan dan jantung peradaban
                                umat.
                                .</p>
                            <a href="{{ route('aktifitas') . '#bagian-perbaikan' }}" class="btn btn-primary px-3">
                                Lanjut Baca
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-3">
                    <div class="sermon-item h-100 d-flex flex-column wow fadeIn" data-wow-delay="0.3s">
                        <div class="overflow-hidden p-4 pb-0">
                            <img src="/mosque/img/indung6.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <a href="#" class="d-inline-block h4 lh-sm mb-3">Nyaah Ka Indung</a>
                            <p class="mb-3" style="text-align: justify; flex-grow: 1;">
                                Nyaah ka Indung sebuah program yang kami hadirkan sebagai bukti
                                kepedulian, cinta dan kasih kita kepada orang tua.
                            </p>
                            <a href="{{ route('aktifitas') . '#bagian-indung' }}" class="btn btn-primary px-3">
                                Lanjut Baca
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-3">
                    <div class="sermon-item h-100 d-flex flex-column wow fadeIn" data-wow-delay="0.3s">
                        <div class="overflow-hidden p-4 pb-0">
                            <img src="/mosque/img/adzancilik.png" class="img-fluid w-100" alt="">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <a href="" class="d-inline-block h4 lh-sm mb-3">Muadzin Cilik</a>
                            <p class="mb-3" style="text-align: justify; flex-grow: 1;">Program Muadzin Cilik yang
                                telah
                                diselenggarakan sejak Februari 2025 di Masjid Hunusl Khotimah, Cileunyi Bandung, </p>
                            <a href="{{ route('aktifitas') . '#bagian-muadzin' }}" class="btn btn-primary px-3">
                                Lanjut Baca
                            </a>



                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-3">
                    <div class="sermon-item h-100 d-flex flex-column wow fadeIn" data-wow-delay="0.3s">
                        <div class="overflow-hidden p-4 pb-0">
                            <img src="/mosque/img/Gurungaji.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">

                            <a href="" class="d-inline-block h4 lh-sm mb-3">Bantuan Honor Guru Ngaji</a>
                            <p class="mb-3" style="text-align: justify; flex-grow: 1;">Sebuah inisiatif nyata untuk
                                memberikan apresiasi dan dukungan Finansial kepada para guru ngaji di wilayah
                                kita.
                            </p>
                            <a href="{{ route('aktifitas') . '#bagian-ngaji' }}" class="btn btn-primary px-3">
                                Lanjut Baca
                            </a>


                        </div>
                    </div>
                </div>

            </div>

            <!-- Sermon End -->


        </div>

    </div>

    <!-- Modal Gambar Besar -->
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark border-0">
                <div class="modal-body p-0">

                    <img id="modalImage" src="" class="img-fluid w-100 rounded">

                </div>
            </div>
        </div>
    </div>


    <style>
        .footer-donatur {
            color: #fff;
            padding-bottom: 20px;
            font-family: "Inter", sans-serif;
        }

        /* Grid layout seperti contoh */
        .donatur-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
            gap: 20px 40px;
        }

        /* Nama donatur */
        .donatur-name {
            font-size: 14px;
            color: #ffffff;
            font-weight: 500;
            margin-bottom: 6px;
            transition: .2s;
        }

        /* Hover efek link style */
        .donatur-name:hover {
            color: #D79B19;
            /* branding emas */
        }

        /* alamat kecil */
        .donatur-address {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.65);
            line-height: 1.3;
        }

        /* Responsif */
        @media (max-width: 640px) {
            .donatur-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Wrapper fix circle */
        .avatar-wrapper {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.20);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Logo & Foto */
        .avatar-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .donatur-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar-wrapper {
            width: 50px;
            height: 50px;
            flex-shrink: 0;
        }

        .avatar-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .avatar-initial {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #ffc107;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #000;
            font-size: 14px;
        }

        .footer-line {
            border-top: 1px solid #ffc107;
            /* warna warning */
        }

        .footer-lineright {
            border-right: 1px solid #ffc107;
            /* warna warning */
        }
    </style>

    <!-- Footer Start -->
    <div class="container-fluid footer pt-15 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-15">
            <div class="row g-4 footer-inner ">
                <div class="col-md-4 col-lg-6 col-xl-2">
                    <div class="footer-item mt-5 mb-3">
                        <div class="col-12">
                            <img src="/mosque/img/logoyayasan.png" class="img-fluid rounded-circle" alt=""
                                class="img-fluid rounded" style="width: 200px; height: 200px; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-6 col-xl-4">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4"><span class="text-primary">Cita Amanat Martadiredja</span></h4>
                        <p class=" text-light m-0">Menjadi Pelopor Gerakan Filantropi yang memberdayakan Umat untuk
                            Kemandirian dan
                            kemulian dalam
                            bingkai Keimanan dan Ketaqwaan.</p>
                        {{-- <a href="" class="btn btn-primary py-2 px-4">Donate Now</a> --}}
                    </div>
                </div>

                <div class="col-md-4 col-lg-6 col-xl-4">
                    <div class="footer-item mt-15">
                        <div class="d-flex align-items-center  py-4">
                            <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i
                                    class="fa fa-map-marker-alt text-dark"></i></span>
                            <a href="" class="text-light">Puri Indah Cihampelas, Blok E7, No.15, Citapen,
                                Cihampelas, Kab Bandung Barat,
                                Jawa Barat, Indonesia</a>
                        </div>
                        <div class="d-flex align-items-center  mt-15">
                            <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i
                                    class="fa fa-phone-alt text-dark"></i></span>
                            <a href="" class="text-light">082 246 777 900</a>
                        </div>
                         <div class="d-flex align-items-center  py-4">
                            <span class="flex-shrink-0 btn-square bg-primary me-3 p-4 text-dark"><b>@</b></i></span>
                            <a href="" class="text-light">Terangiberibumasjid@gmail.com</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-lg-6 col-xl-2">
                    <div class="footer-item mt-5">
                        <h4 class="text-primary mb-4">Explore Link</h4>
                        <div class="d-flex flex-column align-items-start">
                            <a class="text-primary mb-2" href="{{ route('landingpage') }}"><i
                                    class="fa fa-check text-primary me-2"></i>Beranda</a>
                            <a class="text-light mb-2" href="{{ route('tentangkami') }}"><i
                                    class="fa fa-check text-light me-2"></i>Tentang Kami</a>
                            <a class="text-light mb-2" href="{{ route('aktifitas') }}"><i
                                    class="fa fa-check text-light me-2"></i>Aktifitas</a>
                            <a class="text-light mb-2" href="{{ route('acara') }}"><i
                                    class="fa fa-check text-light me-2"></i>Acara</a>
                            {{-- <a class="text-light mb-2" href="{{ route('kontakkami') }}"><i class="fa fa-check text-primary me-2"></i>Kontak Kami</a> --}}
                            <a class="text-light mb-2" href="{{ route('testimoni') }}"><i
                                    class="fa fa-check text-light me-2"></i>Testimonial</a>
                            <a class="text-light mb-2" href="{{ route('listmasjid') }}"><i
                                    class="fa fa-check text-light me-2"></i>List Masjid</a>

                        </div>
                    </div>
                </div>
            </div>

            {{-- baris1 --}}
            <div class="container  ">
                <div class="footer-line mb-15 "></div>
                <div class="row g-4 footer-inner ">

                    <div class="col-md-4 col-lg-6 col-xl-4">
                        <div class="footer-item mt-3">
                            <a class="text-light mb-1"><span class="text-primary">Donasi Terkumpul Sampai : <p
                                        class="mb-1 text-primary" id="tanggalSekarang"></p></span></a>
                            <h2 class="mt-4 mb-4 text-light"><span class="text-light">
                                    Rp {{ number_format($totalDonasi, 0, ',', '.') }} </span> </h2>
                            <a class="text-light mt-1"><span class="text-primary">Donatur Tetap :
                                    {{ $totalDonaturTetap }} <p class="mb-1 text-light"></p>Partisipan Kebaikan :
                                    {{ $totalDonaturTidakTetap }}</span></a>
                        </div>
                    </div>


                    <div class="col-md-4 col-lg-6 col-xl-5">

                        <div class="footer-item mt-5">

                            <h5 class="text-light mb-4"><span class="text-light fs-4">Penyaluran Donasi melalui :</span>
                            </h5>
                            <a class="mb-1 text-light">
                                <span class="text-primary fs-4">Yayasan Cita Amanat Martadiredja</span>
                            </a>

                            <h3 class="mb-1 text-primary">BNI 1967473460 </h3>
                            {{-- <a href="" class="btn btn-primary py-2 px-4">Donate Now</a> --}}
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-6 col-xl-3">
                        <div class="footer-item mt-4">
                            <h4 class="text-light mb-4"><span class="text-primary">Qris:</span></h4>
                            <div class="d-flex flex-column align-items-start">
                                <span class=""> <img src="/mosque/img/qris.png"
                                        class="img-fluid flex-shrink-10" alt="QRIS" width="120"
                                        style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#imageModal"
                                        onclick="showImageModal('/mosque/img/qrisCAM.jpg')">
                                </span>
                                <p class="mb-1 text-light"><i> Klik Gambar untuk Memperbesar.</i></p>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- bagian baris 2  --}}
                <div class="footer-donatur ">
                    <h4 class="text-light mt-3 mb-10"><span class="text-primary">Donatur Tetap:</span></h4>
                    <div class="footer-line  mb-3"></div>
                    <div class="donatur-grid">

                        @forelse($donaturTetap as $donatur)
                            <div class="donatur-item">

                                <div class="donatur-profile">
                                    <div class="avatar-wrapper">

                                        {{-- Logo --}}
                                        @if (!empty($donatur->logo_donatur))
                                            <img src="{{ asset('public/storage/logo_donatur/' . $donatur->logo_donatur) }}"
                                                class="avatar-image">

                                            {{-- Initial --}}
                                        @else
                                            @php
                                                // Pisahkan nama berdasarkan spasi
                                                $words = explode(' ', trim($donatur->nama_donatur));

                                                // Ambil maksimal 3 kata
                                                $initial = '';
                                                foreach (array_slice($words, 0, 3) as $w) {
                                                    $initial .= strtoupper(substr($w, 0, 1));
                                                }
                                            @endphp

                                            <div class="avatar-initial">
                                                {{ $initial }}
                                            </div>
                                        @endif
                                    </div>

                                    <div>
                                        <div class="donatur-name">
                                            {{ $donatur->nama_donatur }}
                                        </div>
                                        @if ($donatur->alamat_donatur)
                                            <div class="donatur-address">
                                                {{ $donatur->alamat_donatur }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <span class="text-light">Belum ada Donatur Tetap</span>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="container py-4">
                <div class="border-top border-secondary pb-4"></div>
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <a class="" href="#"> &copy; Cita Amanat Martadiredja 2025 , All Right
                            Reserved.</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                       
                        Designed By | Obink
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-light back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/mosque/lib/wow/wow.min.js"></script>
    <script src="/mosque/lib/easing/easing.min.js"></script>
    <script src="/mosque/lib/waypoints/waypoints.min.js"></script>
    <script src="/mosque/lib/owlcarousel/owl.carousel.min.js"></script>




    <!-- Template Javascript -->
    <script src="/mosque/js/main.js"></script>
    <script src="{{ asset('enno/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script>
        new PureCounter();
    </script>
    <script>
        var swiper = new Swiper(".myTestimonialSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
        });
    </script>
    <script>
        var swiper = new Swiper(".myVideoTestimonialSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
        });

        document.addEventListener("DOMContentLoaded", function() {
            const videos = document.querySelectorAll(".myVideoTestimonialSwiper video");

            videos.forEach(video => {

                // Ketika video mulai play → stop autoplay
                video.addEventListener("play", () => {
                    swiper.autoplay.stop();
                });

                // Ketika video di pause → mulai autoplay lagi
                video.addEventListener("pause", () => {
                    swiper.autoplay.start();
                });

                // Ketika video selesai → mulai autoplay lagi
                video.addEventListener("ended", () => {
                    swiper.autoplay.start();
                });

            });
        });
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const swiperEl = document.querySelector(".myVideoTestimonialSwiper");

            swiper.on('slideChange', function() {
                const videos = swiperEl.querySelectorAll("video");
                videos.forEach(v => v.pause());
            });
        });
    </script>
    <script>
        // aman: jika variabel tidak dikirim dari controller, gunakan array kosong
        const masjids = @json($masjids ?? []);
    </script>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- data dari controller (aman meskipun kosong) -->
    <script>
        const masjids = @json($masjids ?? []);
    </script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <style>
        .leaflet-tooltip-nama-masjid {
            background: rgba(255, 255, 255, 0.95);
            color: #222;
            font-weight: 600;
            border: 1px solid #ccc;
            padding: 2px 6px;
            border-radius: 6px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
            white-space: nowrap;
        }

        .img-wrapper {
            position: relative;
            display: inline-block;
        }

        .img-text {
            position: absolute;
            bottom: 30px;
            /* posisi: bisa bottom, top, atau center */
            left: 50%;
            transform: translateX(-50%);
            background: rgba(27, 27, 27, 0.4);
            /* putih transparan */
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: 100;
            text-align: center;
            width: max-content;
            max-width: 90%;
        }
    </style>



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


            // 👇 TAMBAHKAN BAGIAN INI DI SINI
            var greenIcon = L.icon({
                iconUrl: '/mosque/img/marker-greentua.png', // ganti sesuai lokasi file
                shadowUrl: '/mosque/img/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });
            // 👆 SAMPAI DI SINI


            // masjids adalah array dari PHP
            masjids.forEach(function(item) {

                if (!item.map_lokasi_masjid) return;

                let coords = item.map_lokasi_masjid.split(',');
                let lat = parseFloat(coords[0]);
                let lng = parseFloat(coords[1]);

                if (isNaN(lat) || isNaN(lng)) return;

                let marker = L.marker([lat, lng], {
                    icon: greenIcon
                }).addTo(map);

                marker.bindTooltip(item.nama_masjid, {
                    direction: 'top',
                    offset: [0, -10],
                    className: 'leaflet-tooltip-nama-masjid'
                });

                markersGroup.addLayer(marker);
            });

            if (markersGroup.getLayers().length > 0) {
                map.fitBounds(markersGroup.getBounds());
            }

        });
    </script>

    <script>
        function showImageModal(src) {
            document.getElementById('modalImage').src = src;
        }
    </script>
    <script>
        document.getElementById('tanggalSekarang').innerText =
            new Date().toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });
    </script>


</body>

</html>
