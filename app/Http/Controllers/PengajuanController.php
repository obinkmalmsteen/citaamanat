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
            $pengajuantoken = HistoriBayar::all();
        } else {
            $pengajuantoken = HistoriBayar::where('id_pelanggan', $user->nama)->get();
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
