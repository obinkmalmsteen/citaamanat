<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Masjid </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f5f7fb;
            font-family: "Poppins", sans-serif;
            color: #333;
            font-size: 0.8rem;
            /* 🔹 perkecil seluruh teks jadi ~70% */
        }

        h2 {
            color: #1a237e;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .table-container {
            background: #f5f7fb;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
            padding: 20px;
            margin-top: 150px;
        }

        .table-modern {
            border-collapse: separate;
            border-spacing: 0 8px;
            width: 100%;
            font-size: 0.7rem;
            /* 🔹 teks tabel juga kecil */
        }

        .table-modern thead th {
            font-weight: 600;
            color: #6c757d;
            border: none;
            background: transparent;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            padding: 8px 10px;
        }

        .table-modern tbody tr {
            background: #fff;
            border-radius: 10px;
            transition: all 0.2s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .table-modern tbody tr:hover {
            background-color: #f1f5ff;
            transform: translateY(-2px);
        }

        .table-modern td,
        .table-modern th {
            vertical-align: middle;
            padding: 8px 10px;
        }

        .table-modern td:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .table-modern td:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        /* 🌈 BADGE CUSTOM COLORS - scaled smaller */
        .badge-status {
            font-size: 0.6rem;
            padding: 4px 8px;
            border-radius: 12px;
            color: white;
            font-weight: 500;
            letter-spacing: 0.3px;
            display: inline-flex;
            align-items: center;
            gap: 3px;
        }

        .badge-verified {
            background: linear-gradient(135deg, #28a745, #4cd964);
        }

        .badge-pending {
            background: linear-gradient(135deg, #ffc107, #ffce3a);
            color: #3a2e00;
        }

        .badge-rejected {
            background: linear-gradient(135deg, #e53935, #ff6b6b);
        }

        .badge-review {
            background: linear-gradient(135deg, #007bff, #00b4d8);
        }

        .badge-custom-purple {
            background: linear-gradient(135deg, #8e2de2, #4a00e0);
        }

        .badge-custom-orange {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
        }

        small.text-muted {
            font-size: 0.6rem;
        }

        .table-modern td.kota {
            text-transform: uppercase;
        }
    </style>
</head>

<body>

    <!-- Topbar start -->
    <div class="container-fluid fixed-top bg-white bg-opacity-100">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-3">

                <a href="{{ route('landingpage') }}" class="navbar-brand">

                    <h2 class="mb-0"> <span><img src="/mosque/img/logoyayasan.png" class="img-fluid flex-shrink-10"
                                alt="" width="100"> </span><span class="text-primary">Cita Amanat
                            Martadiredja</span> </h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav ms-lg-auto mx-xl-auto">
                        <a href="index.html" class="nav-item nav-link active">Beranda</a>
                        <a href="about.html" class="nav-item nav-link">Tentang Kami</a>
                        <a href="activity.html" class="nav-item nav-link">Aktifitas</a>
                        <a href="event.html" class="nav-item nav-link">Acara</a>
                        <a href="sermon.html" class="nav-item nav-link">Sermons</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0 rounded-0">
                                <a href="blog.html" class="dropdown-item">Latest Blog</a>
                                <a href="team.html" class="dropdown-item">Our Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    {{-- <a href="" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">Donate</a> --}}
                </div>
            </nav>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- content Start -->


    <div class="container ">
        <div class="table-container">

            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('landingpage') }}" class="btn btn-outline-dark"
                    style="border-radius: 8px; padding: 8px 20px;">
                    ⬅ Ke Beranda
                </a>

                <a href="" style="color: #d9534f; font-weight: bold;" class="btn">
                    Untuk Masjid Yang sudah terverifikasi tapi masih belum membuat pengajuan Token, segera lakukan
                    pengajuan token dengan login ke akun anda.
                </a>
            </div>

            <h3 class="mb-3">📋 Daftar Masjid </h3>

            <form method="GET" class="mb-3 d-flex" style="gap:10px;">
                <select name="filter_pengajuan" class="form-select" onchange="this.form.submit()">

                    <option value="">Semua</option>
                    <option value="0" {{ request('filter_pengajuan') == '0' ? 'selected' : '' }}>Belum Pernah (0)
                    </option>
                    <option value="1" {{ request('filter_pengajuan') == '1' ? 'selected' : '' }}>Sudah Pernah (≥1)
                    </option>
                </select>


            </form>



          <table class="table-modern">
    <colgroup>
        <col style="width: 5%">
        <col style="width: 40%">
        <col style="width: 30%">
        <col style="width: 25%">
       
    </colgroup>

    <thead>
        <tr>
            <th>No</th>
            <th>Foto Masjid</th>
            <th>Nama Masjid</th>
            <th>Kota</th>
           
           
        </tr>
    </thead>

                <tbody>
                    @foreach ($masjid as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <div class="d-flex mb-3">
                                    <div class="position-relative">
                                        <img src="{{ asset('storage/foto_masjid/' . $item->foto_masjid) }}"
                                            alt="Foto Masjid" height="120" width="220"
                                            class="rounded shadow w-100 object-fit-cover">

                                    </div>
                                </div>
                            </td>
                            <td class="kota"><strong>{{ $item->nama_masjid }}</strong><br>
                                <small class="text-muted">
                                    ID: {{ substr($item->id_pelanggan, 0, -3) . 'xxx' }}
                                </small><br>
                                <small class="text-muted">
                                    {{ $item->created_at }}
                                </small><br>@if ($item->disetujui == 1)
                                    <span class="badge-status badge-verified"><i class="bi bi-check-circle"></i>
                                        Terverifikasi</span>
                                @elseif ($item->disetujui == 0)
                                    <span class="badge-status badge-pending"><i class="bi bi-hourglass-split"></i>
                                        Menunggu</span>
                                @elseif ($item->disetujui == 2)
                                    <span class="badge-status badge-rejected"><i class="bi bi-x-circle"></i>
                                        Ditolak</span>
                                @else
                                    <span class="badge-status badge-custom-purple"><i class="bi bi-question-circle"></i>
                                        Tidak Diketahui</span>
                                @endif <br><strong>{{ $item->total_pengajuan }} Kali</strong>
                            </td>

                            <td><strong>{{ $item->nama_kota }}</strong><br>
                                <small class="text-muted">{{ $item->alamat_lengkap }}</small>
                            </td>

                           
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- content End -->

</body>

</html>
