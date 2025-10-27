<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Masjid;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // <-- tambahkan baris ini

class MasjidController extends Controller
{
     public function index()
{
      $user = Auth::user();

        // Jika admin → tampilkan semua
        if (strtolower($user->jabatan) === 'admin') {
            $masjid = Masjid::all();
        } 
        // Jika user biasa → tampilkan hanya masjid dengan id_pelanggan = nam user
        else {
            $masjid = Masjid::where('id_pelanggan', $user->nama)->get();
        }

        return view('admin.masjid.index', [
            'masjid' => $masjid,
            'title' => 'Data Masjid',
            'menuAdminMasjid' => 'active'
        ]);
    
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
      $validator = Validator::make($request->all(), [
        'id_pelanggan' => 'required|unique:masjids,id_pelanggan',
        'nama_pelanggan' => 'required',
        'nama_masjid' => 'required',
    ], [
        'id_pelanggan.unique' => 'ID Pelanggan sudah terdaftar.',
        'id_pelanggan.required' => 'ID Pelanggan wajib diisi.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput() // 
            ->with('error', 'Data gagal disimpan karena ID pelanggan sudah terdaftar.')
            ->withInput();
    }

     // Simpan file foto masjid (jika di-upload)
    $fotoMasjidName = null;
    if ($request->hasFile('foto_masjid')) {
        $path = $request->file('foto_masjid')->store('foto_masjid', 'public'); // disimpan ke storage/app/public/foto_masjid
        $fotoMasjidName = basename($path); // hanya ambil nama file
    }

    // Simpan file foto meteran (jika di-upload)
    $fotoMeteranName = null;
    if ($request->hasFile('foto_meteran_listrik')) {
        $path = $request->file('foto_meteran_listrik')->store('foto_meteran_listrik', 'public');
        $fotoMeteranName = basename($path);
    }
    
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
'foto_masjid' => $fotoMasjidName,
'foto_meteran_listrik' => $fotoMeteranName,
'map_lokasi_masjid'=>  $request->map_lokasi_masjid ,
'estimasi_biaya'=> $request->estimasi_biaya,
'kode_relawan'=>  $request->kode_relawan ,
'pernyataan'=>  $request->pernyataan ,
'disetujui' => 0,
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


public function approve($id_pelanggan, Request $request)
{
    $masjid = Masjid::where('id_pelanggan', $id_pelanggan)->firstOrFail();
    $masjid->disetujui = $request->disetujui;
    $masjid->save();

    return response()->json(['success' => true]);
}




public function setujui($id)
{
    $masjid = Masjid::findOrFail($id);

    // Ubah status disetujui
    $masjid->update(['disetujui' => 1]);

  User::create([
    'nama' => $masjid->id_pelanggan,
    'email' => $masjid->id_pelanggan . '@example.com',
    'password' => bcrypt($masjid->id_pelanggan),
    'jabatan' => 'user',
]);



    return redirect()->back()->with('success', 'Masjid telah disetujui dan akun user dibuat.');
}

public function loginProses(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'password' => 'required|min:8',
    ], [
        'nama.required' => 'Nama tidak boleh kosong',
        'password.required' => 'Password tidak boleh kosong',
        'password.min' => 'Password minimal 8 karakter',
    ]);

    $data = [
        'nama' => $request->nama,
        'password' => $request->password,
    ];

    if (Auth::attempt($data)) {
        $user = Auth::user();

        if ($user->jabatan === 'Admin') {
            return redirect()->route('dashboard')->with('success', 'Anda berhasil login sebagai Admin');
        } elseif ($user->jabatan === 'User') {
            // asumsinya: nama == id_pelanggan di tabel masjids
            return redirect()->route('masjid.show', ['id_pelanggan' => $user->nama])
                ->with('success', 'Anda berhasil login sebagai User');
        } else {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Jabatan tidak dikenali');
        }
    } else {
        return redirect()->back()->with('error', 'Kode User atau Password salah');
    }
}

public function show($id_pelanggan)
{
    $masjid = Masjid::where('id_pelanggan', $id_pelanggan)->firstOrFail();
    $user = Auth::user();

    // Cek hak akses
    if ($user->jabatan === 'User' && $user->nama !== $id_pelanggan) {
        abort(403, 'Akses ditolak.');
    }

    // Ambil histori bayar
    $historiBayar = DB::table('histori_bayar')
        ->where('id_pelanggan', $masjid->id_pelanggan)
        ->orderBy('tgl_request_token', 'desc')
        ->get();

    // Cek apakah ada request yang belum direalisasi
    $adaRequestBelumRealisasi = DB::table('histori_bayar')
        ->where('id_pelanggan', $masjid->id_pelanggan)
        ->whereNull('tgl_realisasi_token')
        ->exists();

    return view('admin.masjid.show', [
        'masjid' => $masjid,
        'historiBayar' => $historiBayar,
        'adaRequestBelumRealisasi' => $adaRequestBelumRealisasi,
        'title' => 'Detail Masjid'
    ]);
}

public function requestToken(Request $request, $id_pelanggan)
{
    $masjid = Masjid::where('id_pelanggan', $id_pelanggan)->firstOrFail();

    $request->validate([
        'jumlah_request_token' => 'required|numeric|min:1',
    ]);

    DB::table('histori_bayar')->insert([
        'id_pelanggan' => $masjid->id_pelanggan,
        'tgl_request_token' => now(),
        'jumlah_request_token' => $request->jumlah_request_token,
        'tgl_realisasi_token' => null,
        'jumlah_realisasi_token' => null,
    ]);

    return redirect()->route('masjid.show', $id_pelanggan)
        ->with('success', 'Request token berhasil dikirim!');
}

public function realisasiToken(Request $request, $id_pelanggan)
{
    $masjid = Masjid::where('id_pelanggan', $id_pelanggan)->firstOrFail();

    $request->validate([
        'jumlah_realisasi_token' => 'required|numeric|min:1',
    ]);

    // Ambil request terakhir yang belum direalisasi
    $requestToken = DB::table('histori_bayar')
        ->where('id_pelanggan', $masjid->id_pelanggan)
        ->whereNull('tgl_realisasi_token')
        ->orderBy('tgl_request_token', 'desc')
        ->first();

    if (!$requestToken) {
        return redirect()->back()->with('warning', 'Tidak ada request token yang perlu direalisasi.');
    }

    // Update data realisasi
    DB::table('histori_bayar')
        ->where('id_pelanggan', $masjid->id_pelanggan)
        ->whereNull('tgl_realisasi_token')
        ->update([
            'tgl_realisasi_token' => now(),
            'jumlah_realisasi_token' => $request->jumlah_realisasi_token,
        ]);

    return redirect()->route('masjid.show', $id_pelanggan)
        ->with('success', 'Token berhasil direalisasikan!');
}


}





