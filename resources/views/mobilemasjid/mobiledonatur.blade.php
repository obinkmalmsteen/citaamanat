<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Obink">

    <title>TAMAMA · Donatur</title>
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

    /* Donatur Card */
    .card-donatur {
        transition: all 0.3s ease;
    }

    .card-donatur:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
    }

    /* Logo */
    .logo-donatur {
        width: 90px;
        height: 90px;
        object-fit: cover;
    }

    /* Logo Placeholder */
    .logo-placeholder {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        color: #adb5bd;
        margin: 0 auto;
    }

    /* Card Pengeluaran */
    .card-pengeluaran {
        transition: all 0.3s ease;
    }

    .card-pengeluaran:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
    }

    /* Bukti */
    .bukti-img {
        height: 160px;
        object-fit: cover;
    }

    /* Placeholder Bukti */
    .bukti-placeholder {
        height: 160px;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        color: #adb5bd;
    }

    /* Background section abu-abu lembut */
    .section-soft-gray {
        background-color: #f5f6f8;
        /* abu-abu tipis elegan */
    }

    /* Card tetap putih & mengambang */
    .section-soft-gray .card {
        background-color: #ffffff;
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
                <figure><img src="mobile/img/user1.png" alt=""></figure>
            </div>
            <h5 class="mb-1 ">Ammy Jahnson</h5>
            <p class="text-mute small">Sydney, Australia</p>
        </div>
        <br>
        <div class="row mx-0">
            <div class="col">
                <div class="card mb-3 border-0 shadow-sm bg-template-light">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="text-secondary small mb-0">Balance Available</p>
                                <h6 class="text-dark my-0">$2585.00</h6>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-default button-rounded-36 shadow"><i
                                        class="material-icons">add</i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="subtitle text-uppercase"><span>Menu</span></h5>
                <div class="list-group main-menu">
                    <a href="index.html" class="list-group-item list-group-item-action active">Store</a>
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

        /* ========================= */
        /*   DONATUR CARD - MOBILE  */
        /* ========================= */
        @media (max-width: 576px) {

            .card-donatur {
                border-radius: 18px;
            }

            .card-donatur .card-body {
                padding: 1rem !important;
            }

            /* Logo */
            .logo-donatur {
                width: 64px;
                height: 64px;
                object-fit: cover;
                margin-bottom: 0.5rem !important;
            }

            .logo-placeholder {
                width: 64px;
                height: 64px;
                border-radius: 50%;
                background: #e9ecef;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.6rem;
                color: #adb5bd;
                margin: 0 auto 0.5rem;
            }

            /* Nama donatur */
            .card-donatur h6 {
                font-size: 0.95rem;
                margin-bottom: 0.25rem;
            }

            /* Badge */
            .card-donatur .badge {
                font-size: 0.65rem;
                padding: 0.35rem 0.75rem;
                margin-bottom: 0.5rem;
            }

            /* Alamat - maksimal 2 baris */
            .card-donatur p {
                font-size: 0.75rem;
                line-height: 1.3;
                margin-bottom: 0.5rem;

                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            /* Nominal */
            .card-donatur .fs-5 {
                font-size: 1rem !important;
            }

            .card-donatur .border-top {
                padding-top: 0.5rem !important;
                margin-top: 0.5rem;
            }

            .card-donatur {
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .card-donatur:active {
                transform: scale(0.97);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            }

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
                <p class="text-uppercase  mb-1">Donatur</p>
                <p class="text-uppercase mb-1">Cita Amanat Martadiredja</p>
            </div>
        </div>



        <div class="container ">



        </div>
        <div class="container-fluid  text-white my-3">
            <div class="row">





                <!-- content Start -->

                <div class="container my-5">

                    <div class="text-center mb-4">
                        <h4 class="fw-bold text-success mb-1">Pemasukan Donasi</h4>
                        <p class="text-muted mb-3">
                            Transparansi kontribusi dari seluruh partisipan kebaikan
                        </p>

                        <div class="alert alert-success d-inline-block px-4 py-2 rounded-4 shadow-sm">
                            <strong>Total Donasi:</strong>
                            Rp {{ number_format($totalSemuaDonasi, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row g-4">
                        @foreach ($donaturs as $donatur)
                            <div class="col-6 col-md-6 col-lg-2">


                                <div
                                    class="card h-100 border-0 section-soft-gray shadow-sm rounded-4 card-donatur mb-2">

                                    <div class="card-body text-center p-4">

                                        {{-- Logo --}}
                                        @if ($donatur->logo_donatur)
                                            <img src="{{ asset('public/storage/logo_donatur/' . $donatur->logo_donatur) }}"
                                                class="rounded-circle mb-3 logo-donatur"
                                                alt="Logo {{ $donatur->nama_donatur }}">
                                        @else
                                            <div class="logo-placeholder mb-3">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        @endif

                                        {{-- Nama --}}
                                        <h6 class="fw-bold mb-1 text-dark">
                                            {{ $donatur->nama_donatur }}
                                        </h6>

                                        {{-- Status --}}
                                        @if ($donatur->donatur_tetap == 1)
                                            <span
                                                class="badge bg-success-subtle text-success px-3 py-2 rounded-pill mb-2">
                                                Donatur Tetap
                                            </span>
                                        @else
                                            <span
                                                class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill mb-2">
                                                Partisipan Kebaikan
                                            </span>
                                        @endif

                                        {{-- Alamat --}}
                                        <p class="text-muted small mb-3">
                                            {{ $donatur->alamat_donatur }}
                                        </p>

                                        {{-- Nominal --}}
                                        <div class="border-top pt-3">
                                            <span class="text-muted small d-block">
                                                Total Donasi
                                            </span>
                                            <span class="fs-5 fw-bold text-success">
                                                Rp {{ number_format($donatur->totalDonasi(), 0, ',', '.') }}
                                            </span>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-center mt-5">
                        {{ $donaturs->links() }}
                    </div>



                </div>


                {{-- end donaturr container --}}
                <div class="container my-5">



                    <div class="text-center mb-4">
                        <h4 class="fw-bold text-danger mb-1" id="Pengeluaran-Dana">Pengeluaran Dana</h4>
                        <p class="text-muted mb-3">
                            Transparansi penggunaan dana yang telah dihimpun
                        </p>

                        <div class="alert alert-danger d-inline-block px-4 py-2 rounded-4 shadow-sm">
                            <strong>Total Pengeluaran:</strong>
                            Rp {{ number_format($totalSemuaPengeluaran, 0, ',', '.') }}
                        </div>
                    </div>


                    <div class="row g-4">
                        @foreach ($datakeluar as $row)
                            <div class="col-6 col-md-6 col-lg-2">

                                <div
                                    class="card h-100 border-0 section-soft-gray shadow-sm rounded-4 card-donatur mb-2">


                                    {{-- Bukti --}}
                                    @if ($row->bukti)
                                        <img src="{{ asset('storage/' . $row->bukti) }}"
                                            class="card-img-top bukti-img" alt="Bukti Pengeluaran">
                                    @else
                                        <div class="bukti-placeholder">
                                            <i class="bi bi-receipt"></i>
                                        </div>
                                    @endif

                                    <div class="card-body p-4">

                                        {{-- Tanggal --}}
                                        <div class="small text-muted mb-1">
                                            <i class="bi bi-calendar-event"></i>
                                            {{ \Carbon\Carbon::parse($row->tanggal)->format('d M Y') }}
                                        </div>

                                        {{-- Kategori --}}
                                        <span class="badge bg-danger-subtle text-danger rounded-pill mb-2">
                                            {{ ucfirst(str_replace('_', ' ', $row->kategori)) }}
                                        </span>

                                        {{-- Deskripsi --}}
                                        <p class="fw-semibold mb-3 text-dark">
                                            {{ $row->deskripsi }}
                                        </p>

                                        {{-- Nominal --}}
                                        <div class="border-top pt-3 mb-3">
                                            <span class="text-muted small">Jumlah Pengeluaran</span>
                                            <div class="fs-5 fw-bold text-danger">
                                                Rp {{ number_format($row->jumlah, 0, ',', '.') }}
                                            </div>
                                        </div>

                                        {{-- Aksi --}}

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    {{-- hhg --}}
                    <div class="d-flex justify-content-center mt-5">
                        {{ $datakeluar->links() }}
                    </div>

                </div> {{-- end container --}}


                <div class="text-center mb-4">
                    <h4 class="fw-bold text-primary mb-1">Sisa Saldo</h4>
                    <p class="text-muted mb-3">
                        Transparansi Sisa Saldo dari pemasukan dan pengeluaran
                    </p>

                    <div class="alert alert-success d-inline-block px-4 py-2 rounded-4 shadow-sm">
                        <strong>Total Sisa Saldo:</strong>
                        Rp {{ number_format($sisaSaldo, 0, ',', '.') }}
                    </div>
                </div>

                <!-- content Start -->

                {{-- end content --}}





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
    <script>
        document.getElementById('tanggalSekarang').innerText =
            new Date().toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        new Chart(document.getElementById('grafikKeuangan'), {
            type: 'bar',
            data: {
                labels: [
                    'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                    'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
                ],
                datasets: [{
                        label: 'Pemasukan ({{ $tahun }})',
                        data: {!! json_encode(array_values($pemasukanBulanan)) !!}
                    },
                    {
                        label: 'Pengeluaran ({{ $tahun }})',
                        data: {!! json_encode(array_values($pengeluaranBulanan)) !!}
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: value => 'Rp ' + value.toLocaleString('id-ID')
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>
