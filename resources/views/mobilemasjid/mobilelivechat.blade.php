<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Obink">

    <title>TAMAMA . F.A.Q</title>
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
<style>
    .swiper-container {
        height: 60vw;
        max-height: 400px;
    }
</style>

<body>
   
    @include('partials.mobile-slide-menu')




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
        /* default (accordion tertutup) */
.accordion-link {
    display: block;
    background: #00b00f; /* abu-abu */
    padding: 10px;
    text-decoration: none;
}

/* saat accordion terbuka */
.accordion-link:not(.collapsed) {
    background: #ffaa00; /* biru */
}

/* hover tetap rapi */
.accordion-link:hover {
    text-decoration: none;
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
        <div class="mobile-header-faqmobile text-white d-block d-md-none">

            <div class="content-wrapper">
                <p class="text-uppercase  mb-1">Frequently Asked Questions</p>
                <p class="text-uppercase mb-1">Cita Amanat Martadiredja</p>
            </div>
        </div>
 <form method="GET" action="{{ route('mobilelistmasjid') }}" id="searchForm">
                <!-- Back Button -->
                <a href="{{ url()->previous() }}" class="btn-back mr-2">
                    <i class="material-icons">arrow_back</i>
                </a>
                <!-- SEARCH -->
                <input type="text" name="search" id="searchInput" class="form-control form-control-lg"
                    placeholder="Cari nama masjid..." value="{{ request('search') }}" autocomplete="off">
            </form>

        {{-- start faq --}}
        <div class="container py-3">
            <div class="card mb-2 border-0 rounded-0">
                <strong>Assalamualaikum Wr Wb</strong>
                <p class="mb-2 text-muted">
                    Sebelum Anda bertanya di group Whatsapp, ada baiknya silahkan di baca dulu pertanyaan-pertanyaan di
                    bawah ini, Siapa tahu Hal yang hendak anda tanyakan sudah terjawab disini, Terima kasih..
                </p>
            </div>




            <h5 class="fw-bold mb-3 text-center">Live Chat</h5>
            <h6 class="fw-bold mb-3 text-center">fitur live chat</h6>



<!-- resources/views/mobile/livechat.blade.php -->
@extends('layouts.mobile')

@section('title', 'Live Chat')

@section('content')
<style>
    .livechat-page {
        min-height: 100vh;
        background: linear-gradient(180deg, #0f2027, #203a43, #2c5364);
        display: flex;
        flex-direction: column;
    }

    .livechat-header {
        padding: 14px 16px;
        color: #fff;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,.25);
    }

    .livechat-header .icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: rgba(255,255,255,.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .livechat-header .title {
        flex: 1;
    }

    .livechat-header h5 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
    }

    .livechat-header small {
        opacity: .85;
        font-size: 12px;
    }

    .livechat-body {
        flex: 1;
        background: #f4f6f8;
        border-radius: 24px 24px 0 0;
        margin-top: 10px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .livechat-info {
        padding: 10px 14px;
        background: #fff;
        font-size: 12px;
        color: #555;
        border-bottom: 1px solid #eee;
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .livechat-info span {
        background: #e8f5e9;
        color: #2e7d32;
        padding: 2px 8px;
        border-radius: 20px;
        font-size: 11px;
    }

    .livechat-iframe {
        flex: 1;
        border: none;
        width: 100%;
        background: #fff;
    }
</style>

<div class="livechat-page">
    <!-- Header -->
    <div class="livechat-header">
        <div class="icon">💬</div>
        <div class="title">
            <h5>Live Chat</h5>
            <small>Customer Support Online</small>
        </div>
    </div>

    <!-- Body -->
    <div class="livechat-body">
        <div class="livechat-info">
            <span>Online</span>
            <div>Silakan sampaikan pertanyaan Anda, admin akan merespon secepatnya.</div>
        </div>

        <!-- GANTI src iframe dengan embed live chat dari provider kamu -->
        <iframe
            class="livechat-iframe"
            src="https://LIVECHAT_PROVIDER_EMBED_URL"
            allow="camera; microphone; fullscreen"
            loading="lazy">
        </iframe>
    </div>
</div>
@endsection







        </div>
        {{-- end faq --}}
        <div class="container-fluid warna-background  text-white my-3">
            <div class="row">
                <div class="container">
                    <div class="row  py-4 ">
                        <div class="col">
                            <h3 class="text-uppercase mb-3">Cita Amanat Martadiredja</h3>

                        </div>
                       
                        <div class="w-100"></div>
                        <div class="col">
                            <p>Live Chat</p>
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

            <a href="{{ route('mobilelandingpage') }}" class="navi__link ">
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
            <a href="{{ route('mobilehelp') }}" class="navi__link navi__link--active">
                <i class="material-icons navi__icon--active">help</i>
                <span class="navi__text--active">F.A.Q</span>
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
