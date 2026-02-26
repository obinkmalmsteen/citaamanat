<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TBM . List Donatur</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
<link rel="icon" type="image/x-icon" href="{{ asset('mobile/img/favicontamama1.ico') }}">
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
                        <a href="{{ route('acara') }}" class="nav-item nav-link active">Acara</a>
                        {{-- <a href="{{ route('kontakkami') }}" class="nav-item nav-link">Kontak Kami</a> --}}
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0 rounded-0">
                                <a href="{{ route('testimoni') }}" class="dropdown-item">Testimonial</a>
                                <a href="{{ route('listmasjid') }}" class="dropdown-item">List Masjid</a>
                                <a href="{{ route('landingpage') }}" class="dropdown-item">Registrasi</a>
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
    <div class="container-fluid hero-header-acara">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Donatur</h1>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item text-dark" aria-current="page">list</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

{{-- graphics bar --}}


<div class="card border-0 shadow-sm rounded-4 mb-5">
    <div class="card-body">

        <h6 class="fw-bold text-center mb-3">
            Perbandingan Pemasukan & Pengeluaran
            <span class="text-muted">({{ $tahun }})</span>
        </h6>

        <canvas id="grafikKeuangan" height="120"></canvas>

    </div>
</div>
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
        <div class="col-12 col-md-6 col-lg-2">

            <div class="card h-100 border-0 section-soft-gray shadow-sm rounded-4 card-donatur">
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
                        <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill mb-2">
                            Donatur Tetap
                        </span>
                    @else
                        <span class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill mb-2">
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
        <h4  class="fw-bold text-danger mb-1" id="Pengeluaran-Dana">Pengeluaran Dana</h4>
        <p class="text-muted mb-3" >
            Transparansi penggunaan dana yang telah dihimpun
        </p>

        <div class="alert alert-danger d-inline-block px-4 py-2 rounded-4 shadow-sm">
            <strong>Total Pengeluaran:</strong>
            Rp {{ number_format($totalSemuaPengeluaran, 0, ',', '.') }}
        </div>
    </div>
    

<div class="row g-4">
    @foreach ($datakeluar as $row)
        <div class="col-12 col-md-6 col-lg-2">

            <div class="card h-100 border-0 section-soft-gray shadow-sm rounded-4 card-pengeluaran">

                {{-- Bukti --}}
                @if($row->bukti)
                    <img src="{{ asset('storage/'.$row->bukti) }}"
                         class="card-img-top bukti-img"
                         alt="Bukti Pengeluaran">
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
                        {{ ucfirst(str_replace('_',' ', $row->kategori)) }}
                    </span>

                    {{-- Deskripsi --}}
                    <p class="fw-semibold mb-3 text-dark">
                        {{ $row->deskripsi }}
                    </p>

                    {{-- Nominal --}}
                    <div class="border-top pt-3 mb-3">
                        <span class="text-muted small">Jumlah Pengeluaran</span>
                        <div class="fs-5 fw-bold text-danger">
                            Rp {{ number_format($row->jumlah,0,',','.') }}
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
        /* Donatur Card */
.card-donatur {
    transition: all 0.3s ease;
}

.card-donatur:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.08);
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
    box-shadow: 0 12px 25px rgba(0,0,0,0.08);
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
    background-color: #f5f6f8; /* abu-abu tipis elegan */
}

/* Card tetap putih & mengambang */
.section-soft-gray .card {
    background-color: #ffffff;
}

    </style>


    <!-- Footer Start -->
    <div class="container-fluid footer pt-15 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-15">

            <div class="row g-4 footer-inner">
                <div class="col-md-4 col-lg-6 col-xl-2">
                    <div class="footer-item mt-5">
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
                    <div class="footer-item mt-5">
                        <h4 class="text-primary mb-4">Alamat</h4>

                        <div class="d-flex align-items-center border-bottom py-4">
                            <span class="flex-shrink-0 btn-square bg-primary me-3 p-4"><i
                                    class="fa fa-map-marker-alt text-dark"></i></span>
                            <a href="" class="text-light">Puri Indah Cihampelas, Blok E7, No.15, Citapen,
                                Cihampelas, Kab Bandung Barat,
                                Jawa Barat, Indonesia</a>
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


            <div class="row g-4 footer-inner">
                <div class="col-md-4 col-lg-6 col-xl-9">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4"><span class="text-primary">Donasi :</span></h4>
                        <p class="mb-1 text-light">Dengan segala kerendahan hati, kami membuka kesempatan bagi
                            Bapak/Ibu yang ingin menunaikan sedekah jariyah untuk kemaslahatan masjid. Donasi dapat
                            ditransfer ke: <span class="text-primary"> Yayasan Cita Amanat martadiredja
                                <b>BNI 1967473460</b> </span> .</p>
                        <p class="mb-1 text-light">Insya Allah, setiap amanah yang diberikan akan kami salurkan melalui
                            program-program yang kami jalankan demi kemakmuran masjid khususnya, serta kemaslahatan umat
                            pada umumnya. Semoga Allah membalas setiap kebaikan yang dititipkan, dan menjadikannya amal
                            yang terus mengalir manfaatnya bagi umat.</p>
                        {{-- <a href="" class="btn btn-primary py-2 px-4">Donate Now</a> --}}
                    </div>
                </div>

                <div class="col-md-4 col-lg-6 col-xl-3">
                    <div class="footer-item mt-5">
                        <h4 class="text-light mb-4"><span class="text-primary">Qris:</span></h4>
                        <div class="d-flex flex-column align-items-start">
                            <span class=""> <img src="/mosque/img/qris.png" class="img-fluid flex-shrink-10"
                                    alt="QRIS" width="120" style="cursor:pointer;" data-bs-toggle="modal"
                                    data-bs-target="#imageModal" onclick="showImageModal('/mosque/img/qrisCAM.jpg')">
                            </span>
                            <p class="mb-1 text-light"><i> Klik Gambar untuk Memperbesar.</i></p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="footer-donatur mt-5">
                <h4 class="text-light mb-4"><span class="text-primary">Donatur Tetap:</span></h4>

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
                    <a class="" href="#"> &copy; Cita Amanat Martadiredja 2025 , All Right Reserved.</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By | Obink
                </div>
            </div>
        </div>
    </div>

    <!-- Footer End -->
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(document.getElementById('grafikKeuangan'), {
    type: 'bar',
    data: {
        labels: [
            'Jan','Feb','Mar','Apr','Mei','Jun',
            'Jul','Agu','Sep','Okt','Nov','Des'
        ],
        datasets: [
            {
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
            legend: { position: 'bottom' }
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
