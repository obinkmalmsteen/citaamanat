@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Daftar Request Perbaikan</h3>

    <a href="{{ route('request-perbaikan.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

   <table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode</th>
            <th>User</th>
            <th>Cabang</th>
            <th>Area</th>
            <th>Kerusakan</th>
            <th>Type</th>
            <th>Estimasi</th>
            <th>Foto 1</th>
            <th>Foto 2</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $r)
        <tr>
            <td>{{ $r->kode }}</td>
            <td>{{ $r->user->nama ?? '—' }}</td>
            <td>{{ $r->cabang->nama_cabang ?? '—' }}</td>
            <td>{{ $r->area_perbaikan }}</td>
            <td>{{ $r->jenis_kerusakan }}</td>
            <td>{{ $r->type_perbaikan }}</td>
            <td>Rp {{ number_format($r->estimasi_biaya, 0, ',', '.') }}</td>
 <td class="text-center">
                                @if ($r->foto1)
                                    <img src="{{ asset('public/storage/foto1/' . $r->foto1) }}"
                                        width="60">
                                @endif

                            </td>
                             <td class="text-center">
                                @if ($r->foto2)
                                    <img src="{{ asset('public/storage/foto2/' . $r->foto2) }}"
                                        width="60">
                                @endif

                            </td>
            <td>
                <a href="{{ route('request-perbaikan.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('request-perbaikan.destroy', $r->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
