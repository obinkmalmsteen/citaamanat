<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
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
                                <button class="btn btn-default button-rounded-36 shadow"><i class="material-icons">add</i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="subtitle text-uppercase"><span>Menu</span></h5>
                <div class="list-group main-menu">
                    <a href="index.html" class="list-group-item list-group-item-action active">Store</a>
                    <a href="notification.html" class="list-group-item list-group-item-action">Notification <span class="badge badge-dark text-white">2</span></a>
                    <a href="all-products.html" class="list-group-item list-group-item-action">All Products</a>
                    <a href="my-order.html" class="list-group-item list-group-item-action">My Order</a>
                    <a href="profile.html" class="list-group-item list-group-item-action">My Profile</a>
                    <a href="controls.html" class="list-group-item list-group-item-action">Pages Controls <span class="badge badge-light ml-2">Check</span></a>
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
                    <button class="btn  btn-link text-dark menu-btn"><img src="img/menu.png" alt=""><span class="new-notification"></span></button>
                </div>
                <div class="col text-center"><img src="img/logo-header.png" alt="" class="header-logo"></div>
                <div class="col-auto">
                    <a href="profile.html" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>
        <!-- header ends -->
@if(Auth::check())
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
   @if($user->jabatan === 'User')
            {{-- panel aturan start --}}

            <div class="row justify-content-center mt-4">
                <div class="col-md-8">

                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-body p-4">
                            <h4>SOP PENGAJUAN & REALISASI TOKEN LISTRIK</h4>
                            <p><b>1. Frekuensi Pengisian</b><br> Token Listrik (PraBayar maupun PascaBayar) diberikan <b>1
                                    Kali Setiap Bulan.</b></p>

<p><b>2. Realisasi Pembelian Token </b></p>

             
                            <table class="table table-bordered table-sm text-center">
    <thead>
        <tr>
            <th>Pengajuan Tanggal</th>
            <th>Realisasi Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1 – 7</td>
            <td><b>10</b></td>
        </tr>
        <tr>
            <td>8 – 17</td>
            <td><b>20</b></td>
        </tr>
        <tr>
            <td>18 – 27</td>
            <td><b>30</b></td>
        </tr>
    </tbody>
</table>
<p style="color: #d9534f; font-weight: bold;"> HARAP MENJADI PERHATIAN! <br>Dikarenakan Kami masih Melakukan pembelian token secara manual, maka diharapkan untuk membuat pengajuan paling dekat berjarak 3 hari
                                (H-3) sebelum jadwal realisasi, (Jangan terlalu mepet dengan tgl realisasi).</p>
                            
                            <p><b>3. Kewajiban DKM</b><br>DKM Wajib melakukan pengajuan token setiap bulan sebagai bentuk
                                konfirmasi bahwa DKM masih Aktif.</p>
                                <p><b>4. Menunggu Realisasi</b><br>Jika sudah mengajukan permintaan token diharapkan Cek secara berkala ke akun anda, dan
                                segera isikan token jika sudah tersedia, karena jika tidak segera dipakai maka token itu
                                akan Hangus dan jadi Mubadzir.</p>

                            

                            
                        </div>
                    </div>

                </div>
            </div>

            {{-- panel aturan end --}}
@endif

       @php $item = $masjid->first(); @endphp
<div class="d-flex justify-content-center my-3">
    
                            {{-- <a href="{{ route('mobilerequesttokenlanjut') }}', $item->id_pelanggan) }}"
                                class="btn btn-primary w-50 py-3 text-center">
                                <i class="me-2"></i> LANJUT PENGAJUAN TOKEN
                            </a> --}}

                          @if (Auth::check() && Auth::user()->nama)
    <a href="{{ route('mobilerequesttokenlanjut') }}"
       class="btn btn-primary w-50 py-3 text-center">
        <p class="me-2">Lanjut Pengajuan Token</p>
    </a>
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
    @if(Auth::check())
        {{-- SUDAH LOGIN --}}
        <a href="{{ route('mobilerequesttoken') }}" class="btn btn-link-default active">
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

                <button class="btn btn-default btn-rounded btn-block"
                        data-dismiss="modal">
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
