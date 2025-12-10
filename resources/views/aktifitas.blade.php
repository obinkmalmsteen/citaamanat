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
                        <a href="{{ route('aktifitas') }}" class="nav-item nav-link active">Aktifitas</a>
                        <a href="{{ route('tentangkami') }}" class="nav-item nav-link">Tentang Kami</a>
                        <a href="{{ route('acara') }}" class="nav-item nav-link">Acara</a>
                        {{-- <a href="{{ route('kontakkami') }}" class="nav-item nav-link">Kontak Kami</a> --}}
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0 rounded-0">
                                <a href="{{ route('testimoni') }}" class="dropdown-item">Testimonial</a>
                                <a href="{{ route('listmasjid') }}" class="dropdown-item">List Masjid</a>
                                <a href="{{ route('registrasi') }}" class="dropdown-item">Registrasi</a>
                                <a href="{{ route('listdonatur') }}" class="dropdown-item">Donatur</a>
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
    <div class="container-fluid hero-header-aktifitas">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Aktifitas</h1>
                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item text-dark" aria-current="page">More</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <style>
        .custom-img {
            width: 100%;
            /* atau angka tertentu seperti 600px */
            height: 280px;
            /* tinggi yang kamu inginkan */
            object-fit: cover;
            /* supaya gambar tidak gepeng */
        }
    </style>

    <div class="container-fluid team py-15">
        <div class="container py-15">
            <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <p class="fs-1 text-uppercase text-primary"></p> <br> <br>
                <h4 class="display-6">Berbagai Aktifitas Kami yang Sudah Terlaksana Dan Akan Menjadi Program
                    Untuk
                    Selanjutnya</h4>
            </div>



            <div class="row g-5">
                <div class="col-lg-4 col-xl-5">
                    <div class="team-img wow zoomIn" data-wow-delay="0.1s">
                        <img src="/mosque/img/renov1.png" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-xl-7">
                    <div class="team-item wow fadeIn" data-wow-delay="0.1s">
                        <h3 id="bagian-perbaikan">Perbaikan Beribu Masjid & Mushola</h3>

                        <p class="mb-0" style="text-align: justify;">Memperbaiki Bangunan, memperkuat Iman dalam
                            wujudkan mimpi bersama untuk mempercantik
                            rumah-rumah Allah.

                            Mengembalikan masjid sebagai pusat ibadah, kebudayaan dan jantung peradaban umat. Kini
                            banyak diantaranya yang telah lapuk dimakan usia dan perlu uluran tangan kita. Bersama
                            dalam gerakan perbaikan beribu Masjid dan Mushola kita tidak hanya memperbaiki bangunan,
                            tetapi merawat peradaban dan warisan Islami untuk generasi mendatang.</p>
                        <div class="team-icon d-flex pb-4 mb-4 border-bottom border-primary">

                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="team-item wow zoomIn" data-wow-delay="0.2s">
                                <img src="/mosque/img/renov2.png" class="img-fluid custom-img" alt="">


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-item wow zoomIn" data-wow-delay="0.4s">
                                <img src="/mosque/img/renov3.png" class="img-fluid custom-img" alt="">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-item wow zoomIn" data-wow-delay="0.6s">
                                <img src="/mosque/img/renov4.png" class="img-fluid custom-img" alt="">

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <br>
            <div class="team-icon d-flex pb-4 mb-4 border-bottom border-primary">

            </div>
            <br>


            {{--  nyaah ka indung --}}
<div class="container"> 
    <div class="row g-5">
        <div class="col-lg-4 col-xl-5">
                    <div class="team-img wow zoomIn" data-wow-delay="0.1s">
                        <img src="/mosque/img/ibu0.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-xl-7">
                    <div class="team-item wow fadeIn" data-wow-delay="0.1s">
                        <h3 id="bagian-indung">Nyaah Ka Indung</h3> <br>

                        <p class="mb-0" style="text-align: justify;">Nyaah ka Indung sebuah program yang kami
                            hadirkan sebagai bukti
                            kepedulian, cinta dan
                            kasih kita kepada orang tua. Mewujudkan masyarakat yang peduli dan berbakti kepada orang
                            tua manula sebagai bentuk tanggung jawab sosial.</p>
                        <div class="team-icon d-flex pb-4 mb-4 border-bottom border-primary">

                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="team-item wow zoomIn" data-wow-delay="0.2s">
                                <img src="/mosque/img/ibu1.jpg" class="img-fluid custom-img" alt="">


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-item wow zoomIn" data-wow-delay="0.4s">
                                <img src="/mosque/img/ibu2.jpg" class="img-fluid custom-img" alt="">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-item wow zoomIn" data-wow-delay="0.6s">
                                <img src="/mosque/img/ibu3.jpg" class="img-fluid custom-img" alt="">

                            </div>
                        </div>
                    </div>

                    <div class="team-item wow fadeIn" data-wow-delay="0.1s">
                        {{-- <h3 id="bagian-indung">Realisasi</h3>  --}}
                        <br>

                        <p class="mb-0" style="text-align: justify;">Kegiatan Nyaah Ka Indung Yayasan Cita Amanah
                            Martadiredja, yang diselenggarakan di Desa Singajaya Kabupaten Bandung Barat pada 10 Oktober
                            2025 dengan jumlah penyaluran dana sebanyak …… orang dengan nominal Rp. 200.000,- / orang.
                        </p>
                        <div class="team-icon d-flex pb-4 mb-4 border-bottom border-primary">

                        </div>
                    </div>
                </div>

            <div class="col-lg-8 col-xl-12">
    <div class="row g-3">
        <div class="col-2">
            <img src="/mosque/img/ibu1.jpg" class="img-fluid custom-img" alt="">
        </div>
        <div class="col-2">
            <img src="/mosque/img/ibu2.jpg" class="img-fluid custom-img" alt="">
        </div>
        <div class="col-2">
            <img src="/mosque/img/ibu3.jpg" class="img-fluid custom-img" alt="">
        </div>
        <div class="col-2">
            <img src="/mosque/img/ibu1.jpg" class="img-fluid custom-img" alt="">
        </div>
        <div class="col-2">
            <img src="/mosque/img/ibu2.jpg" class="img-fluid custom-img" alt="">
        </div>
        <div class="col-2">
            <img src="/mosque/img/ibu3.jpg" class="img-fluid custom-img" alt="">
        </div>
    </div>
</div>


 </div>


            </div>
            <br>
            {{-- --}}
            <div class="team-icon d-flex pb-4 mb-4 border-bottom border-primary">

            </div>
            <br>

            <div class="row g-5">
                <div class="col-lg-4 col-xl-5">
                    <div class="team-img wow zoomIn" data-wow-delay="0.1s">
                        <img src="/mosque/img/adzan0.png" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-xl-7">
                    <div class="team-item wow fadeIn" data-wow-delay="0.1s">
                        <h3 id="bagian-muadzin">Muadzin Cilik</h3>
                        <h5 class="fw-normal fst-italic text-primary mb-4">Mengasah Keberanian & Membentuk Generasi
                            Pecinta Masjid</h5>



                        <p class="mb-0" style="text-align: justify;">Program Muadzin Cilik yang telah
                            diselenggarakan sejak Februari 2025 di Masjid Hunusl Khotimah, Cileunyi – Bandung, menjadi
                            salah satu upaya mulia untuk menumbuhkan kecintaan anak-anak terhadap masjid serta melatih
                            keberanian mereka dalam mengumandangkan adzan.

                            Melihat semangat para peserta dan dukungan dari masyarakat, Yayasan Cita Amanat Martadiredja
                            merasa sangat terdorong untuk mengambil bagian dalam program ini. Kami meyakini bahwa
                            membina generasi sejak dini adalah investasi terbaik bagi kemajuan umat.

                            Program ini tidak hanya mengajarkan teknis adzan, tetapi juga menanamkan nilai-nilai:

                            Keberanian untuk tampil di depan publik

                            Kepercayaan diri dan disiplin

                            Kecintaan terhadap masjid

                            Pembiasaan ibadah sejak usia dini

                            Kami berharap kehadiran kami dapat memperkuat keberlanjutan program ini dan memberikan
                            manfaat yang lebih luas bagi para santri, masyarakat, dan lingkungan sekitar Masjid Hunusl
                            Khotimah.

                            Dengan izin Allah, semoga program Muadzin Cilik dapat terus berkembang dan menjadi inspirasi
                            bagi masjid-masjid lainnya.</p>
                        <div class="team-icon d-flex pb-4 mb-4 border-bottom border-primary">

                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="team-item wow zoomIn" data-wow-delay="0.2s">
                                <img src="/mosque/img/adzan1.jpg" class="img-fluid custom-img" alt="">


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-item wow zoomIn" data-wow-delay="0.4s">
                                <img src="/mosque/img/adzan4.png" class="img-fluid custom-img" alt="">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-item wow zoomIn" data-wow-delay="0.6s">
                                <img src="/mosque/img/adzan2.jpg" class="img-fluid custom-img" alt="">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
           

            {{-- --}}
            <div class="team-icon d-flex pb-4 mb-4 border-bottom border-primary">

            </div>

            <br>

            <div class="row g-5">
                <div class="col-lg-4 col-xl-5">
                    <div class="team-img wow zoomIn" data-wow-delay="0.1s">
                        <img src="/mosque/img/ngaji0.png" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-xl-7">
                    <div class="team-item wow fadeIn" data-wow-delay="0.1s">
                        <h3 id="bagian-ngaji">Bantuan Honor Guru Ngaji</h3>


                        <p class="mb-0" style="text-align: justify;">Sebuah inisiatif nyata untuk
                            memberikan apresiasi dan dukungan Finansial kepada para guru ngaji di wilayah kita.
                            Mereka adalah Pejuang Huruf Hijaiyah yang telah mengabdikan diri dengan tulus,
                            mengajarkan Al-Qur'an dan menanamkan akhlak mulia kepada anak-anak kita. Program ini
                            bukan sekadar bantuan, melainkan sebuah Tunjangan Kehormatan sebagai wujud terima kasih
                            kami, memastikan cahaya Al-Qur'an akan terus bersinar melalui pengabdian mereka yang
                            mulia.</p>
                        <div class="team-icon d-flex pb-4 mb-4 border-bottom border-primary">

                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="team-item wow zoomIn" data-wow-delay="0.2s">
                                <img src="/mosque/img/ngaji1.png" class="img-fluid custom-img" alt="">


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-item wow zoomIn" data-wow-delay="0.4s">
                                <img src="/mosque/img/ngaji2.png" class="img-fluid custom-img" alt="">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-item wow zoomIn" data-wow-delay="0.6s">
                                <img src="/mosque/img/ngaji3.png" class="img-fluid custom-img" alt="">

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- satu --}}







    <style>
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

        .footer-line {
            border-top: 1px solid #ffc107;
            /* warna warning */
        }

        .footer-lineright {
            border-right: 1px solid #ffc107;
            /* warna warning */
        }
    </style>

    <!-- Footer Start -->
    <div class="container-fluid footer pt-15 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-15">
            <div class="row g-4 footer-inner ">
                <div class="col-md-4 col-lg-6 col-xl-2">
                    <div class="footer-item mt-5 mb-3">
                        <div class="col-12">
                            <img src="/mosque/img/logoyayasan.png" class="img-fluid rounded-circle" alt=""
                                class="img-fluid rounded" style="width: 200px; height: 200px; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-6 col-xl-4">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4"><span class="text-primary">Cita Amanat Martadiredja</span></h4>
                        <p class=" text-light m-0">Menjadi Pelopor Gerakan Filantropi yang memberdayakan Umat untuk
                            Kemandirian dan
                            kemulian dalam
                            bingkai Keimanan dan Ketaqwaan.</p>
                        {{-- <a href="" class="btn btn-primary py-2 px-4">Donate Now</a> --}}
                    </div>
                </div>
                <div class="col-md-4 col-lg-6 col-xl-4">
                    <div class="footer-item mt-15">
                        <div class="d-flex align-items-center  py-4">
                            <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i
                                    class="fa fa-map-marker-alt text-dark"></i></span>
                            <a href="" class="text-light">Puri Indah Cihampelas, Blok E7, No.15, Citapen,
                                Cihampelas, Kab Bandung Barat,
                                Jawa Barat, Indonesia</a>
                        </div>
                        <div class="d-flex align-items-center  mt-15">
                            <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i
                                    class="fa fa-phone-alt text-dark"></i></span>
                            <a href="" class="text-light">082 246 777 900</a>
                        </div>
                        <div class="d-flex align-items-center  py-4">
                            <span class="flex-shrink-0 btn-square bg-primary me-3 p-4 text-dark"><b>@</b></i></span>
                            <a href="" class="text-light">Terangiberibumasjid@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-6 col-xl-2">
                    <div class="footer-item mt-5">
                        <h4 class="text-primary mb-4">Explore Link</h4>
                        <div class="d-flex flex-column align-items-start">
                            <a class="text-primary mb-2" href="{{ route('landingpage') }}"><i
                                    class="fa fa-check text-primary me-2"></i>Beranda</a>
                            <a class="text-light mb-2" href="{{ route('tentangkami') }}"><i
                                    class="fa fa-check text-light me-2"></i>Tentang Kami</a>
                            <a class="text-light mb-2" href="{{ route('aktifitas') }}"><i
                                    class="fa fa-check text-light me-2"></i>Aktifitas</a>
                            <a class="text-light mb-2" href="{{ route('acara') }}"><i
                                    class="fa fa-check text-light me-2"></i>Acara</a>
                            {{-- <a class="text-light mb-2" href="{{ route('kontakkami') }}"><i class="fa fa-check text-primary me-2"></i>Kontak Kami</a> --}}
                            <a class="text-light mb-2" href="{{ route('testimoni') }}"><i
                                    class="fa fa-check text-light me-2"></i>Testimonial</a>
                            <a class="text-light mb-2" href="{{ route('listmasjid') }}"><i
                                    class="fa fa-check text-light me-2"></i>List Masjid</a>

                        </div>
                    </div>
                </div>
            </div>

            {{-- baris1 --}}
            <div class="container  ">
                <div class="footer-line mb-15 "></div>
                <div class="row g-4 footer-inner ">

                    <div class="col-md-4 col-lg-6 col-xl-4">
                        <div class="footer-item mt-3">
                            <a class="text-light mb-1"><span class="text-primary">Donasi Terkumpul Sampai : <p
                                        class="mb-1 text-primary" id="tanggalSekarang"></p></span></a>
                            <h2 class="mt-5 mb-5 text-light"><span class="text-light">
                                    Rp {{ number_format($totalDonasi, 0, ',', '.') }} </span> </h2>
                            <a class="text-light mt-1"><span class="text-primary">Donatur Tetap :
                                    {{ $totalDonaturTetap }} <p class="mb-1 text-light"></p>Partisipan Kebaikan :
                                    {{ $totalDonaturTidakTetap }}</span></a>
                        </div>
                    </div>


                   <div class="col-md-4 col-lg-6 col-xl-4">
                        <div class="footer-item mt-3">
                            <a class="text-light mb-1"><span class="text-primary">Realisasi Donasi Sampai : <p
                                        class="mb-1 text-primary" id="tanggalSekarang1"></p></span></a>
                            <h2 class="mt-5 mb-5 text-light"><span class="text-light">
                                    Rp {{ number_format($totalSemuaPengeluaran, 0, ',', '.') }} </span> </h2>
                            <a class="text-light mt-1"><span class="text-primary">Saldo Donasi :
                                   </a>
                                    <h5 class="mt-1 mb-4 text-warning"><span class="text-warning">
                                    Rp {{ number_format($sisaSaldo, 0, ',', '.') }} </span> </h5>
                        </div>
                    </div>  

                    

                    <div class="col-md-4 col-lg-6 col-xl-4">
                        <div class="footer-item mt-4">
                            <a class="text-light mb-4"><span class="text-light ">Penyaluran Donasi melalui :</span>
                            </a>
                            <p class="mb-1 text-light">
                                <span class="text-primary ">Yayasan Cita Amanat Martadiredja</span>
                            </p>

                            <h5 class="mb-1 text-primary">BNI 1967473460 </h5>
                                        
                            <h4 class="text-light mb-1 mt-3"><span class="text-primary">Qris:</span></h4>
                             
                            <div class="d-flex flex-column align-items-start mt-1">
                                <span class=""> <img src="/mosque/img/qris.png"
                                        class="img-fluid flex-shrink-10" alt="QRIS" width="100"
                                        style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#imageModal"
                                        onclick="showImageModal('/mosque/img/qrisCAM.jpg')">
                                </span>
                                <p class="mb-1 text-light"><i> Klik Gambar untuk Memperbesar.</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- bagian baris 2  --}}
                <div class="footer-donatur ">
                    <h4 class="text-light mt-3 mb-10"><span class="text-primary">Donatur Tetap:</span></h4>
                    <div class="footer-line  mb-3"></div>
                    <div class="donatur-grid">

                        @forelse($donaturTetap as $donatur)
                            <div class="donatur-item">

                                <div class="donatur-profile">
                                    <div class="avatar-wrapper">

                                        {{-- Logo --}}
                                        @if (!empty($donatur->logo_donatur))
                                            <img src="{{ asset('public/storage/logo_donatur/' . $donatur->logo_donatur) }}"
                                                class="avatar-image">

                                            {{-- Initial --}}
                                        @else
                                            @php
                                                // Pisahkan nama berdasarkan spasi
                                                $words = explode(' ', trim($donatur->nama_donatur));

                                                // Ambil maksimal 3 kata
                                                $initial = '';
                                                foreach (array_slice($words, 0, 3) as $w) {
                                                    $initial .= strtoupper(substr($w, 0, 1));
                                                }
                                            @endphp

                                            <div class="avatar-initial">
                                                {{ $initial }}
                                            </div>
                                        @endif
                                    </div>

                                    <div>
                                        <div class="donatur-name">
                                            {{ $donatur->nama_donatur }}
                                        </div>
                                        @if ($donatur->alamat_donatur)
                                            <div class="donatur-address">
                                                {{ $donatur->alamat_donatur }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <span class="text-light">Belum ada Donatur Tetap</span>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="container py-4">
                <div class="border-top border-secondary pb-4"></div>
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <a class="" href="#"> &copy; Cita Amanat Martadiredja 2025 , All Right
                            Reserved.</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">

                        Designed By | Obink
                    </div>
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
    <script>
        document.getElementById('tanggalSekarang').innerText =
            new Date().toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });
    </script>
     <script>
        document.getElementById('tanggalSekarang1').innerText =
            new Date().toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });
    </script>
</body>

</html>
