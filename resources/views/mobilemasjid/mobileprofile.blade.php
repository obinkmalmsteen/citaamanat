<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Profile</title>

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
</head>

<body>
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


        <!-- page content here -->
        <div class="container">
            @php
                use App\Models\Cabang;

                $user = Auth::user();
            @endphp

            @php $item = $masjid->first(); @endphp
            <div class="d-flex justify-content-center my-3">
                @if (Auth::check() && Auth::user()->nama)
                    <div class="card shadow-sm border-0 rounded-3 w-100" style="max-width: 420px;">
                        <div class="card-body p-3">


                            <div class="col-md-6 text-center">
                    <label class="fw-bold d-block mb-2">Foto Masjid</label>
                    @if ($item->foto_masjid)
                        <img src="{{ asset('public/storage/foto_masjid/' . $item->foto_masjid) }}"
                            class="img-fluid rounded shadow">
                    @else
                        <p class="text-muted">Belum ada foto.</p>
                    @endif
                </div>
                           

                            <div class="mb-3">
                                <small class="text-muted d-block">Nama Ketua DKM</small>
                                <span class="fw-semibold">{{ $item->nama_ketua_dkm ?? '-' }}</span>
                            </div>

                            <div class="mb-0">
                                <small class="text-muted d-block">Telp Ketua DKM</small>
                                <span class="fw-semibold">{{ $item->telp_ketua_dkm ?? '-' }}</span>
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

        <a href="{{ route('mobile.logout') }}">Logout</a>
        <!-- footer -->
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

            <a href="{{ route('mobileaktifitas') }}" class="navi__link">
                <i class="material-icons navi__icon">person</i>
                <span class="navi__text">Aktifitas</span>
            </a>

            <a href="{{ route('mobilelistmasjid') }}" class="navi__link">
                <i class="material-icons navi__icon">devices</i>
                <span class="navi__text">List</span>
            </a>

            {{-- 🔐 MENU PROFILE (LOGIN AWARE) --}}
            <a href="{{ Auth::check() ? route('mobilerequesttoken') : route('mobile.login') }}" class="navi__link">

                <i class="material-icons navi__icon">
                    {{ Auth::check() ? 'settings' : 'bolt' }}
                </i>

                <span class="navi__text">
                    Request
                </span>
            </a>
            {{-- 🔐 MENU PROFILE (LOGIN AWARE) --}}
            <a href="{{ Auth::check() ? route('mobileprofile') : route('mobile.login') }}" class="navi__link">

                <i class="material-icons navi__icon--active">
                    {{ Auth::check() ? 'settings' : 'account_circle' }}
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

</body>

</html>
