<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $b)
        <tr>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->stok }}</td>
            <td>{{ $b->satuan }}</td>
            <td>{{ number_format($b->harga) }}</td>
            <td>{{ $b->keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@if(count($data) == 0)
    <div class="text-center py-4 text-muted">
        <i>Tidak ada data.</i>
    </div>
@endif
