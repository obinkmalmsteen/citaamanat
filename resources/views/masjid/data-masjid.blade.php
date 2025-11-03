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
            font-size: 0.8rem; /* 🔹 perkecil seluruh teks jadi ~70% */
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
            margin-top: 50px;
        }

        .table-modern {
            border-collapse: separate;
            border-spacing: 0 8px;
            width: 100%;
            font-size: 0.7rem; /* 🔹 teks tabel juga kecil */
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
<div class="mt-4 text-center">
    <a href="{{ route('welcome') }}" class="btn btn-outline-dark" style="border-radius: 8px; padding: 8px 20px;">
        ⬅ Kembali ke Halaman Utama
    </a>
</div>
    <div class="container">
        <div class="table-container">
            <h2 class="mb-3">📋 Daftar Masjid </h2>

            <table class="table-modern">
                <thead>
                    <tr>
                        <th>No</th>
                        
                        <th>Nama Masjid</th>
                        <th>Kota</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($masjid as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="kota"><strong>{{ $item->nama_masjid }}</strong><br>
                                <small class="text-muted">
                                    ID: {{ substr($item->id_pelanggan, 0, -3) . 'xxx' }}
                                </small><br>
                                <small class="text-muted">
                                     {{ $item->created_at }}
                                </small>
                            </td>
                            <td><strong>{{ $item->nama_kota }}</strong><br>
                                <small class="text-muted">{{ $item->alamat_lengkap }}</small>
                            </td>

                            <td>
                                @if ($item->disetujui == 1)
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
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
