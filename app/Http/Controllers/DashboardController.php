<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Masjid;
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
 public function redirectLanding(Request $request)
{
    $agent = $request->header('User-Agent');

    if ($this->isMobile($agent)) {
        return redirect('/mobile-landingpage');
    }

    return redirect('/landing-page');
}

private function isMobile($agent)
{
    return preg_match('/iphone|ipad|android|blackberry|opera mini|windows phone|mobile/i', $agent);
}


public function landingpage()
{
    // Hitung jumlah masjid yang disetujui (disetujui = 1)
    $masjidDisetujui = Masjid::where('disetujui', 1)->count();

    // Hitung masjid yang belum disetujui
    $masjidBelumDisetujui = Masjid::where('disetujui', '!=', 1)->count();

    // Hitung jumlah histori realisasi token
    $totalRequestRealisasi = DB::table('histori_bayar')
        ->whereNotNull('tgl_realisasi_token')
        ->count();

    // Ambil testimoni terbaru
    $testimonials = Testimonial::latest()->take(50)->get();

    // Ambil semua masjid beserta nama dan koordinat map (jika ada)
    $masjids = Masjid::select('nama_masjid', 'map_lokasi_masjid')
        ->whereNotNull('map_lokasi_masjid')
        ->get();

         // Ambil testimoni terbaru
    $listmasjid = Masjid::where('disetujui', 1)->take(150)->get();
    // Kirim ke view
    return view('landingpage', compact(
        'masjidDisetujui',
        'masjidBelumDisetujui',
        'totalRequestRealisasi',
        'testimonials',
        'masjids',
        'listmasjid' 
    ));
}



public function tentangkami()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('tentangkami', compact('jumlahUser'));
}
public function mobilelandingpage()
{
   // Hitung jumlah masjid yang disetujui (disetujui = 1)
    $masjidDisetujui = Masjid::where('disetujui', 1)->count();

    // Hitung masjid yang belum disetujui
    $masjidBelumDisetujui = Masjid::where('disetujui', '!=', 1)->count();

    // Hitung jumlah histori realisasi token
    $totalRequestRealisasi = DB::table('histori_bayar')
        ->whereNotNull('tgl_realisasi_token')
        ->count();

    // Ambil testimoni terbaru
    $testimonials = Testimonial::latest()->take(50)->get();

    // Ambil semua masjid beserta nama dan koordinat map (jika ada)
    $masjids = Masjid::select('nama_masjid', 'map_lokasi_masjid')
        ->whereNotNull('map_lokasi_masjid')
        ->get();

    // Kirim ke view
    return view('mobilelandingpage', compact(
        'masjidDisetujui',
        'masjidBelumDisetujui',
        'totalRequestRealisasi',
        'testimonials',
        'masjids'
    ));
}

public function mobiledaftarmasjid()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobiledaftarmasjid', compact('jumlahUser'));
}

public function aktifitas()
{
   
    return view('aktifitas');
}

public function acara()
{
   
    return view('acara');
}

public function testimoni()
{
    // Ambil testimoni terbaru
    $testimonials = Testimonial::latest()->take(150)->get();

    // Kirim ke view
    return view('testimoni', compact( 'testimonials'));
}



public function kontakkami()
{
   
    return view('kontakkami');
}

public function listmasjid()
{
    // Ambil testimoni terbaru
    $listmasjid = Masjid::where('disetujui', 1)->take(150)->get();

    // Kirim ke view
    return view('listmasjid', compact( 'listmasjid'));
}




public function formregistrasi()
{
   
    return view('formregistrasi');
}

}
