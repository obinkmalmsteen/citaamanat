@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-3">Data Barang</h3>

        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>

        @if($cabang_id)
    <h5 class="text-primary">Cabang Aktif: {{ $cabang_id }}</h5>
@endif

        {{-- TAB NAV --}}
@php
$iconMap = [
    'PSF' => ['icon' => 'bi-shield-check', 'color' => 'text-danger'],
    'PKB' => ['icon' => 'bi-bucket-fill', 'color' => 'text-success'],
    'ITD' => ['icon' => 'bi-pc-display', 'color' => 'text-primary'],
    'ATK' => ['icon' => 'bi-pencil-square', 'color' => 'text-warning'],
    'PPF' => ['icon' => 'bi-archive-fill', 'color' => 'text-info'],
    'ILP' => ['icon' => 'bi-lightbulb', 'color' => 'text-warning'],
    'IAS' => ['icon' => 'bi-droplet', 'color' => 'text-primary'],
    'IGE' => ['icon' => 'bi-fire', 'color' => 'text-danger'],
    'PPS' => ['icon' => 'bi-basket', 'color' => 'text-success'],

    // dua kategori masak
    'PMK' => ['icon' => 'bi-egg-fried', 'color' => 'text-orange'],
    'PMB' => ['icon' => 'bi-box-seam', 'color' => 'text-dark'],
];
@endphp


<ul class="nav nav-tabs mb-3">
    @foreach($jenis as $j)
        @php
            $kode = $j->kode_jenis;
            $icon = $iconMap[$kode]['icon'] ?? 'bi-tag';
            $color = $iconMap[$kode]['color'] ?? 'text-muted';
        @endphp

        <li class="nav-item">
            <a class="nav-link {{ $loop->first ? 'active' : '' }}" 
               data-bs-toggle="tab" 
               href="#jenis{{ $j->id }}">
               
               <i class="bi {{ $icon }} {{ $color }} me-1"></i>
               {{ $j->nama_jenis }}
            </a>
        </li>
    @endforeach
</ul>





        {{-- TAB CONTENT --}}
        <div class="tab-content">
            @foreach ($jenis as $j)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="jenis{{ $j->id }}">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Nama Barang</th>
                                {{-- <th>Jenis</th> --}}
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Keterangan</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($j->barang as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    {{-- <td>{{ $item->jenis->nama_jenis ?? '-' }}</td> --}}
                                    <td>{{ $item->stok }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>{{ number_format($item->harga) }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('barang.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Hapus barang ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Tidak ada data</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
    /* warna tab NON AKTIF */
    .nav-tabs .nav-link {
        background-color: #f1f1f1;     /* abu muda */
        color: #393939;                   /* abu gelap */
        border-radius: 6px 6px 0 0;
        margin-right: 4px;
        font-weight: 500;
    }

    /* warna tab AKTIF */
    .nav-tabs .nav-link.active {
        background-color: #f7e80f !important;     /* biru bootstrap */
        color: #000000 !important;
        border-color: #0d6efd #0d6efd transparent;
        font-weight: 600;
    }

    /* hover */
    .nav-tabs .nav-link:hover {
        background-color: #fbf8cd;
        color: #000;
    }
</style>
