<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use App\Models\Donatur;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\DonasiHistori;

class ListDonaturController extends Controller
{
     public function listdonatur(Request $request)
{
    $data = [
        'title' => 'Data Donatur',
        'menuAdminDonatur' => 'active',
    ];
    $datakeluar = Pengeluaran::latest()->paginate(10);
  // Ambil testimoni terbaru
    $listmasjid = Masjid::where('disetujui', 1)->take(150)->get();
      $donaturTetap = Donatur::where('donatur_tetap', 1)
    ->limit(5)
    ->get();
    // Counter GLOBAL (tidak terpengaruh filter)
     // Total nilai donatur
    $totalDonasi = DonasiHistori::sum('nominal_donasi');
    $totalDonaturTetap = Donatur::where('donatur_tetap', 1)->count();
    $totalDonaturTidakTetap = Donatur::where('donatur_tetap', 0)->count();
    $totalSemuaDonasi = DonasiHistori::sum('nominal_donasi');

    $totalSemuaPengeluaran = Pengeluaran::sum('jumlah');

    // Hitung sisa saldo
    $sisaSaldo = $totalDonasi - $totalSemuaPengeluaran;
    $data = Pengeluaran::latest()->paginate(10);
    $query = Pengeluaran::query();

if (request('bulan')) {
    $query->whereMonth('tanggal', substr(request('bulan'), 5, 2))
          ->whereYear('tanggal', substr(request('bulan'), 0, 4));
}

if (request('kategori')) {
    $query->where('kategori', request('kategori'));
}

$datakeluar = $query->latest()->paginate(12)->withQueryString();

$kategoriList = Pengeluaran::select('kategori')->distinct()->pluck('kategori');


$tahun = request('tahun', now()->year);

// Siapkan array 12 bulan default 0
$pemasukanBulanan = array_fill(1, 12, 0);
$pengeluaranBulanan = array_fill(1, 12, 0);

// Query pemasukan
$pemasukan = DonasiHistori::selectRaw('MONTH(created_at) bulan, SUM(nominal_donasi) total')
    ->whereYear('created_at', now()->year)
    ->groupBy('bulan')
    ->get();

foreach ($pemasukan as $row) {
    $pemasukanBulanan[$row->bulan] = $row->total;
}

// Query pengeluaran
$pengeluaran = Pengeluaran::selectRaw('MONTH(tanggal) bulan, SUM(jumlah) total')
    ->whereYear('tanggal', now()->year)
    ->groupBy('bulan')
    ->get();

foreach ($pengeluaran as $row) {
    $pengeluaranBulanan[$row->bulan] = $row->total;
}




    // Query utama (pakai filter)
    $donaturs = Donatur::with('donasi')
        ->when(request()->filled('donatur_tetap'), function ($query) {
            $query->where('donatur_tetap', request('donatur_tetap'));
        })
        ->latest()
        ->paginate(10)
        ->withQueryString(); // penting agar filter tidak hilang saat pagination

    return view(
        'listdonatur',
        $data,
        compact(
            'datakeluar',
            'donaturs',
            'totalSemuaDonasi',
            'totalDonaturTetap',
            'totalDonaturTidakTetap',
            'listmasjid',
            'donaturTetap',
            'totalDonasi',
            'totalSemuaPengeluaran',
            'sisaSaldo',
            'kategoriList',
            'pemasukanBulanan',
            'pengeluaranBulanan',
            'tahun'
        )
    );

    

   
}



}
