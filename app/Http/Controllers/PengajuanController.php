<?php

namespace App\Http\Controllers;

use App\Models\HistoriBayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\HistoriBayarImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class PengajuanController extends Controller
{
public function index()
{
    $user = Auth::user();

    if (strtolower($user->jabatan) === 'admin') {
        $pengajuantoken = HistoriBayar::join('masjids', 'histori_bayar.id_pelanggan', '=', 'masjids.id_pelanggan')
            ->select(
                'histori_bayar.*',
                'masjids.telp_ketua_dkm',
                'masjids.jenis_layanan'
            )
            ->get();
    } else {
        $pengajuantoken = HistoriBayar::join('masjids', 'histori_bayar.id_pelanggan', '=', 'masjids.id_pelanggan')
            ->select(
                'histori_bayar.*',
                'masjids.telp_ketua_dkm',
                'masjids.jenis_layanan'
            )
            ->where('histori_bayar.id_pelanggan', $user->nama)
            ->get();
    }

    // Reset otomatis jika bukan hari ini
    foreach ($pengajuantoken as $item) {
        if ($item->pesan_terkirim_at && !$item->pesan_terkirim_at->isToday()) {
            $item->pesan_terkirim_at = null;
        }
    }

    return view('admin.pengajuantoken.index', [
        'pengajuantoken' => $pengajuantoken,
        'title' => 'Data Pengajuan Token',
        'menuAdminPengajuan' => 'active'
    ]);
}




public function import(Request $pengajuantoken)
{
    $pengajuantoken->validate([
        'file' => 'required|mimes:xlsx,xls,csv'
    ]);

    Excel::import(new HistoriBayarImport, $pengajuantoken->file('file'));

    return redirect()->route('pengajuantoken.index')->with('success', 'Data histori bayar berhasil diupdate!');
}



}
