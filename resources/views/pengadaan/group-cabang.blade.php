@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Rekap Pengadaan per Cabang</h3>
    <table class="table">
        <thead><tr><th>Cabang</th><th>Total Nilai</th></tr></thead>
        <tbody>
        @foreach($results as $r)
            <tr>
                <td>{{ $r->nama_cabang }}</td>
                <td class="text-end">Rp {{ number_format($r->total_nilai,0,',','.') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
