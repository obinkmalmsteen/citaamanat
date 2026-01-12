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
        <div class="mobile-header-aktifitas text-white d-block d-md-none">

            <div class="content-wrapper">
                <p class="text-uppercase  mb-1">Data Masjid</p>
                <p class="text-uppercase mb-1">Cita Amanat Martadiredja</p>
            </div>
        </div>


        {{-- start faq --}}
        <div class="container py-3">
            <div class="card mb-2 border-0 rounded-0">
                <strong>Assalamualaikum Wr Wb</strong>
                <p class="mb-2 text-muted">
                    Sebelum Anda bertanya di group Whatsapp, ada baiknya silahkan di baca dulu pertanyaan-pertanyaan di
                    bawah ini, Siapa tahu Hal yang hendak anda tanyakan sudah terjawab disini, Terima kasih..
                </p>
            </div>




            <h5 class="fw-bold mb-3 text-center">Frequently Asked Questions</h5>
            <h6 class="fw-bold mb-3 text-center">(Pertanyaan Yang Sering Muncul)</h6>

            <div id="accordion2">
                <div class="card mb-1 border-0 rounded-0">
                    <div class="card-header  rounded-0 py-2" id="headingOne2">
                        <a href="" 
                        class="accordion-link text-white" 
                        data-toggle="collapse" 
                        data-target="#collapseOne2"
                        aria-expanded="true"
                        aria-controls="collapseOne2">
                            1. Mengenai Program Terangi Beribu Masjid
                        </a>
                        
                    </div>

                    <div id="collapseOne2" class="collapse show" data-parent="#accordion2">
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>❓ Apa itu Program Terangi Beribu Masjid?</strong>
                                <p class="mb-0 text-muted">
                                    Program ini adalah program yayasan yang bertujuan untuk memeberikan tunjangan
                                    pembelian token listrik kepada Masjid atau Mushola di berbagai tempat di seluruh
                                    Indonesia.
                                </p>
                            </div>
                            <div class="mb-3">
                                <strong>❓ Bagaimana Caranya Agar Saya bisa Masuk Program Tersebut?</strong>
                                <p class="mb-0 text-muted">
                                    Anda cukup registrasi mesjid yang anda kelola di bagian Registrasi masjid.
                                </p>
                            </div>
                            <div class="mb-3">
                                <strong>❓ Apakah Ini program dari Pemerintah?</strong>
                                <p class="mb-0 text-muted">
                                    <b>Bukan,</b> program ini adalah murni inisiasi oleh pribadi yang membuat lembaga
                                    untuk memberikan bantuan Listrik kepada masjid.
                                </p>
                            </div>
                            <div class="mb-3">
                                <strong>❓ Dari mana sumber pendanaan program ini? Apakah Hallal?</strong>
                                <p class="mb-0 text-muted">
                                    InsyaAllah Hallal, sumber dana berasal dari beberapa badan usaha yang saat ini
                                    berada didalam naungan yayasan ini.
                                </p>
                            </div>
                            <div class="mb-3">
                                <strong>❓ Selain biaya sendiri, apakah ada juga sumber dana dari yang lain?</strong>
                                <p class="mb-0 text-muted">
                                    Alhamdulillah sejauh ini ada orang-orang sholeh yang ikut berpartisipasi dalam
                                    menitipkan donasi ke kami, untuk di salurkan menjadi listrik kepada masjid.
                                </p>
                            </div>
                            <div class="mb-3">
                                <strong>❓ Kalau begitu apakah saya juga bisa ikut menitipkan donasi?</strong>
                                <p class="mb-0 text-muted">
                                    Tentu saja anda bisa menitipkan donasi disini, InsyaAllah kami Amanah, seluruh dana
                                    akan disalurkan kepada masjid-masjid yang membutuhkan tunjangan listrik.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-1 border-0 rounded-0">
                    <div class="card-header  rounded-0 py-2" id="headingTwo2">
                        <a href="" class=" accordion-link text-white collapsed" data-toggle="collapse"
                            data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                            2. Segala Hal Tentang Registrasi
                        </a>
                    </div>
                    <div id="collapseTwo2" class="collapse" data-parent="#accordion2">
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>❓ Bagaimana cara registrasi?</strong>
                                <p class="mb-0 text-muted">
                                    Silakan masuk di halaman "Home" lalu geser layar sedikit ke bawah maka anda akan
                                    menemukan menu "Daftarkan Masjid/Mushola Anda" lalu klik Ikon hijau bergambar
                                    pensil.
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong>❓ Apakah layanan ini gratis?</strong>
                                <p class="mb-0 text-muted">
                                    Ya, layanan ini tidak dikenakan biaya apapun, justru Layanan ini yang memberikan
                                    tunjangan berupa pulsa token listrik untuk masjid atau mushola di tempat anda.
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong>❓ Setelah registrasi lalu harus seperti apa?</strong>
                                <p class="mb-0 text-muted">
                                    Setelah anda melakukan registrasi maka anda tinggal menunggu permintaan anda apakah
                                    masjid anda layak mendapat tunjangan atau tidak?.
                                </p>
                            </div>
                            <div class="mb-3">
                                <strong>❓ Darimana saya tahu kalau permintaan registrasi masjid saya sudah di approve
                                    atau tidak?</strong>
                                <p class="mb-0 text-muted">
                                    Anda bisa masuk ke halaman pertama "Home" lalu sedikit scroll ke bawah dan ada "Data
                                    Status Masjid/mushola" lalu klik icon hijau bergambar tiga garis putih, disitu anda
                                    bisa mncari nama masjid anda dan statusnya apakah sudah "terverifikasi" atau masih
                                    "menunggu" .
                                </p>
                            </div>
                            <div class="mb-3">
                                <strong>❓ Saya sudah lama melakukan registrasi, tapi tidak kunjung di verifikasi,
                                    kenapa?</strong>
                                <p class="mb-0 text-muted">
                                    Dikarenakan banyaknya permintaan, mungkin kami sedikit melakukan penyaringan lagi,
                                    jika memang masjid anda lolos penyaringan, maka akan ada pesan ke nomor yang
                                    mendaftarkan masjid, begitu juga jika permintaan ditolak, maka akan ada pesan ke
                                    nomor Whatsapp anda.Untuk saat ini mungkin hanya bisa bersabar menunggu hasilnya.

                                </p>
                            </div>
                            <div class="mb-3">
                                <strong>❓ berapa lama saya harus menunggu keputusan?</strong>
                                <p class="mb-0 text-muted">
                                    Sekitar 10 hari kerja paling lama, dan 1 hari kerja paling cepat.

                                </p>
                            </div>
                            <div class="mb-3">
                                <strong>❓ Masjid saya sudah terverifikasi lalu apa lagi?</strong>
                                <p class="mb-0 text-muted">
                                    Jika Masjid anda sudah terverifikasi, maka anda akan mendapatkan pesan Whatsapp yang
                                    memberitahukan nama "username" nya dan "password", maka anda bisa login sebagai user
                                    ke aplikasi kami.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-1 border-0 rounded-0">
                    <div class="card-header rounded-0 py-2" id="headingThree2">
                        <a href="" class=" accordion-link text-white collapsed" data-toggle="collapse"
                            data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                            3. Segala Hal mengenai Login
                        </a>
                    </div>
                    <div id="collapseThree2" class="collapse" data-parent="#accordion2">
                        <div class="card-body ">
                            <div class="mb-3">
                                <strong>❓ Registrasi masjid saya sudah di Approve jadi harus gimana lagi?</strong>
                                <p class="mb-0 text-muted">
                                    Jika masjid anda sudah ter verifikasi, maka sekarang anda bisa mengajukan permintaan
                                    token listrik.

                                </p>
                            </div>
                            <div class="mb-3">
                                <strong>❓ Jadi saya harus login dulu untuk bisa melakukan permintaan token
                                    listrik?</strong>
                                <p class="mb-0 text-muted">
                                    Ya, anda harus melakukan login terlebih dahulu barulah fitur untuk melakukan
                                    permintaan token akan terbuka dan bisa di akses oleh anda.

                                </p>
                            </div>
                            <div class="mb-3">
                                <strong>❓ Apakah saya bisa login di dua device yang berbeda?</strong>
                                <p class="mb-0 text-muted">
                                    Ya, anda bisa login di HandPhone sekaligus juga bisa login di Web Desktop(Komputer)
                                    dengan user ID yang sama.

                                </p>
                            </div>
                           


                            <div class="mb-3">
                                <strong>❓ Apakah aplikasi bisa diakses di semua perangkat?</strong>
                                <p class="mb-0 text-muted">
                                    Ya. Layanan dapat diakses melalui smartphone, tablet, maupun komputer
                                    selama terhubung ke internet.
                                </p>
                            </div>

                           
                        </div>
                    </div>
                </div>

<div class="card mb-1 border-0 rounded-0">
                    <div class="card-header rounded-0 py-2" id="headingThree3">
                        <a href="" class=" accordion-link text-white collapsed" data-toggle="collapse"
                            data-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                            4. Segala Hal mengenai Request Token Listrik
                        </a>
                    </div>
                    <div id="collapseThree3" class="collapse" data-parent="#accordion2">
                        <div class="card-body ">
                            
                            <div class="mb-3">
                                <strong>❓ Jadi saya harus login dulu untuk bisa melakukan permintaan token
                                    listrik?</strong>
                                <p class="mb-0 text-muted">
                                    Ya, anda harus melakukan login terlebih dahulu barulah fitur untuk melakukan
                                    permintaan token akan terbuka dan bisa di akses oleh anda.

                                </p>
                            </div>
                           
                            <div class="mb-3">
                                <strong>❓ Bagaimana caranya melakukan permintaan token listrik?</strong>
                                <p class="mb-0 text-muted">
                                    Setelah anda Login, Anda bisa melihat icon di bawah bergambar kilat/petir listrik
                                    bernama"Request" anda bisa melakukan permintaan token listrik disini, dan prosesnya
                                    sangatlah mudah tinggal diikuti saja step by step nya, paling hanya dua atau tiga
                                    kali klik selesai.
                                </p>
                            </div>

                           
                           

                            <div class="mb-3">
                                <strong>❓ Saya mengalami kendala teknis, apa yang harus dilakukan?</strong>
                                <p class="mb-0 text-muted">
                                    Pastikan koneksi internet stabil, muat ulang halaman,
                                    atau hubungi admin melalui <b>Live Chat</b>.
                                </p>
                            </div>

                            <div class="mt-4 p-3 bg-light rounded text-center">
                                <small class="text-muted">
                                    Masih punya pertanyaan? Silakan hubungi kami melalui <b>Live Chat</b> atau menu
                                    <b>Bantuan</b>.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>




            </div>








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
                            <p>Frequently Asked Question</p>
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
