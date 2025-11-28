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
                        <a href="{{ route('landingpage') }}" class="nav-item nav-link ">Beranda</a>
                        <a href="{{ route('aktifitas') }}" class="nav-item nav-link">Aktifitas</a>
                        <a href="{{ route('tentangkami') }}" class="nav-item nav-link">Tentang Kami</a>
                        <a href="{{ route('acara') }}" class="nav-item nav-link">Acara</a>
                        {{-- <a href="{{ route('kontakkami') }}" class="nav-item nav-link">Kontak Kami</a> --}}
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0 rounded-0">
                                <a href="{{ route('testimoni') }}" class="dropdown-item">Testimonial</a>
                                <a href="{{ route('listmasjid') }}" class="dropdown-item active">List Masjid</a>
                                <a href="{{ route('registrasi') }}" class="dropdown-item">Registrasi</a>
                            </div>
                        </div>

                    </div>
                    {{-- <a href="" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">Donate</a> --}}
                </div>
            </nav>
        </div>
    </div>
    <!-- Topbar End -->



    <!-- Hero Start -->
    <div class="container-fluid hero-header-listmasjid">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">List Masjid</h1>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item text-dark" aria-current="page">List Masjid</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- list masjid Start -->
    <div class="container-fluid activities py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 text-uppercase text-primary">
                List Masjid Penerima Manfaat Tunjangan Pembelian Token Listrik
            </p>
        </div>

        <div class="row g-4">
            @foreach ($listmasjid as $item)
                <div class="col-md-4 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="testimonial-item h-100 p-3 border rounded shadow-sm">
                        <div class="d-flex mb-3">
                            <div class="position-relative">
                                <img src="{{ asset('public/storage/foto_masjid/' . $item->foto_masjid) }}"
                                     alt="Foto Masjid"
                                     height="250"
                                     class="rounded shadow w-100 object-fit-cover">
                               
                            </div>
                        </div>

                        <div class="ps-1 my-auto text-center">
                            <h5 class="mb-1">{{ $item->nama_masjid }}</h5>
                            <p class="mb-0 small text-muted">{{ $item->alamat_lengkap }}</p>
                            <p  class="mb-0"><b>{{ $item->nama_ketua_dkm }}</b></p>
                            <p class="mb-0 small text-muted">{{ $item->regency->name ?? '-' }}</p>
                        </div>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </div>
</div>

    <!-- list masjid End -->


   <!-- Footer Start -->
    <div class="container-fluid footer pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
         
            <div class="row g-4 footer-inner">
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4">Cita <span class="text-primary">Amanat Martadiredja</span></h4>
                        <p class="mb-4 text-light">Menjadi Pelopor Gerakan Filantropi yang memberdayakan Umat untuk Kemandirian dan kemulian dalam
                    bingkai Keimanan dan Ketaqwaan.</p>
                        {{-- <a href="" class="btn btn-primary py-2 px-4">Donate Now</a> --}}
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4">Alamat</h4>
                        <div class="d-flex flex-column">
                            <h6 class="text-light mb-0">Alamat Kami</h6>
                            <div class="d-flex align-items-center border-bottom py-4">
                                <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i
                                        class="fa fa-map-marker-alt text-dark"></i></span>
                                <a href="" class="text">Puri Indah Cihampelas, Blok E7, No.15, Citapen, Cihampelas, Kab Bandung Barat,
                                        Jawa Barat, Indonesia</a>
                            </div>
                            <h6 class="text-light mt-4 mb-0">Phone </h6>
                            <div class="d-flex align-items-center py-4">
                                <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i
                                        class="fa fa-phone-alt text-dark"></i></span>
                                <a href="" class="text-light">+012 345 67890</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4">Explore Link</h4>
                        <div class="d-flex flex-column align-items-start">
                            <a class="text-light mb-2" href="{{ route('landingpage') }}"><i class="fa fa-check text-light me-2"></i>Beranda</a>
                            <a class="text-light mb-2" href="{{ route('tentangkami') }}"><i class="fa fa-check text-light me-2"></i>Tentang Kami</a>
                            <a class="text-light mb-2" href="{{ route('aktifitas') }}"><i class="fa fa-check text-primary me-2"></i>Aktifitas</a>
                            <a class="text-light mb-2" href="{{ route('acara') }}"><i class="fa fa-check text-light me-2"></i>Acara</a>
                            <a class="text-light mb-2" href="{{ route('kontakkami') }}"><i class="fa fa-check text-primary me-2"></i>Kontak Kami</a>
                            <a class="text-light mb-2" href="{{ route('testimoni') }}"><i class="fa fa-check text-primary me-2"></i>Testimonial</a>
                            <a class="text-light mb-2" href="{{ route('listmasjid') }}"><i class="fa fa-check text-light me-2"></i>List Masjid</a>
                            
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4">Latest Post</h4>
                        <div class="d-flex border-bottom border-secondary py-4">
                            <img src="/mosque/img/blog-mini-1.jpg" class="img-fluid flex-shrink-0" alt="">
                            <div class="ps-3">
                                <p class="mb-0 text-muted">01 Jan 2045</p>
                                <a href="" class="text-body">Lorem ipsum dolor sit amet elit eros vel</a>
                            </div>
                        </div>
                        <div class="d-flex py-4">
                            <img src="/mosque/img/blog-mini-2.jpg" class="img-fluid flex-shrink-0" alt="">
                            <div class="ps-3">
                                <p class="mb-0 text-muted">01 Jan 2045</p>
                                <a href="" class="text-body">Lorem ipsum dolor sit amet elit eros vel</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="container py-4">
            <div class="border-top border-secondary pb-4"></div>
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                     <a class="" href="#"> &copy; Cita Amanat Martadiredja 2025 , All Right Reserved.</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">Obink</a>
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
</body>

</html>
