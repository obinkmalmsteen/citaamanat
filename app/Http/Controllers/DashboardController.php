<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total user
        $totalUser = DB::table('users')->count();

        // Hitung total masjid yang sudah disetujui
        $masjidDisetujui = DB::table('masjids')
            ->where('disetujui', 1)
            ->count();

        // Hitung total masjid yang belum disetujui
        $masjidBelumDisetujui = DB::table('masjids')
            ->where('disetujui', '!=', 1)
            ->count();

        // Hitung total request token keseluruhan
        $requestTokenKeseluruhan = DB::table('histori_bayar')
            ->whereNotNull('tgl_request_token')
            ->count();

            // Hitung total request token keseluruhan
        $biayaRequestTokenKeseluruhan = DB::table('histori_bayar')
            ->whereNotNull('tgl_request_token')
            ->sum('jumlah_request_token');
              // Hitung total request token yang belum direalisasikan
        $requestTokenBelumRealisasi = DB::table('histori_bayar')
            ->whereNull('tgl_realisasi_token')
            ->count();
             // Hitung total jumlah token (nilai) yang belum terealisasi
        $biayaTokenBelumRealisasi = DB::table('histori_bayar')
            ->whereNull('tgl_realisasi_token')
            ->sum('jumlah_request_token');

        // Hitung total request token yang sudah terealisasi
        $totalRequestRealisasi = DB::table('histori_bayar')
            ->whereNotNull('tgl_realisasi_token')
            ->count();

        // Hitung total jumlah token (nilai) yang sudah terealisasi
        $totalTokenRealisasi = DB::table('histori_bayar')
            ->whereNotNull('tgl_realisasi_token')
            ->sum('jumlah_realisasi_token');

        $totalBiayaBelumDibayarkan = $requestTokenKeseluruhan - $totalTokenRealisasi;

        // Kirim semua data ke view
        $data = [
            "title" => "Dashboard",
            "menuDashboard" => "active",
            "totalUser" => $totalUser,
            "masjidDisetujui" => $masjidDisetujui,
            "masjidBelumDisetujui" => $masjidBelumDisetujui,
            "requestTokenKeseluruhan" => $requestTokenKeseluruhan,
            "biayaRequestTokenKeseluruhan" => $biayaRequestTokenKeseluruhan,
            "requestTokenBelumRealisasi" => $requestTokenBelumRealisasi,
            "totalRequestRealisasi" => $totalRequestRealisasi,
            "totalTokenRealisasi" => $totalTokenRealisasi,
            "biayaTokenBelumRealisasi" => $biayaTokenBelumRealisasi,
            
            "totalBiayaBelumDibayarkan" => $totalBiayaBelumDibayarkan
            
        ];

        return view('dashboard', $data);
    }
}
