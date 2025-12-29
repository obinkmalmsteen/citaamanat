<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Cita Amanat martadiredja</title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="mobile/vendor/materializeicon/material-icons.css">

    <!-- Roboto fonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="mobile/vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link href="mobile/vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Chosen multiselect CSS -->
    <link href="mobile/vendor/chosen_v1.8.7/chosen.min.css" rel="stylesheet">

    <!-- nouislider CSS -->
    <link href="mobile/vendor/nouislider/nouislider.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="mobile/css/style.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
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
    <div class="sidebar">
        <div class="text-center">
            <div class="figure-menu shadow">
                <figure><img src="mobile/img/useeer.png" alt=""></figure>
            </div>
            <h5 class="mb-1 ">
                @auth
                    <span class="user-name-title text-white">
                        {{ Auth::user()->masjid->nama_ketua_dkm ?? Auth::user()->nama }}
                    </span>

                @endauth
            </h5>
            <br>
            <p class="mb-1 ">
                @auth
                    <span class="user-name-title text-white">Ketua DKM :
                        {{ Auth::user()->masjid->nama_masjid ?? Auth::user()->nama }}
                    </span>

                @endauth
            </p>
            <br>
            <p class="mb-1 ">
                @auth
                    <span class="user-name-title text-white">
                        {{ Auth::user()->masjid->regency->name ?? '' }}
                    </span>

                @endauth
            </p>
            @auth
                <span class="user-name-title">

                    <p class="text-light">
                        {{ Auth::user()->masjid->province->name ?? '' }}
                    </p>
                </span>
            @endauth

        </div>
        <br>
        <div class="row mx-0">
            <div class="col">

                <h5 class="subtitle text-uppercase"><span>Menu</span></h5>
                <div class="list-group main-menu">
                    @auth <a href="index.html" class="list-group-item list-group-item-action active">Total Pengajuan
                        Token :{{ Auth::user()->masjid->total_pengajuan ?? Auth::user()->nama }} Kali</a>@endauth
                    <a href="notification.html" class="list-group-item list-group-item-action">Notification <span
                            class="badge badge-dark text-white">2</span></a>
                    <a href="all-products.html" class="list-group-item list-group-item-action">All Products</a>
                    <a href="my-order.html" class="list-group-item list-group-item-action">My Order</a>
                    <a href="profile.html" class="list-group-item list-group-item-action">My Profile</a>
                    <a href="controls.html" class="list-group-item list-group-item-action">Pages Controls <span
                            class="badge badge-light ml-2">Check</span></a>
                    <a href="setting.html" class="list-group-item list-group-item-action">Settings</a>
                    <a href="{{ route('mobile.logout') }}"
                        class="list-group-item list-group-item-action mt-4">Logout</a>
                </div>
            </div>
        </div>

    </div>
    <div class="wrapper">
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <button class="btn  btn-link text-white menu-btn"><img src="mobile/img/linkmenu.png"
                            alt=""><span class="new-notification"></span></button>
                </div>
                <div class="col text-center">
                         <h6 class=" mt-3 text-white">Cita Amanat Martadiredja</h6>
                </div>
                <div class="col-auto">
                    <a href="profile.html" class="btn  btn-link text-white"><i
                            class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>

        <!-- MOBILE HEADER (hanya tampil di HP) -->
        <!-- MOBILE HEADER (Background image + text di dalam gambar) -->
        <div class="mobile-header text-white d-block d-md-none">
            <div class="content-wrapper">
                <h5 class="text-uppercase mb-2">Yayasan</h5>
                <h5 class="text-uppercase mb-2">Cita Amanat Martadiredja</h5>

            </div>
        </div>


<div class="container">
  {{-- row 1 start --}}

            <div class="subtitle h6 mb-3">
                <div class="d-inline-block">
                    Program Utama Kami:<br>
                   
                </div>
            </div>
<nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link text-left active" id="nav-delivery-tab" data-toggle="tab" href="#nav-delivery" role="tab" aria-controls="nav-delivery" aria-selected="true">
                        <div class="row">
                            <div class="col-auto align-self-center pr-1">
                                <span class="btn btn-success button-rounded-26">
                                    <i class="material-icons md-18 text-mute">card_giftcard</i>
                                </span>
                            </div>
                            <div class="col pl-2">
                                <p class="text-secondary mb-0 small text-truncate">Today's Delivery</p>
                                <h6 class="text-dark my-0">4</h6>
                            </div>
                        </div>
                    </a>
                    <a class="nav-item nav-link text-left" id="nav-booking-tab" data-toggle="tab" href="#nav-booking" role="tab" aria-controls="nav-booking" aria-selected="false">
                        <div class="row">
                            <div class="col-auto align-self-center pr-1">
                                <span class="btn btn-warning button-rounded-26">
                                    <i class="material-icons md-18 text-mute">payment</i>
                                </span>
                            </div>
                            <div class="col pl-2">
                                <p class="text-secondary mb-0 small text-truncate">Future Bookings</p>
                                <h6 class="text-dark my-0">25</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-delivery" role="tabpanel" aria-labelledby="nav-delivery-tab">
                    <ul class="list-items">
                        <li>
                            <div class="row">
                                <div class="col">King Sofa 1kg at $ 152.00</div>
                                <div class="col-auto"><a href="">Track</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col">King Sofa 1kg at $ 152.00</div>
                                <div class="col-auto"><a href="">Track</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col">King Sofa 1kg at $ 152.00</div>
                                <div class="col-auto"><a href="">Track</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col">King Sofa 1kg at $ 152.00</div>
                                <div class="col-auto"><a href="">Track</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="nav-booking" role="tabpanel" aria-labelledby="nav-booking-tab">
                    <ul class="list-items">
                        <li>
                            <div class="row">
                                <div class="col">King Sofa 1kg at $ 152.00</div>
                                <div class="col-auto"><a href="">Track</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col">King Sofa 1kg at $ 152.00</div>
                                <div class="col-auto"><a href="">Track</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col">King Sofa 1kg at $ 152.00</div>
                                <div class="col-auto"><a href="">Track</a></div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col">King Sofa 1kg at $ 152.00</div>
                                <div class="col-auto"><a href="">Track</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>




</div>
         

<div class="footer">
        <nav class="navi">

            <a href="{{ route('mobilelandingpage') }}" class="navi__link ">
                <i class="material-icons navi__icon">dashboard</i>
                <span class="navi__text">Home</span>
            </a>

            <a href="{{ route('mobileaktifitas') }}" class="navi__link">
                <i class="material-icons navi__icon">sports_kabaddi</i>
                <span class="navi__text">Aktifitas</span>
            </a>

            <a href="{{ route('mobilelistmasjid') }}" class="navi__link">
                <i class="material-icons navi__icon">mosque</i>
                <span class="navi__text">List</span>
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

    <!-- nouislider js -->
    <script src="mobile/vendor/nouislider/nouislider.min.js"></script>

    <!-- chart js -->
    <script src="mobile/vendor/chartjs/Chart.min.js"></script>
    <script src="mobile/vendor/chartjs/utils.js"></script>

    <!-- chosen multiselect js -->
    <script src="mobile/vendor/chosen_v1.8.7/chosen.jquery.min.js"></script>

    <!-- template custom js -->
    <script src="mobile/js/main.js"></script>

    <!-- page level script -->
    <script>
        $(window).on('load', function() {
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

            /* range picker for filter */
            var html5Slider = document.getElementById('rangeslider');
            noUiSlider.create(html5Slider, {
                start: [0, 100],
                connect: true,
                range: {
                    'min': 0,
                    'max': 500
                }
            });

            var inputNumber = document.getElementById('input-number');
            var select = document.getElementById('input-select');

            html5Slider.noUiSlider.on('update', function(values, handle) {
                var value = values[handle];

                if (handle) {
                    inputNumber.value = value;
                } else {
                    select.value = Math.round(value);
                }
            });
            select.addEventListener('change', function() {
                html5Slider.noUiSlider.set([this.value, null]);
            });
            inputNumber.addEventListener('change', function() {
                html5Slider.noUiSlider.set([null, this.value]);
            });

            /* chosen select*/
            $(".chosen").chosen();
        });

        /* chart js */
        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
            'November', 'December'
        ];
        var config = {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: '#805433',
                    borderColor: '#FFC400',
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                title: {
                    display: false,
                    text: 'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = new Chart(ctx, config);
        };
    </script>
    <script>
        function toggleExpand(card) {
            const text = card.querySelector('.collapsible-text');
            const icon = card.querySelector('.expand-icon');

            text.classList.toggle('expanded');

            // toggle icon rotate
            icon.classList.toggle('expanded-icon');
        }
    </script>


</body>

</html>
