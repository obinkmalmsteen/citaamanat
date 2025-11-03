<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Beranda</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('enno/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('enno/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('enno/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('enno/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: eNno
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Cita Amanat Martadiredja</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>

                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">Login</a>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center"
                        data-aos="fade-up">
                        <h3>Selamat Datang Di Laman</h3>
                        <h2>Cita Amanat Martadiredja</h2>
                        <div class="d-flex">
                            <a href="#about" class="btn-get-started">Tentang Kami</a>

                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{ asset('enno/assets/img/logoyayasan.png') }}" class="img-fluid animated"
                            alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('enno/assets/img/masjidlampu.png') }}" alt="Terangi Masjid"
                                    class="img-fluid icon-box">
                            </div>

                            <h4><a href="" class="stretched-link">Terangi Beribu Masjid & Mushola</a></h4>
                            <p>Sebuah gerakan mengembalikan kejayaan Masjid dan Mushola sebagai pusat dari kegiatan
                                Agama, mendidik dan mencetak generasi berjiwa Islami dengan mewujudkan tempat yang
                                nyaman dan asri serta penerangan yang baik dan cukup.

                                Kami hadir menyalurkan dan memastikan setiap Masjid dan Mushola tersedia token listrik
                                yang cukup, demi kelangsungan operasional masjid yang sehat.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('enno/assets/img/renovmushola.png') }}" alt="Perbaikan Masjid"
                                    class="img-fluid icon-box">
                            </div>

                            <h4><a href="" class="stretched-link">Perbaikan Beribu Masjid & Mushola</a></h4>
                            <p>Memperbaiki Bangunan, memperkuat Iman dalam wujudkan mimpi bersama untuk mempercantik
                                rumah-rumah Allah.

                                Mengembalikan masjid sebagai pusat ibadah, kebudayaan dan jantung peradaban umat. Kini
                                banyak diantaranya yang telah lapuk dimakan usia dan perlu uluran tangan kita. Bersama
                                dalam gerakan perbaikan beribu Masjid dan Mushola kita tidak hanya memperbaiki bangunan,
                                tetapi merawat peradaban dan warisan Islami untuk generasi mendatang.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('enno/assets/img/nenek.png') }}" alt="Nyaah Ka iNdung"
                                    class="img-fluid icon-box">
                            </div>

                            <h4><a href="" class="stretched-link">Nyaah Ka Indung</a></h4>
                            <p>Nyaah ka Indung sebuah program yang kami hadirkan sebagai bukti kepedulian, cinta dan
                                kasih kita kepada orang tua. Mewujudkan masyarakat yang peduli dan berbakti kepada orang
                                tua manula sebagai bentuk tanggung jawab sosial.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('enno/assets/img/adzan.png') }}" alt="Adzan Cilik"
                                    class="img-fluid icon-box">
                            </div>

                            <h4><a href="" class="stretched-link">Muadzin Cilik</a></h4>
                            <p>Lebih dari sekadar panggilan. Ini adalah program kaderisasi berbasis apresiasi yang
                                bertujuan mulia, yaitu menanamkan kecintaan pada ibadah sekaligus memastikan pelestarian
                                seni dan syiar Adzan dari generasi ke generasi. Kami membina hari ini untuk Adzan yang
                                berkelanjutan esok hari</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('enno/assets/img/guru_ngaji.png') }}" alt="Adzan Cilik"
                                    class="img-fluid icon-box">
                            </div>

                            <h4><a href="" class="stretched-link">Bantuan Honor Guru Ngaji</a></h4>
                            <p>Dengan bangga meluncurkan Program Bantuan Honor Guru Ngaji , sebuah inisiatif nyata untuk
                                memberikan apresiasi dan dukungan Finansial kepada para guru ngaji di wilayah kita.
                                Mereka adalah Pejuang Huruf Hijaiyah yang telah mengabdikan diri dengan tulus,
                                mengajarkan Al-Qur'an dan menanamkan akhlak mulia kepada anak-anak kita. Program ini
                                bukan sekadar bantuan, melainkan sebuah Tunjangan Kehormatan sebagai wujud terima kasih
                                kami, memastikan cahaya Al-Qur'an akan terus bersinar melalui pengabdian mereka yang
                                mulia."</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Featured Services Section -->



        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Visi Kami<br></span>
                <h2>Visi Kami</h2>
                <p>Menjadi Pelopor Gerakan Filantropi yang memberdayakan Umat untuk Kemandirian dan kemulian dalam
                    bingkai Keimanan dan Ketaqwaan. </p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>Misi Kami</h3>

                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Mewujudkan sarana ibadah yang layak, nyaman, dan
                                    berkelanjutan melalui revitalisasi insfrastruktur Masjid dan Mushola.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Meningkatkan kualitas kehidupan seorang Ibu dan
                                    keluarga sebagai pilar utama peradaban melalui program Santunan dalam bentuk uang
                                    dan sembako (Nyaah ka Indung).</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>membangun jejaring kolaborasi (mitra) dengan
                                    berbagai pihak untuk memperluas dampak kebaikan dan keberlanjutan program.</span>
                            </li>
                            <li><i class="bi bi-check2-all"></i> <span>Menjaga Amanah dan menyalurkan donasi dengan
                                    prinsip transparansi, akuntabilitas dan profesional.</span></li>
                        </ul>

                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $masjidBelumDisetujui }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Masjid Dalam Proses Registrasi</p>
                        </div>
                    </div><!-- End Stats Item -->





                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $masjidDisetujui }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Masjid Sudah Teregistrasi</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $totalRequestRealisasi }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Total Token Yang Terealisasi</p>
                        </div>
                    </div><!-- End Stats Item -->


                </div>

            </div>

        </section><!-- /Stats Section -->



        <!-- /video Section -->

        <!-- <section id="testimonials" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5" data-aos="fade-up">Testimoni Terbaru</h2>

        <div class="row gy-4 justify-content-center">
            @forelse ($testimonials as $item)
<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="service-item position-relative text-center shadow-sm p-3 rounded bg-light">
                        <div class="icon mb-3">
                            @if ($item->video)
<video width="50%" height="auto" controls class="rounded shadow-sm">
                                    <source src="{{ asset('storage/' . $item->video) }}" type="video/mp4">
                                    Browser kamu tidak mendukung pemutar video.
                                </video>
@else
<p class="text-muted small">Tidak ada video.</p>
@endif
                        </div>

                        <h5 class="mt-3">{{ $item->id_pelanggan }}</h5>
                        <h3 class="text-muted small">{{ $item->ucapan }}</h3>
                        <h2 class="text-muted small">{{ $item->keterangan }}</h2>
                    </div>
                </div>
        @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada testimonial yang tersedia.</p>
                </div>
@endforelse
        </div>
    </div>
</section> -->






        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Testimonials</span>
                <h2>Testimonials</h2>
                <p>Testimoni Dari berbagai penerima manfaat di seluruh Indonesia</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper" data-speed="600" data-delay="5000"
                    data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                }
              }
            }
          </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                <span>{{ $testimonial->ucapan }}</span>
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                            <!-- Kalau ada gambar, bisa simpan nama file di DB -->
                                            <img src="assets/img/testimonials/testimonials-{{ $loop->iteration }}.jpg"
                                                class="testimonial-img" alt="">
                                            <h3>{{ $testimonial->keterangan }}</h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>






                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>

        </section><!-- /Testimonials Section -->


<!-- registrasi MASJID Section -->
<section id="call-to-action" class="call-to-action section accent-background" style="background-color: #7daaed;">

    <div class="container">
        <div class="row text-center" data-aos="zoom-in" data-aos-delay="100">

     

            <!-- Kolom 1-->
            <div class="col-md-4 mb-4">
                <h3>Step 1</h3>
                <br>
                <h3>Registrasi Masjid</h3>
                <p>Silakan registrasi masjid baru melalui tombol di bawah ini:</p>
                <a class="cta-btn btn btn-primary" href="{{ route('registrasi') }}">Registrasi Masjid</a>
            </div>

                   <!-- Kolom 2 -->
            <div class="col-md-4 mb-4">
                <h3>Step 2</h3>
                <br>
                <h2>Daftar Masjid </h2>
                <p>Melihat lebih lanjut List Masjid Yang Sudah Mendaftar dan Untuk Mengetahui Status Masjid Yang Anda Daftarkan</p>
                <a href="{{ route('data.masjid.publik') }}" class="cta-btn btn btn-primary">Lihat Data</a>
            </div>

            <!-- Kolom 3 -->
            <div class="col-md-4 mb-4">
                <h3>Step 3</h3>
                <br>
                <h2>Login</h2>
                <p>Jika Masjid Anda Sudah Teregistrasi, maka tim Kami akan memberikan akun  dan password untuk login.</p>
                <a href="{{ route('login') }}" class="cta-btn btn btn-primary">Login</a>
            </div>

        </div>
    </div>

</section>
<!-- registrasi MASJID Section -->




        <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Section Title</span>
                <h2>Team</h2>
                <p>-----------</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid"
                                    alt=""></div>
                            <div class="member-info">
                                <h4>Erick Martadiredja</h4>
                                <span>CEO</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid"
                                    alt=""></div>
                            <div class="member-info">
                                <h4>Wiji Samiono</h4>
                                <span>COO</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid"
                                    alt=""></div>
                            <div class="member-info">
                                <h4>Robi</h4>
                                <span>CTO</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                </div>

            </div>

        </section><!-- /Team Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Section Title</span>
                <h2>Kontak</h2>
                <p>Silahkan Kontak Kami</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-12">

                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Alamat</h3>
                                    <p>Puri Indah Cihampelas, Blok E7, No.15, Citapen, Cihampelas, Kab Bandung Barat,
                                        Jawa Barat, Indonesia</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Kontak Kami</h3>
                                    <h5>Erick Martadiredja</h5>

                                    <p> </p>
                                    <br>
                                    <h5>Wiji Samiono</h5>
                                    <p> </p>
                                </div>
                            </div><!-- End Info Item -->


                        </div>
                    </div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4441.356178896311!2d107.50141794366138!3d-6.9455762552019324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1761649431069!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>


                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer">



        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Cita Amanat Martadiredja</strong>
                <span>V.1.00</span></p>

        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('enno/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('enno/assets/js/main.js') }}"></script>

</body>

</html>
