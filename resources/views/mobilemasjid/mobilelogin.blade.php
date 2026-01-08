<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Obink">

    <title>TAMAMA - Mobile Login</title>
<link rel="icon" type="image/x-icon" href="{{ asset('mobile/img/favicontamama1.ico') }}">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body class="bg-gradient-success">
<br>
<br>
<style>
.btn-back {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    width: 50px;
    height: 50px;

    margin-left: 18px;   /* ⬅️ JARAK DARI PINGGIR */
    margin-top: 15px;

    border-radius: 50%;
    background: #fff;
    box-shadow: 0 2px 6px rgba(0,0,0,.15);

    color: #07b536;
    text-decoration: bold;
    
}
.btn-back i.material-icons {
    font-size: 32px; /* 🔥 BESARKAN PANAH */
    text-decoration: bold;
}



</style>
<div class="mobile-header">
    <a href="{{ url()->previous() }}" class="btn-back">
        <i class="material-icons">arrow_back</i>
    </a>
    <span class="header-title">Kembali</span>
</div>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-7 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            <i class="fas fa-user"></i> Mobile Login
                                        </h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('mobile.login.process') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control form-control-user @error('nama')
                                             is-invalid   
                                            @enderror"
                                                placeholder="Masukan ID Pelanggan" name="nama" value="{{ old('nama') }}">
                                            @error('nama')
                                                <medium class="text-danger">
                                                    {{ $message }}
                                                </medium>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user @error('password')
                                                is-invalid
                                            @enderror"
                                                placeholder="Masukan Password"name="password">
                                            @error('password')
                                                <medium class="text-danger">
                                                    {{ $message }}
                                                </medium>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>


                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <medium>
                                            Kembali Ke Beranda
                                            <a href="{{ route('mobilelandingpage') }}">Klik Disini</a>
                                        </medium>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <!-- Swet Alert 2-->
    @session('success')
        <script>
            Swal.fire({
                title: "Sukses",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endsession

    @session('error')
        <script>
            Swal.fire({
                title: "Uups...!",
                text: "{{ session('error') }}",
                icon: "error"
            });
        </script>
    @endsession

</body>

</html>
