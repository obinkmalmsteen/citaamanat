<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size:12px; }
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #ccc; padding:6px; }
        th { background:#f5f5f5; }
    </style>
</head>
<body>
    <h3>List Semua Item Pengadaan</h3>
    <table>
        <thead>
            <tr>
                <th>Req ID</th><th>Kode</th><th>Cabang</th><th>User</th><th>Nama Barang</th><th>Qty</th><th>Harga</th><th>Total</th>
            </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->pengadaan_request_id }}</td>
                <td>{{ $item->request->kode ?? '' }}</td>
                <td>{{ $item->request->cabang->nama_cabang ?? '' }}</td>
                <td>{{ $item->request->user->name ?? '' }}</td>
                <td>{{ $item->barang->nama_barang ?? '' }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ number_format($item->harga,0,',','.') }}</td>
                <td>{{ number_format($item->qty * $item->harga,0,',','.') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
