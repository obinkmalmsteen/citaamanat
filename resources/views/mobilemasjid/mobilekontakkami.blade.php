<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Obink">

    <title>TAMAMA · Kontak kami</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
/>


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

        .team-card {
            background: #fff;
            transition: all 0.25s ease;
        }

        .team-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .team-card h5 {
            font-size: 1.05rem;
        }

        @media (max-width: 576px) {
            .team-card {
                padding: 1.25rem;
            }
        }

        .contact-card {
            display: flex;
            border-radius: 16px;
            overflow: hidden;
            max-width: 720px;
            margin: auto;
            box-shadow: 0 15px 30px rgba(0, 0, 0, .12);
            background: #fff;
        }

        /* LEFT */
        .card-left {
            width: 35%;
            padding: 24px;
            text-align: center;
            background: #fff;
        }

        .card-left .logo {
            max-width: 90px;
            margin-bottom: 12px;
        }

        .card-left h5 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .card-left small {
            color: #777;
            font-size: .75rem;
        }

        /* RIGHT */
        .card-right {
            width: 65%;
            padding: 28px;
            color: #fff;
            background: linear-gradient(135deg, #0f7a2a, #1fbf4a);
            position: relative;
        }

        .card-right h4 {
            font-size: 1.4rem;
            margin-bottom: 2px;
        }

        .card-right .role {
            font-size: 1.1rem;
            opacity: .9;
            margin-bottom: 20px;
        }

        .card-right .info {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            font-size: .9rem;
        }

        .card-right .info i {
            width: 26px;
            font-size: 1rem;
            opacity: .85;
        }

        /* MOBILE */
        @media (max-width: 576px) {
            .contact-card {
                width: 360px;
                /* LEBAR PATEN */
                max-width: 100%;
                margin: 16px auto;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 12px 28px rgba(0, 0, 0, .12);
                background: #fff;
                display: flex;
                flex-direction: column;
            }


            .card-left,
            .card-right {
                width: 100%;
            }

            .card-right {
                border-radius: 0 0 16px 16px;
            }
        }

        .contact-slider {
            padding-bottom: 24px;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
        }

        /* Dots */
        .swiper-pagination-bullet {
            background: #1fbf4a;
            opacity: .3;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
        }

        .swiper-slide-active .contact-card {
            transform: scale(1);
        }

        .swiper-slide .contact-card {
            transform: scale(.96);
            transition: .3s ease;
        }

        .contact-pagination {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-top: 16px;
            color: #fff !important;
        }

        .contact-pagination .swiper-pagination-bullet {
            width: 44px;
            height: 44px;
            background: #eaeaea;
            border-radius: 50%;
            opacity: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .3s ease;
        }

        .contact-pagination .swiper-pagination-bullet i {
            font-size: 1.1rem;
            color: #777;
        }

        /* ACTIVE */
        .contact-pagination .swiper-pagination-bullet-active {
            background: linear-gradient(135deg, #0f7a2a, #1fbf4a);
            transform: scale(1.15);
        }

        .contact-pagination .swiper-pagination-bullet-active i {
            color: #fff;
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
                <div class="col-auto">
                    <a href="profile.html" class="btn  btn-link text-dark"><i
                            class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>

        <!-- MOBILE HEADER (Background image + text di dalam gambar) -->
        <div class="mobile-header-aktifitas text-white d-block d-md-none">

            <div class="content-wrapper">
                <p class="text-uppercase  mb-1">Kontak Kami</p>
                <p class="text-uppercase mb-1">Cita Amanat Martadiredja</p>
            </div>
        </div>






        <div class="text-center mx-auto mb-2 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            {{-- <p class="fs-5 text-uppercase text-primary">Our Team</p> --}}
            <h5 class="subtitle">Team Kami</h5>
            {{-- <h1 class="display-3">Meet Our Organizer</h1> --}}
        </div>


        {{-- slider --}}
        <div class="swiper contact-slider">
            <div class="swiper-wrapper">

                {{-- card 1 --}}
                <div class="swiper-slide">
                    <div class="contact-card">
                        <div class="contact-card mb-4">
                            <div class="card-left">
                                <img src="mobile/img/logo_tamama_putih.png" alt="Logo Yayasan" class="logo">

                                <div class="org-text">
                                    <h5>Yayasan<br>Cita Amanat Martadiredja</h5>
                                    <small>www.citaamanatmartadiredja.id</small>
                                </div>
                            </div>


                            <div class="card-right">
                                <h4>Erick Martadiredja</h4>
                                <p class="role">Chief Executive Officer / Founder</p>

                                <div class="info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Bandung, Cililin</span>
                                </div>

                                <div class="info">
                                    <i class="fas fa-phone"></i>
                                    <span>+62 8xx xxxx xxx</span>
                                </div>

                                <div class="info">
                                    <i class="fas fa-envelope"></i>
                                    <span>xxxxx@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- card 2 --}}
                <div class="swiper-slide">
                    <div class="contact-card">
                        <div class="contact-card mb-4">
                            <div class="card-left">
                                <img src="mobile/img/logo_tamama_putih.png" alt="Logo Yayasan" class="logo">
                                <h5>Yayasan<br>Cita Amanat Martadiredja</h5>
                                <small>www.citaamanatmartadiredja.id</small>
                            </div>

                            <div class="card-right">
                                <h4>Wiji Samiono</h4>
                                <p class="role">Chief Operating Officer / Co-Founder</p>

                                <div class="info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Bandung, Cileunyi</span>
                                </div>

                                <div class="info">
                                    <i class="fas fa-phone"></i>
                                    <span>+62 8xx xxxx xxx</span>
                                </div>

                                <div class="info">
                                    <i class="fas fa-envelope"></i>
                                    <span>xxxxx@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                {{-- card 3 --}}
                <div class="swiper-slide">
                    <div class="contact-card">
                        <div class="contact-card mb-4">
                            <div class="card-left">
                                <img src="mobile/img/logo_tamama_putih.png" alt="Logo Yayasan" class="logo">
                                <h5>Yayasan<br>Cita Amanat Martadiredja</h5>
                                <small>www.citaamanatmartadiredja.id</small>
                            </div>

                            <div class="card-right">
                                <h4>Ratih Maryam</h4>
                                <p class="role">Public Relation & Website Officer</p>

                                <div class="info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Bandung</span>
                                </div>

                                <div class="info">
                                    <i class="fas fa-phone"></i>
                                    <span>+62 8xx xxxx xxx</span>
                                </div>

                                <div class="info">
                                    <i class="fas fa-envelope"></i>
                                    <span>xxxxx@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- card 4 --}}
                <div class="swiper-slide">
                    <div class="contact-card">
                        <div class="contact-card mb-4">
                            <div class="card-left">
                                <img src="mobile/img/logo_tamama_putih.png" alt="Logo Yayasan" class="logo">
                                <h5>Yayasan<br>Cita Amanat Martadiredja</h5>
                                <small>www.citaamanatmartadiredja.id</small>
                            </div>

                            <div class="card-right">
                                <h4>Robi</h4>
                                <p class="role">Chief Technology Officer</p>

                                <div class="info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Bandung, Cibeunying Kidul</span>
                                </div>

                                <div class="info">
                                    <i class="fas fa-phone"></i>
                                    <span>+62 815 7939 xxx</span>
                                </div>

                                <div class="info">
                                    <i class="fas fa-envelope"></i>
                                    <span>obink.markeyza@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

            <!-- Dots -->
            <div class="contact-pagination"></div>
        </div>

        <!--
            <div class="container-fluid team py-15">
                <div class="container py-15">
                    <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                        <p class="fs-5 text-uppercase text-primary">Our Team</p>
                        {{-- <h1 class="display-3">Meet Our Organizer</h1> --}}
                    </div>
                    <div class="row g-3 g-md-4">

                    </div>


                </div>
            </div>
             -->





        <div class="container-fluid warna-background  text-white my-3">
            <div class="row">
                <div class="container">
                    <div class="row  py-4 ">
                        <div class="col">
                             <div class="col">
                            <p>Kontak Kami</p>
                        </div>
                            <h4 class="text-uppercase mb-3">Cita Amanat Martadiredja</h4>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="footer-item">

                                    <!-- Address -->
                                    <div class="footer-row">
                                        <span class="icon-box">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <a href="#" class="footer-text">
                                            Puri Indah Cihampelas, Blok E7 No.15, Citapen,
                                            Cihampelas, Kab Bandung Barat
                                        </a>
                                    </div>

                                    <!-- Phone -->
                                    <div class="footer-row">
                                        <span class="icon-box">
                                            <i class="fas fa-phone-alt"></i>
                                        </span>
                                        <a href="tel:082246777900" class="footer-text">
                                            082 246 777 900
                                        </a>
                                    </div>

                                    <!-- Email -->
                                    <div class="footer-row">
                                        <span class="icon-box">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <a href="mailto:Terangiberibumasjid@gmail.com" class="footer-text">
                                            Terangiberibumasjid@gmail.com
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="w-100"></div>
                       
                    </div>
                </div>
            </div>
        </div>


        <style>
            /* footer */
            .footer-row {
                display: flex;
                align-items: flex-start;
                gap: 12px;
                margin-bottom: 12px;
            }

            .icon-box {
                width: 38px;
                height: 38px;
                min-width: 38px;
                background: #e1a100;
                /* sesuaikan primary */
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .icon-box i {
                color: #fff;
                font-size: 1rem;
            }

            .footer-text {
                color: #eaeaea;
                font-size: .95rem;
                line-height: 1.4;
                text-decoration: none;
            }


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

                <a href="{{ route('mobilelandingpage') }}" class="navi__link navi__link">
                    <i class="material-icons navi__ico">dashboard</i>
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


    <!-- jquery, popper and bootstrap js -->
    <script src="mobile/js/jquery-3.3.1.min.js"></script>
    <script src="mobile/js/popper.min.js"></script>
    <script src="mobile/vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>

    <!-- swiper js -->
    <script src="mobile/vendor/swiper/js/swiper.min.js"></script>

    <!-- template custom js -->
    <script src="mobile/js/main.js"></script>
    <script>
        const swiper = new Swiper('.contact-slider', {
            slidesPerView: 1,
            spaceBetween: 16,
            centeredSlides: true,
            loop: true,

            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },

            pagination: {
                el: '.contact-pagination',
                clickable: true,
                renderBullet: function(index, className) {

                    const labels = ['CEO', 'COO', 'PR', 'CTO'];

                    return `
              <span class="${className}">
                <span class="bullet-text">${labels[index]}</span>
              </span>
            `;
                },
            },
        });
    </script>



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
