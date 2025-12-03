<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $pengadaan->kode }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; color:#333; }
        .header { text-align: center; margin-bottom: 20px; }
        .title { font-size: 22px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border:1px solid #888; padding:6px; }
        th { background: #f2f2f2; }
        .text-right { text-align: right; }
        .summary { margin-top: 20px; width: 40%; float: right; }
        .summary td { border: none; padding: 4px 0; }
        .logo { width: 80px; margin-bottom: 10px; }
    </style>
</head>
<body>

<table width="100%" style="margin-bottom:25px;">
    <tr>

        {{-- KIRI --}}
        <td style="width:50%; vertical-align: top;">
            <h3 style="margin:0; font-size:17px; font-weight:700;">
                REQUEST PENGADAAN
            </h3>
            <p style="margin:3px 0 0; font-size:14px;">
                Kode: {{ $pengadaan->kode }}
            </p>
            <p style="margin:3px 0 0; font-size:14px;">
                Tanggal: {{ $pengadaan->created_at->format('d M Y') }}
            </p>
        </td>

        {{-- KANAN --}}
        <td style="width:50%; text-align:right; vertical-align:top;">

            <div style="display:inline-block; text-align:right;">
                <img src="{{ base_path('public/mosque/img/logoyayasan.png') }}" style="height:50px; display:block; margin-left:auto;">

                     

                <div style="font-size:14px; font-weight:700; margin-top:5px;">
                    Cita Amanat Martadiredja
                </div>
            </div>

        </td>

    </tr>
</table>



<h4>Informasi Pemohon</h4>
<table width="100%" style="border-collapse: collapse; margin-bottom:20px; font-size:14px;">
    <tr>
        <td><strong>Pemohon</strong></td>
        <td><strong>Cabang</strong></td>
        <td><strong>Divisi</strong></td>
        <td><strong>Catatan</strong></td>
        <td><strong>Status</strong></td>
    </tr>
    <tr>
        <td>{{ $pengadaan->user->nama ?? '-' }}</td>
        <td>{{ $pengadaan->cabang->nama_cabang ?? '-' }}</td>

        <td>{{ $pengadaan->divisi ?? '-' }}</td>
        <td>{{ $pengadaan->note ?? '-' }}</td>
        <td>{{ ucfirst(str_replace('_',' ', $pengadaan->status)) }}</td>
    </tr>
</table>


<h4>Daftar Item</h4>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengadaan->items as $i => $item)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ $item->qty }}</td>
            <td class="text-right">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
            <td class="text-right">Rp {{ number_format($item->qty * $item->harga, 0, ',', '.') }}</td>
            <td>{{ $item->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="height:25px;"></div>
{{-- RINGKASAN --}}
<table >
    <tr>
        <td><strong>Total Request:</strong></td>
        <td class="text-right">Rp {{ number_format($totalRequest, 0, ',', '.') }}</td>
    </tr>
    <tr>
        <td><strong>Total Disetujui:</strong></td>
        <td class="text-right">Rp {{ number_format($totalApproved, 0, ',', '.') }}</td>
    </tr>
</table>


<div style="height:75px;"></div>
<table width="100%" style="margin-top:20px; font-size:14px;">
    <tr>
        <td style="width:40%; vertical-align:top;">
            <strong>Diperiksa oleh:</strong><br>

            @if($pengadaan->approved_by)
                {{ $pengadaan->approvedUser->nama ?? 'User ID: '.$pengadaan->approved_by }}
            @else
                <em>Belum disetujui</em>
            @endif
        </td>

        <td style="width:30%; vertical-align:top;">
            <strong>Tanggal:</strong><br>
            @if($pengadaan->approved_at)
                {{ \Carbon\Carbon::parse($pengadaan->approved_at)->format('d M Y H:i') }}
            @else
                <em>-</em>
            @endif
        </td>

        <td style="width:30%; vertical-align:top;">
            <strong>Catatan:</strong><br>
            @if($pengadaan->approval_note)
                {{ $pengadaan->approval_note }}
            @else
                <em>-</em>
            @endif
        </td>
    </tr>
</table>


</body>
</html>
