<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Obink">

    <title>TAMAMA . Tentang kami</title>



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
    <!-- Custom styles for this template -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('mobile/css/mobile-menu.css') }}">
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

        .icon-circle {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: #e7f1ff;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
}

.icon-circle span {
    font-size: 28px;
    color: #04dc01;
}

.bg-soft-success {
    background: #e8f5e9;
}

.visi-card p {
    font-size: 18px;
    line-height: 1.6;
}

.misi-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.misi-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
}

.misi-item span {
    font-size: 22px;
    color: #198754;
    margin-top: 2px;
}

.misi-item p {
    margin: 0;
    font-size: 16px;
    color: #555;
    line-height: 1.5;
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
        <div class="mobile-header-tentangkami text-white d-block d-md-none">

            <div class="content-wrapper">
                <p class="text-uppercase  mb-1">Tentang kami</p>
               
            </div>
        </div>


       <div class="container my-4">

    <!-- VISI -->
    <div class="card visi-card border-0 shadow-sm mb-4">
        <div class="card-body text-center p-4">

            <div class="icon-circle mb-3">
                <span class="material-symbols-outlined">visibility</span>
            </div>

            <h5 class="fw-bold mb-2">Visi</h5>
            <p class="text-muted mb-0">
                Menjadi pelopor gerakan filantropi yang memberdayakan umat
                untuk kemandirian dan kemuliaan dalam bingkai keimanan dan ketaqwaan.
            </p>

        </div>
    </div>

    <!-- MISI -->
    <div class="card misi-card border-0 shadow-sm">
        <div class="card-body p-4">

            <div class="text-center mb-3">
                <div class="icon-circle bg-soft-success mb-2">
                    <span class="material-symbols-outlined">flag</span>
                </div>
                <h5 class="fw-bold">Misi</h5>
            </div>

            <div class="misi-list">

                <div class="misi-item">
                    <span class="material-symbols-outlined">check_circle</span>
                    <p>
                        Mewujudkan sarana ibadah yang layak, nyaman, dan berkelanjutan
                        melalui revitalisasi infrastruktur Masjid dan Mushola.
                    </p>
                </div>

                <div class="misi-item">
                    <span class="material-symbols-outlined">favorite</span>
                    <p>
                        Meningkatkan kualitas kehidupan Ibu dan keluarga sebagai pilar
                        utama peradaban melalui program santunan dan sembako.
                    </p>
                </div>

                <div class="misi-item">
                    <span class="material-symbols-outlined">groups</span>
                    <p>
                        Membangun jejaring kolaborasi dengan berbagai pihak
                        untuk memperluas dampak kebaikan.
                    </p>
                </div>

                <div class="misi-item">
                    <span class="material-symbols-outlined">verified</span>
                    <p>
                        Menjaga amanah dan menyalurkan donasi dengan prinsip
                        transparansi, akuntabilitas, dan profesional.
                    </p>
                </div>

            </div>

        </div>
    </div>

</div>

        <!-- page content ends -->
        <div class="container-fluid warna-background  text-white my-3">
            <div class="row">
                <div class="container">
                    <div class="row  py-4 ">
                        <div class="col">
                            <h4 class="text-uppercase mb-3">Tentang Kami</h4>

                        </div>
                       
                        <div class="w-100"></div>
                        <div class="col">
                            <p>Tentang Kami</p>
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

    <!-- notification 
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
     notification ends -->


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

            /*   setTimeout(function() {
                $('.notification').addClass('active');
                setTimeout(function() {
                    $('.notification').removeClass('active');
                }, 3500);
            }, 500);
            $('.closenotification').on('click', function() {
                $(this).closest('.notification').removeClass('active')
            }); */
            
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
