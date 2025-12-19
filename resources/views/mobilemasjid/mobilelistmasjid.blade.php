<!doctype html>
<html lang="en" class="green-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Products · GoFurniture</title>

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
</head>

<body>
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
   <div class="row no-gutters  vh-100 loader-screen">
        <div class="col align-self-center text-white text-center">
            <img src="mobile/img/logo_tamama_putih.png" width="100" height="100" alt="logo">
            <h1><span class="font-weight-light"></span> Cita Amanat Martadiredja </h1>
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
    <div class="wrapper">
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
        <div class="container">
<form method="GET" action="{{ route('mobilelistmasjid') }}" id="searchForm">
    <input
        type="text"
        name="search"
        id="searchInput"
        class="form-control form-control-lg my-3"
        placeholder="Cari nama masjid..."
        value="{{ request('search') }}"
        autocomplete="off"
    >
</form>





            <div class="subtitle h6">
                <div class="d-inline-block">
                    List Masjid<br>
                    <p class="small text-mute">Semua masjid dan status pendaftarannya</p>
                </div>
               
            </div>
            <div class="row">

<style>


    .card {
    position: relative;
}

.float-bottom-right {
    position: absolute;
    right: 12px;
    bottom: 12px;
}

.badge-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 12px;
    font-size: 12px;
    border-radius: 20px;
    color: #fff;
 
    font-weight: 500;
    box-shadow: 0 6px 18px rgba(0,0,0,.15);
}

.badge-verified {
    background-color: #0cd216;
}

.badge-pending {
    background-color: #ffc107;
    color: #212529;
}

.badge-rejected {
    background-color: #dc3545;
}

.badge-custom-purple {
    background-color: #6f42c1;
}

</style>

@foreach ($masjid as $item)
 <div class="col-12 col-lg-6">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col">
                                    {{-- <button class="btn btn-sm btn-link p-0 float-right"><i class="material-icons md-18">favorite_outline</i></button> --}}
                                    <a href="product-details.html" class="text-dark mb-1 h6 d-block">{{ $item->nama_masjid }}</a>
                                    <p class="text-secondary small mb-2">{{ $item->alamat_lengkap }}</p>
                                    <p class="text-success font-weight-normal mb-0">ID : {{ substr($item->id_pelanggan, 0, -3) . 'xxx' }}
                                       <a class="text-dark mb-1 h6 d-block"><strong>{{ $item->nama_kota }}</strong></a>
                                    </p>
                                    {{-- <p class="text-secondary small text-mute mb-0">1.0 kg</p> --}}
                                </div>
                                {{-- <div class="col-3 col-md-2 col-lg-2 align-self-center">
                                    <figure class="product-image"><img src="{{ asset('storage/foto_masjid/' . $item->foto_masjid) }}" alt="" class=""></figure> 
                                </div> --}}
                            </div>
                          

                           <div class="float-bottom-right">
    @if ($item->disetujui == 1)
        <span class="badge-status badge-verified">
             Terverifikasi
        </span>
    @elseif ($item->disetujui == 0)
        <span class="badge-status badge-pending">
        Menunggu
        </span>
    @elseif ($item->disetujui == 2)
        <span class="badge-status badge-rejected">
           Ditolak
        </span>
    @else
        <span class="badge-status badge-custom-purple">
            Tidak Diketahui
        </span>
    @endif
</div>

                        </div>
                    </div>
                </div>

@endforeach
</div>
            
        </div>
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
                            <a href="{{ route('mobilelistmasjid') }}" class="btn btn-link-default active">
                                <i class="material-icons">local_mall</i>
                            </a>
                        </div>
                          <div class="col-auto">
    @if(Auth::check())
        {{-- SUDAH LOGIN --}}
        <a href="{{ route('mobilerequesttoken') }}" class="btn btn-link-default">
            <i class="material-icons">favorite</i>
        </a>
    @else
        {{-- BELUM LOGIN --}}
        <a href="{{ route('mobile.login') }}" class="btn btn-link-default">
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
    </div>
    <div class="filter">
        <button class="btn btn-default filter-btn shadow"><i class="material-icons">filter_list</i></button>
        <div class="container filters-container">
            <div class="subtitle h6">
                <div class="d-inline-block">
                    Filter Criteria<br>
                    <p class="small text-mute">2154 products</p>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label class="form-control-lable">
                    Select Price Range
                </label>
                <br>
                <div id="rangeslider" class="mt-2"></div>
            </div>
            <div class="form-group float-label pt-0">
                <div class="row">
                    <div class="col">
                        <input type="number" min="0" max="500" value="100" step="1" id="input-select" class="form-control">
                    </div>
                    <div class="col-auto pt-2"> to </div>
                    <div class="col">
                        <input type="number" min="0" max="500" value="100" step="1" id="input-number" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group float-label active">
                <select class="form-control chosen" multiple>
                    <optgroup label="Sofa">
                        <option>King Sofa</option>
                        <option>Rajpuri</option>
                        <option>Sofa</option>
                    </optgroup>
                    <optgroup label="Chair">
                        <option>Office Chair</option>
                        <option>General</option>
                    </optgroup>
                    <optgroup label="Tables">
                        <option>General</option>
                        <option>Kitchen</option>
                        <option>Office</option>
                    </optgroup>
                </select>
                <label class="form-control-label">Select Fruite</label>
            </div>
            <div class="form-group float-label">
                <input type="text" class="form-control">
                <label class="form-control-label">Keyword</label>
            </div>

            <div class="form-group float-label active">
                <select class="form-control chosen">
                    <option>10% </option>
                    <option>30%</option>
                    <option>50%</option>
                    <option>80%</option>
                </select>
                <label class="form-control-label">Offer Discount</label>
            </div>

            <br>
            <button class="btn btn-light btn-rounded btn-block">Search</button>
            <br>

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
            $(".chosen").chosen()
        });

    </script>
    <script>
    let typingTimer;
    const typingDelay = 500; // ms (0.5 detik)

    const searchInput = document.getElementById('searchInput');
    const searchForm  = document.getElementById('searchForm');

    searchInput.addEventListener('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => {
            searchForm.submit();
        }, typingDelay);
    });

    searchInput.addEventListener('keydown', function () {
        clearTimeout(typingTimer);
    });
</script>

</body>

</html>
