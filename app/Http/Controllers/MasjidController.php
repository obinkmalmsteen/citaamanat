<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasjidController extends Controller
{
     public function index(){
        $data = array(
            'title' => 'Data Masjid',
            'menuAdminMasjid' => 'active',
            'masjid'  => Masjid::get(),
        );
        return view('admin/masjid/index',$data);
    }

        public function create(){
        $data = array(
            'title' => 'Tambah Data Masjid',
            'menuAdminMasjid' => 'active',
           
        );
        return view('admin/masjid/create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'id_pelanggan' =>'required',
            'nama_pelanggan'=>'required',
            'nama_masjid' =>'required',
            'nama_ketua_dkm' =>'required',
            'jenis_layanan' =>'required',
        ],[
            'id_pelanggan.required' =>'Nama Tidak Boleh Kosong',
            'nama_pelanggan.required' =>'email Tidak Boleh Kosong',
            'nama_masjid' =>'nama_ketua_dkm tidak boleh kosong',
            'nama_ketua_dkm.required' =>'nama_ketua_dkm Tidak Boleh Kosong',
            'jenis_layanan.required' =>'required',
            
        ]);
        $masjid = new Masjid;
        $masjid->id_pelanggan = $request->id_pelanggan;
        $masjid->nama_pelanggan = $request->nama_pelanggan;
        $masjid->nama_masjid = $request->nama_masjid;
        $masjid->nama_ketua_dkm = $request->nama_ketua_dkm;
        $masjid->jenis_layanan = $request->jenis_layanan;
        
        $masjid->save();
        return redirect()->route('masjid')->with('success','Data Berhasil Ditambahkan');
    }




    public function createPublic()
{
    return view('masjid.public_form');
}

public function storePublic(Request $request)
{
    // dd($request->all()); //debug
    // Validasi sederhana (opsional)
    $request->validate([
        'id_pelanggan' => 'required',
        'nama_pelanggan' => 'required',
        'nama_masjid' => 'required',
        
  
    ]);


    
    // Simpan data ke database dengan kolom tambahan otomatis
    \App\Models\Masjid::create([
        'id_pelanggan' => $request->id_pelanggan,
        'nama_pelanggan' => $request->nama_pelanggan,
        'jenis_bangunan' => $request->jenis_bangunan,
        'nama_masjid' => $request->nama_masjid,
        'jenis_layanan' => $request->jenis_layanan,
        'sesuai_id_masjid' => $request->sesuai_id_masjid,
        'alasan_id_berbeda'=> $request->alasan_id_berbeda,
         'nama_ketua_dkm' => $request->nama_ketua_dkm,
          'telp_ketua_dkm' => $request->telp_ketua_dkm ,

         'penerima_informasi'=>  $request->penerima_informasi ,
'telp_penerima_informasi'=>  $request->telp_penerima_informasi ,
'provinsi_id'=>  $request->province_id ,
'kota_id'=>  $request->regency_id ,
'kecamatan_id'=>  $request-> district_id,
'kelurahan_id'=>  $request-> village_id,
'alamat_lengkap'=>  $request-> alamat_lengkap,
'foto_masjid'=>  $request->foto_masjid ,
'foto_meteran_listrik'=>  $request->foto_meteran_listrik ,
'map_lokasi_masjid'=>  $request->map_lokasi_masjid ,
'estimasi_biaya'=> $request->estimasi_biaya,
'kode_relawan'=>  $request->kode_relawan ,
'pernyataan'=>  $request->pernyataan ,
    ]);

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Data masjid berhasil disimpan!');
}



public function showProvinces()
{
    // Ambil semua provinsi dari tabel reg_provinces
    $provinces = DB::table('reg_provinces')->orderBy('name', 'asc')->get();

    // Kirim ke view
    return view('masjid.registrasi', compact('provinces'));
}
public function getRegencies($province_id)
{
    $regencies = DB::table('reg_regencies')
        ->where('province_id', $province_id)
        ->orderBy('name', 'asc')
        ->get();

    return response()->json($regencies);
}

public function getDistricts($regency_id)
{
    $districts = DB::table('reg_districts')
        ->where('regency_id', $regency_id)
        ->orderBy('name', 'asc')
        ->get();

    return response()->json($districts);
}

public function getVillages($district_id)
{
    $villages = DB::table('reg_villages')
        ->where('district_id', $district_id)
        ->orderBy('name', 'asc')
        ->get();

    return response()->json($villages);
}

public function publicForm()
{
    $provinces = DB::table('reg_provinces')->orderBy('name', 'asc')->get();
    return view('masjid.public_form', compact('provinces'));
      $regencies = DB::table('reg_regencies')->orderBy('name', 'asc')->get();
    return view('masjid.public_form', compact('regencies'));

    if (!$request->has('agreement')) {
    return back()->with('error', 'Anda harus menyetujui syarat dan ketentuan.');
}

}


}





