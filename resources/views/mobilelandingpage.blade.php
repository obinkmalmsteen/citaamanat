<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Cita Amanat martadiredja</title>

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

    <!-- Custom styles for this template -->
    <link href="mobile/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

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
                    <a href="notification.html" class="list-group-item list-group-item-action">Notification <span
                            class="badge badge-dark text-white">2</span></a>
                    <a href="all-products.html" class="list-group-item list-group-item-action">All Products</a>
                    <a href="my-order.html" class="list-group-item list-group-item-action">My Order</a>
                    <a href="profile.html" class="list-group-item list-group-item-action">My Profile</a>
                    <a href="controls.html" class="list-group-item list-group-item-action">Pages Controls <span
                            class="badge badge-light ml-2">Check</span></a>
                    <a href="setting.html" class="list-group-item list-group-item-action">Settings</a>
                    <a href="login.html" class="list-group-item list-group-item-action mt-4">Logout</a>
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

                .user-name {
                    max-width: 25vw;
                    display: -webkit-box;
                    -webkit-box-orient: vertical;
                    -webkit-line-clamp: 2;
                    overflow: hidden;
                    line-height: 1.2em;

                    text-align: right;
                    word-break: break-word;

                    font-size: 12px;
                    /* ⭐ PERKECIL HURUF */
                    font-weight: 400;
                    /* opsional, biar tidak terlalu tebal */
                    padding-right: -12px;
                }

                .user-name-title {
                    max-width: 50vw;
                    display: -webkit-box;
                    -webkit-box-orient: vertical;
                    -webkit-line-clamp: 2;
                    overflow: hidden;
                    line-height: 1.2em;

                    text-align: center;
                    word-break: break-word;

                    padding-left: 28px;
                    /* ⭐ JARAK DARI TEPI KIRI */
                }
            </style>

            <script>
                new Swiper('.news-slide', {
                    slidesPerView: 2,
                    spaceBetween: 10,
                    loop: true,

                    autoplay: {
                        delay: 3000, // 3 detik
                        disableOnInteraction: false, // tetap lanjut meski disentuh
                        pauseOnMouseEnter: true, // pause saat hover (desktop)
                    },

                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },

                    breakpoints: {
                        768: {
                            slidesPerView: 3,
                        },
                        992: {
                            slidesPerView: 4,
                        }
                    }
                });
            </script>


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
                                    <button class="btn btn-default button-rounded-56 shadow"><i
                                            class="material-icons">playlist_add_check</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>

            <div class="container mb-3">
                <div class="row">
                    <div class="col text-center">
                        <h5 class="subtitle mb-1">Most Exciting Feature</h5>
                        <p class="text-secondary">Take a look at our services</p>
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-6 col-md-3">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <i class="material-icons mb-4 md-36 text-template">card_giftcard</i>
                                <h2>2546</h2>
                                <p class="text-secondary text-mute">Gift it out</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <i class="material-icons mb-4 md-36 text-template">subscriptions</i>
                                <h2>635</h2>
                                <p class="text-secondary text-mute">Monthly Billed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <i class="material-icons mb-4 md-36 text-template">local_florist</i>
                                <h2>1542</h2>
                                <p class="text-secondary text-mute">Eco environment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <i class="material-icons mb-4 md-36 text-template">location_city</i>
                                <h2>154</h2>
                                <p class="text-secondary text-mute">Four Offices</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="subtitle">Testimonials </h6>

            <!-- Swiper -->
            <div class="swiper-container small-slide">

                <div class="swiper-slide">
                    <div class="card ">

                    </div>
                </div>

            </div>



        </div>

        <div class="container-fluid warna-background  text-white mb-3">
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
        <div class="footer">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-auto">
                            <a href="{{ route('mobilelandingpage') }}" class="btn btn-link-default active ">
                                <i class="material-icons">home</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('mobileaktifitas') }}" class="btn btn-link-default ">
                                <i class="material-icons">insert_chart_outline</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('mobilelistmasjid') }}" class="btn btn-link-default">
                                <i class="material-icons">local_mall</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            @if (Auth::check())
                                {{-- SUDAH LOGIN --}}
                                <a href="{{ route('mobilerequesttoken') }}" class="btn btn-link-default">
                                    <i class="material-icons">favorite</i>
                                </a>
                            @else
                                {{-- BELUM LOGIN --}}
                                <a href="{{ route('mobile.login') }}" class="btn btn-link-default">
                                    <i class="material-icons">favorite</i>
                                </a>
                            @endif
                        </div>

                        <div class="col-auto">
                            <a href="profile.html" class="btn btn-link-default">
                                <i class="material-icons">account_circle</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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


    @if (session('logout_success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#logoutModal').modal('show');
            });
        </script>
    @endif


</body>

</html>
