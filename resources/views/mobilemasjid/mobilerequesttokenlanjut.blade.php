<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Shop · GoFurniture</title>

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

    <!-- sidebar -->
    <div class="sidebar">
        <div class="text-center">
            <div class="figure-menu shadow">
                <figure><img src="img/user1.png" alt=""></figure>
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
    <!-- sidebar ends -->

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

        <div class="container">
            <!-- page content here -->
            {{-- row 42 end --}}


            <a href="{{ route('mobile.logout') }}">Logout</a>


            @php
                use App\Models\Cabang;

                $user = Auth::user();
            @endphp


            @php $item = $masjid->first(); @endphp
            <div class="card-body">

                {{-- Tambahkan pembungkus untuk tombol --}}
                <div class="text-center my-4">
                    @if (!$adaRequestBelumRealisasi)
                        <div class="d-flex justify-content-center my-3">
                            <button
    class="btn btn-success w-50 py-4 {{ $disableRequestBulanIni ? 'disabled' : '' }}"
    {{ $disableRequestBulanIni ? 'disabled' : '' }}>
    LAKUKAN PENGAJUAN TOKEN SEKARANG
</button>
@if ($disableRequestBulanIni)
    <small class="text-muted d-block mt-2 text-center">
        Anda sudah melakukan pengajuan token bulan ini.<br>
        Pengajuan berikutnya bisa dilakukan bulan depan.
    </small>
@endif

                        </div>
                    @else
                        <div id="progressContainer">
                            <div class="progress" style="height: 40px;">
                                <div id="progressBar" class="progress-bar bg-secondary" role="progressbar"
                                    style="width: 0%;">
                                </div>
                            </div>
                            <small id="progressText" class="text-muted d-block mt-2 text-center"></small>
                        </div>
                    @endif
                </div>

                <input type="hidden" id="tgl_request_token" value="{{ $tglRequestTokenTerakhir }}">



                <!-- Form Request Token -->

                <div id="formRequestToken" class="card p-3 mb-3" style="display: none;">
                    <form action="{{ route('mobilerequesttokenlanjutform') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary w-25 py-4 me-2"
                                id="btnBatalRequest">Batal</button>
                            <button type="submit" class="btn btn-success w-25 py-2">
                                Kirim Permintaan
                            </button>
                        </div>
                    </form>

                </div>

            </div>

<div class="card-body">

        <!-- Card histori Realisasi Token START-->

        <h4 class="mt-4">Histori Permintaan & Realisasi Token</h4>

        @if ($historiBayar->isEmpty())
            <p class="text-muted">Belum ada histori permintaan token.</p>
        @else
            <style>
                .history-slider {
                    display: flex;
                    overflow-x: auto;
                    gap: 16px;
                    padding-bottom: 10px;
                    scroll-snap-type: x mandatory;
                }

                .history-card {
                    min-width: 320px;
                    flex: 0 0 auto;
                    scroll-snap-align: start;
                }

                .history-slider::-webkit-scrollbar {
                    height: 6px;
                }

                .history-slider::-webkit-scrollbar-thumb {
                    background: #0d6efd;
                    border-radius: 10px;
                }
            
                .profile-item {
                    display: flex;
                    align-items: center;
                    gap: 12px;
                    padding: 4px 0;
                }

                .profile-item .icon {
                    font-size: 26px;
                    color: #0d6efd;
                    width: 32px;
                    text-align: center;
                }

                .profile-item label {
                    font-size: 13px;
                    font-weight: 700;
                    color: #6c757d;
                    margin-bottom: 2px;
                    letter-spacing: .3px;
                    text-transform: uppercase;
                }

                .profile-item .value {
                    font-size: 17px;
                    font-weight: 600;
                    color: #222;
                }

                .info {
                    flex: 1;
                }

                hr {
                    margin: 8px 0;
                    opacity: .15;
                }

                .map-square {
                    width: 100%;
                    height: 320px;
                }

                .template-option {
                    transition: .2s ease;
                    cursor: pointer;
                }

                .template-option:hover {
                    background: #f2fdf5;
                    border-color: #86e1a8;
                }
            </style>

            <div class="history-slider mt-3">

                @foreach ($historiBayar as $index => $bayar)
                    <div class="card shadow history-card rounded-4">

                        @php
                            $nomor = $historiBayar->count() - $index;

                            // Tentukan warna bar
                            $warnaHeader =
                                $bayar->status_realisasi == 1
                                    ? 'bg-success' // Hijau
                                    : 'bg-warning text-dark'; // Oranye
                        @endphp

                        <div class="card-header {{ $warnaHeader }} text-white rounded-top-4">
                            <strong>Permintaan Token Ke {{ $nomor }}</strong>
                        </div>


                        <div class="card-body">

                            <div class="mb-2">
                                <small class="text-muted">"Silahkan isikan nomor ini jika sudah tersedia"</small><br>
                                <small class="text-muted">Nomor Token</small><br>
                                <span class="fw-semibold">
                                    <h5><b>{{ $bayar->no_token_listrik ? trim(chunk_split($bayar->no_token_listrik, 4, ' ')) : '-' }}</b>
                                    </h5>
                                </span>
                            </div>


                            <hr>
                            <div class="mb-2">
                                <small class="text-muted">Tanggal Realisasi</small><br>
                                <span class="fw-semibold">
                                    @if ($bayar->tgl_realisasi_token)
                                        {{ \Carbon\Carbon::parse($bayar->tgl_realisasi_token)->format('d/m/Y') }}
                                    @else
                                        <span class="text-warning"><b>Belum direalisasikan</b></span>
                                    @endif
                                </span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">Tanggal Request</small><br>
                                <span class="fw-semibold">
                                    @if ($bayar->tgl_request_token)
                                        {{ \Carbon\Carbon::parse($bayar->tgl_request_token)->format('d/m/Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">ID Pelanggan</small><br>
                                <span class="fw-semibold">{{ $bayar->id_pelanggan ?? '-' }}</span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">Nomor Meteran</small><br>
                                <span class="fw-semibold">{{ $bayar->no_meteran_listrik ?? '-' }}</span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">Nama Masjid</small><br>
                                <span class="fw-semibold">{{ $bayar->nama_masjid ?? '-' }}</span>
                            </div>

                            <hr>

                            <div class="mb-2">
                                <small class="text-muted">Nominal Token</small><br>
                                <span class="fw-semibold">
                                    @if ($bayar->jumlah_realisasi_token)
                                        Rp {{ number_format($bayar->jumlah_realisasi_token, 0, ',', '.') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>

                            <div class="mt-3">
                                @if ($bayar->status_realisasi == 1)
                                    <span class="badge bg-success text-light px-3 py-2">
                                        <i class="fa fa-check text-light"></i> Selesai
                                    </span>
                                @else
                                    <span class="badge bg-warning text-dark px-3 py-2">
                                        <i class="fa fa-hourglass-half text-dark"></i> Menunggu
                                    </span>
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        @endif
    </div>

            <!-- page content ends -->
        </div>

        <!-- footer -->
        <div class="footer">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-auto">
                            <a href="{{ route('mobilelandingpage') }}" class="btn btn-link-default ">
                                <i class="material-icons">store_mall_directory</i>
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
                                <a href="{{ route('mobilerequesttokenlanjut') }}" class="btn btn-link-default active">
                                    <i class="material-icons">favorite</i>
                                </a>
                            @else
                                {{-- BELUM LOGIN --}}
                                <a href="{{ route('mobile.login') }}" class="btn btn-link-default active">
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
    <script>
        document.getElementById('btnRequestToken')?.addEventListener('click', function() {
            document.getElementById('formRequestToken').style.display = 'block';
            this.style.display = 'none';
        });

        document.getElementById('btnBatalRequest')?.addEventListener('click', function() {
            document.getElementById('formRequestToken').style.display = 'none';
            document.getElementById('btnRequestToken').style.display = 'block';
        });
    </script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btn = document.getElementById("btnRequestToken");
        const tglRequestInput = document.getElementById("tgl_request_token");
        const progressBar = document.getElementById("progressBar");
        const progressText = document.getElementById("progressText");

        const tglStr = tglRequestInput.value;
        if (!tglStr) return;

        const tglTerakhir = new Date(tglStr);
        const hariIni = new Date();

        const bulanTerakhir = tglTerakhir.getMonth();
        const tahunTerakhir = tglTerakhir.getFullYear();

        const bulanSekarang = hariIni.getMonth();
        const tahunSekarang = hariIni.getFullYear();

        // Jika request masih dalam bulan yang sama → tampilkan progress
        if (bulanSekarang === bulanTerakhir && tahunSekarang === tahunTerakhir) {

            if (progressBar) {
                const totalHariBulanIni = new Date(tahunSekarang, bulanSekarang + 1, 0).getDate();
                const hariSekarang = hariIni.getDate();

                const progress = (hariSekarang / totalHariBulanIni) * 100;
                const sisaHari = totalHariBulanIni - hariSekarang;

                progressBar.style.width = progress + "%";
                progressBar.innerHTML = Math.floor(progress) + "%";

                if (progressText) {
                    progressText.innerHTML =
                        `Tombol PERMINTRAAN TOKEN  Akan Aktif Dalam <b>${sisaHari}</b> Hari Lagi (reset pada tanggal 1 bulan depan).`;
                }
            }

            // Jika user klik tombol normal, tetap blok
            if (btn) {
                btn.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Mohon Maaf',
                        text: "Anda telah melakukan permintaan bulan ini. Mohon tunggu hingga bulan depan.",
                        confirmButtonText: 'OK'
                    });
                    return false;

                });

            }
        }
    });
</script>
</body>

</html>
