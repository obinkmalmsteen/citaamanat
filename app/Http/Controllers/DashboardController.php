<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Masjid;
use App\Models\Donatur;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\DonasiHistori;
use App\Helpers\WhatsappHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
    $testimonials = Testimonial::latest()->take(150)->get();

    // Ambil semua masjid beserta nama dan koordinat map (jika ada)
    $masjids = Masjid::select('nama_masjid', 'map_lokasi_masjid')
        ->whereNotNull('map_lokasi_masjid')
        ->get();

    // Total nilai donatur
    $totalDonasi = DonasiHistori::sum('nominal_donasi');

    // Jumlah donatur tetap (donatur_tetap = 1)
    $totalDonaturTetap = Donatur::where('donatur_tetap', 1)->count();

    // Jumlah donatur tidak tetap (donatur_tetap = 0)
    $totalDonaturTidakTetap = Donatur::where('donatur_tetap', 0)->count();

         // Ambil testimoni terbaru
    $listmasjid = Masjid::where('disetujui', 1)->take(150)->get();

    $donaturTetap = Donatur::where('donatur_tetap', 1)
    ->limit(5)
    ->get();

    $totalSemuaPengeluaran = Pengeluaran::sum('jumlah');

    // Hitung sisa saldo
    $sisaSaldo = $totalDonasi - $totalSemuaPengeluaran;
    // Kirim ke view
    return view('landingpage', compact(
        'masjidDisetujui',
        'masjidBelumDisetujui',
        'totalRequestRealisasi',
        'testimonials',
        'masjids',
        'listmasjid' ,
        'donaturTetap',
        'totalDonasi',
        'totalDonaturTetap',
        'totalDonaturTidakTetap',
        'totalSemuaPengeluaran',
        'sisaSaldo'
    ));

    
}



public function tentangkami()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();
 $donaturTetap = Donatur::where('donatur_tetap', 1)
    ->limit(5)
    ->get();
           // Total nilai donatur
    $totalDonasi = DonasiHistori::sum('nominal_donasi');

    // Jumlah donatur tetap (donatur_tetap = 1)
    $totalDonaturTetap = Donatur::where('donatur_tetap', 1)->count();

    // Jumlah donatur tidak tetap (donatur_tetap = 0)
    $totalDonaturTidakTetap = Donatur::where('donatur_tetap', 0)->count();

         $totalSemuaPengeluaran = Pengeluaran::sum('jumlah');

    // Hitung sisa saldo
    $sisaSaldo = $totalDonasi - $totalSemuaPengeluaran;
    // Kirim hasilnya ke view
    return view('tentangkami', compact('jumlahUser','donaturTetap','totalDonasi',
        'totalDonaturTetap',
        'totalDonaturTidakTetap','totalSemuaPengeluaran','sisaSaldo'));
}
public function mobilelandingpage()
{
    // 🔒 CEK STATUS MOBILE LANDING
    if ((int) setting('mobile_mode_active') !== 1) {
        // fallback ke landing web
        return $this->landingpage();
    }

   // Hitung jumlah masjid yang disetujui (disetujui = 1)
    $masjidDisetujui = Masjid::where('disetujui', 1)->count();

    // Hitung masjid yang belum disetujui
    $masjidBelumDisetujui = Masjid::where('disetujui', '!=', 1)->count();

    // Hitung jumlah histori realisasi token
    $totalRequestRealisasi = DB::table('histori_bayar')
        ->whereNotNull('tgl_realisasi_token')
        ->count();

    // Ambil testimoni terbaru
    $testimonials = Testimonial::latest()->take(20)->get();

    // Ambil semua masjid beserta nama dan koordinat map (jika ada)
    $masjids = Masjid::select('nama_masjid', 'map_lokasi_masjid')
        ->whereNotNull('map_lokasi_masjid')
        ->get();

    $donaturTetap = Donatur::where('donatur_tetap', 1)->get();

    $mobileMenus = [
    [
        'label' => 'Home',
        'icon'  => 'home',
        'route' => 'mobilelandingpage',
    ],
    [
        'label' => 'Aktifitas',
        'icon'  => 'timeline',
        'route' => 'mobileaktifitas',
    ],
    [
        'label' => 'Tentang Kami',
        'icon'  => 'info',
        'route' => 'mobiletentangkami',
    ],
    [
        'label' => 'Registrasi',
        'icon'  => 'how_to_reg',
        'route' => 'mobileregistrasi',
    ],
    [
        'label' => 'List Masjid',
        'icon'  => 'list_alt',
        'route' => 'mobilelistmasjid',
    ],
    [
        'label' => 'Testimonial',
        'icon'  => 'reviews',
        'route' => 'mobiletestimonial',
    ],
    [
        'label' => 'Donatur',
        'icon'  => 'volunteer_activism',
        'route' => 'mobiledonatur',
    ],
    [
        'label' => 'Acara',
        'icon'  => 'event',
        'route' => 'mobileacara',
    ],
    [
        'label' => 'Data Masjid',
        'icon'  => 'analytics',
        'route' => 'mobiledatamasjid',
    ],
    [
        'label' => 'Kontak Kami',
        'icon'  => 'contact_mail',
        'route' => 'kontak',
    ],
    [
        'label' => 'Request Token',
        'icon'  => 'bolt',
        'route' => 'mobilerequesttoken',
    ],
    [
        'label' => 'Profil',
        'icon'  => 'account_circle',
        'route' => 'mobileprofile',
    ],
];



    // Kirim ke view
    return view('mobilelandingpage', compact(
        'masjidDisetujui',
        'masjidBelumDisetujui',
        'totalRequestRealisasi',
        'testimonials',
        'masjids',
        'mobileMenus'

    ));
}



public function mobiledaftarmasjid()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobiledaftarmasjid', compact('jumlahUser'));
}

public function mobilerequesttoken()
{
    $user = Auth::user();

    if (!$user || empty($user->nama)) {
        abort(403);
    }

    $id_pelanggan = $user->nama;

    $jumlahUser = User::count();

    $masjid = Masjid::where('id_pelanggan', $id_pelanggan)->get();

    return view('mobilemasjid.mobilerequesttoken', [
        'masjid' => $masjid,
        'jumlahUser' => $jumlahUser,
        'title' => 'Data Masjid',
        'menuAdminMasjid' => 'active',
    ]);
}



public function mobilerequesttokenlanjut()
{
    $user = Auth::user();

    if (!$user || empty($user->nama)) {
        abort(403);
    }

    $id_pelanggan = $user->nama;

    $masjid = Masjid::where('id_pelanggan', $id_pelanggan)->firstOrFail();

    // 🔍 Ambil semua histori
    $historiBayar = DB::table('histori_bayar')
        ->where('id_pelanggan', $id_pelanggan)
        ->orderBy('tgl_request_token', 'desc')
        ->get();

    // histori terakhir
    $historiTerakhir = $historiBayar->first();

    // 🔒 flag disable
    $disableRequestBulanIni = false;

    if ($historiTerakhir && $historiTerakhir->tgl_request_token) {
        if (Carbon::parse($historiTerakhir->tgl_request_token)->isSameMonth(now())) {
            $disableRequestBulanIni = true;
        }
    }

    return view('mobilemasjid.mobilerequesttokenlanjut', [
        'masjid' => $masjid,
        'historiBayar' => $historiBayar,
        'historiTerakhir' => $historiTerakhir,
        'disableRequestBulanIni' => $disableRequestBulanIni,
        'title' => 'Detail Masjid',
    ]);
}



public function mobilerequesttokenlanjutform(Request $request)
{
    $user = Auth::user();

    if (!$user || empty($user->nama)) {
        abort(403);
    }

    $id_pelanggan = $user->nama;

    // histori terakhir
    $historiTerakhir = DB::table('histori_bayar')
        ->where('id_pelanggan', $id_pelanggan)
        ->orderBy('tgl_request_token', 'desc')
        ->first();

    // ❌ BLOK jika bulan sama
    if ($historiTerakhir &&
        Carbon::parse($historiTerakhir->tgl_request_token)->isSameMonth(now())) {
        return back()->withErrors(
            'Pengajuan token bulan ini sudah dilakukan.'
        );
    }

    $masjid = Masjid::where('id_pelanggan', $id_pelanggan)->firstOrFail();

    // 🟢 INSERT
    DB::table('histori_bayar')->insert([
        'id_pelanggan' => $masjid->id_pelanggan,
        'no_meteran_listrik' => $masjid->no_meteran_listrik,
        'nama_masjid' => $masjid->jenis_bangunan.' '.$masjid->nama_masjid,
        'nama_kota' => $masjid->regency->name ?? '-',
        'nama_provinsi' => $masjid->province->name ?? '-',
        'tgl_request_token' => now(),
        'tgl_realisasi_token' => null,
        'no_token_listrik' => null,
    ]);

    Masjid::where('id_pelanggan', $id_pelanggan)
        ->increment('total_pengajuan');

    return redirect()
        ->route('mobilerequesttokenlanjut')
        ->with('success', 'Permintaan token berhasil dikirim.');
}
public function cancelRequestToken($id_histori)
{
    $user = Auth::user();

    if (!$user || empty($user->nama)) {
        abort(403);
    }

    $id_pelanggan = $user->nama;

    $histori = DB::table('histori_bayar')
        ->where('id_histori', $id_histori)
        ->where('id_pelanggan', $id_pelanggan)
        ->first();

    if (!$histori) {
        abort(404);
    }

    // ❌ Sudah direalisasi → tidak boleh cancel
    if ($histori->tgl_realisasi_token || $histori->no_token_listrik) {
        return back()->withErrors('Permintaan sudah direalisasi dan tidak bisa dibatalkan.');
    }

    // 🗑️ HAPUS REQUEST
    DB::table('histori_bayar')->where('id_histori', $id_histori)->delete();

    return back()->with('success', 'Permintaan token berhasil dibatalkan.');
}

public function mobiletentangkami()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobilemasjid.mobiletentangkami', compact('jumlahUser'));
}
public function mobiletestimonial()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobilemasjid.mobiletestimonial', compact('jumlahUser'));
}
public function mobiledonatur()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobilemasjid.mobiledonatur', compact('jumlahUser'));
}
public function mobileacara()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobilemasjid.mobileacara', compact('jumlahUser'));
}
public function mobiledatamasjid()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobilemasjid.mobiledatamasjid', compact('jumlahUser'));
}
public function mobileregistrasi()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobilemasjid.mobileregistrasi', compact('jumlahUser'));
}
public function mobileaktifitas()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobilemasjid.mobileaktifitas', compact('jumlahUser'));
}
public function mobileprofile()
{
    $user = Auth::user();

    if (!$user || empty($user->nama)) {
        abort(403);
    }

    $id_pelanggan = $user->nama;

    $jumlahUser = User::count();

    $masjid = Masjid::where('id_pelanggan', $id_pelanggan)->get();

    return view('mobilemasjid.mobileprofile', [
        'masjid' => $masjid,
        'jumlahUser' => $jumlahUser,
        'title' => 'Data Masjid',
        'menuAdminMasjid' => 'active',
    ]);
}

public function mobilelistmasjid(Request $request)
{
    $filter = $request->filter_pengajuan;
    $search = $request->search;

    $masjid = DB::table('masjids')
        ->leftJoin('reg_regencies', 'masjids.kota_id', '=', 'reg_regencies.id')
        ->select(
            'masjids.*',
            'reg_regencies.name as nama_kota'
        )

        // 🔍 SEARCH NAMA MASJID
        ->when($search, function ($q, $search) {
            $q->where('masjids.nama_masjid', 'like', '%' . $search . '%');
        })

        // 🔎 FILTER PENGAJUAN
        ->when($filter === '0', function ($q) {
            $q->where('masjids.total_pengajuan', 0);
        })
        ->when($filter === '1', function ($q) {
            $q->where('masjids.total_pengajuan', '>', 0);
        })

        ->orderBy('masjids.created_at', 'desc')
        ->paginate(100);

    return view('mobilemasjid.mobilelistmasjid', [
        'masjid' => $masjid,
        'title'  => 'Data Masjid Terdaftar'
    ]);
}

public function aktifitas()
{
     $donaturTetap = Donatur::where('donatur_tetap', 1)
    ->limit(5)
    ->get();

       // Total nilai donatur
    $totalDonasi = DonasiHistori::sum('nominal_donasi');

    // Jumlah donatur tetap (donatur_tetap = 1)
    $totalDonaturTetap = Donatur::where('donatur_tetap', 1)->count();

    // Jumlah donatur tidak tetap (donatur_tetap = 0)
    $totalDonaturTidakTetap = Donatur::where('donatur_tetap', 0)->count();
        $totalSemuaPengeluaran = Pengeluaran::sum('jumlah');

    // Hitung sisa saldo
    $sisaSaldo = $totalDonasi - $totalSemuaPengeluaran;

    return view('aktifitas', compact('donaturTetap','totalDonasi',
        'totalDonaturTetap',
        'totalDonaturTidakTetap','totalSemuaPengeluaran','sisaSaldo'));
}

public function acara()
{
    $donaturTetap = Donatur::where('donatur_tetap', 1)
    ->limit(5)
    ->get();
       // Total nilai donatur
    $totalDonasi = DonasiHistori::sum('nominal_donasi');

    // Jumlah donatur tetap (donatur_tetap = 1)
    $totalDonaturTetap = Donatur::where('donatur_tetap', 1)->count();

    // Jumlah donatur tidak tetap (donatur_tetap = 0)
    $totalDonaturTidakTetap = Donatur::where('donatur_tetap', 0)->count();

     $totalSemuaPengeluaran = Pengeluaran::sum('jumlah');

    // Hitung sisa saldo
    $sisaSaldo = $totalDonasi - $totalSemuaPengeluaran;
    return view('acara', compact('donaturTetap','totalDonasi',
        'totalDonaturTetap',
        'totalDonaturTidakTetap','totalSemuaPengeluaran','sisaSaldo'));
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
     $donaturTetap = Donatur::where('donatur_tetap', 1)
    ->limit(5)
    ->get();
   
    return view('kontakkami', compact('donaturTetap'));
}

public function listmasjid()
{
    // Ambil testimoni terbaru
    $listmasjid = Masjid::where('disetujui', 1)->take(150)->get();

    // Kirim ke view
    return view('listmasjid', compact( 'listmasjid'));
}

public function listdonatur()
{
    // Ambil testimoni terbaru
    $listmasjid = Masjid::where('disetujui', 1)->take(150)->get();
      $donaturTetap = Donatur::where('donatur_tetap', 1)
    ->limit(5)
    ->get();

    // Kirim ke view
    return view('listdonatur', compact( 'listmasjid','donaturTetap'));
}


public function formregistrasi()
{
   
    return view('formregistrasi');
}

}
