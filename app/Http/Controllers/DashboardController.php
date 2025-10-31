<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Testimonial; // ✅ Tambahkan ini

class DashboardController extends Controller
{
    private function getDashboardData()
    {
        $totalUser = DB::table('users')->count();
        $masjidDisetujui = DB::table('masjids')->where('disetujui', 1)->count();
        $masjidBelumDisetujui = DB::table('masjids')->where('disetujui', '!=', 1)->count();
        $requestTokenKeseluruhan = DB::table('histori_bayar')->whereNotNull('tgl_request_token')->count();
        $requestTokenBelumRealisasi = DB::table('histori_bayar')->whereNull('tgl_realisasi_token')->count();
        $totalRequestRealisasi = DB::table('histori_bayar')->whereNotNull('tgl_realisasi_token')->count();
        $totalTokenRealisasi = DB::table('histori_bayar')->whereNotNull('tgl_realisasi_token')->sum('jumlah_realisasi_token');
        $totalBiayaBelumDibayarkan = $requestTokenKeseluruhan - $totalTokenRealisasi;

        return [
            'title' => 'Dashboard',
            'menuDashboard' => 'active',
            'totalUser' => $totalUser,
            'masjidDisetujui' => $masjidDisetujui,
            'masjidBelumDisetujui' => $masjidBelumDisetujui,
            'requestTokenKeseluruhan' => $requestTokenKeseluruhan,
            'requestTokenBelumRealisasi' => $requestTokenBelumRealisasi,
            'totalRequestRealisasi' => $totalRequestRealisasi,
            'totalTokenRealisasi' => $totalTokenRealisasi,
            'totalBiayaBelumDibayarkan' => $totalBiayaBelumDibayarkan,
        ];
    }

    public function index()
    {
        $data = $this->getDashboardData();
        return view('dashboard', $data);
    }

    // ✅ untuk halaman welcome
    public function welcome()
    {
        $data = $this->getDashboardData();

        // tambahkan data testimonial
        $data['testimonials'] = Testimonial::orderBy('created_at', 'desc')->take(6)->get();

        return view('welcome', $data);
    }
}
