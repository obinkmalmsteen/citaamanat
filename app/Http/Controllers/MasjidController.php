<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Masjid;

use App\Helpers\StorageSync;
use Illuminate\Http\Request;
use App\Exports\MasjidExport;
use App\Helpers\WhatsappHelper;
use Illuminate\Support\Facades\DB;
use App\Exports\HistoriBayarExport;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
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


public function create()
{
    $data = [
        'title' => 'Tambah Data Masjid',
        'menuAdminMasjid' => 'active',
    ];

    return view('admin.masjid.create', $data);
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


public function dataMasjidPublik(Request $request)
{
    $filter = $request->filter_pengajuan;

    $masjid = DB::table('masjids')
        ->leftJoin('reg_regencies', 'masjids.kota_id', '=', 'reg_regencies.id')
        ->select(
            'masjids.*',
            'reg_regencies.name as nama_kota'
        )
        ->when($filter === '0', function ($q) {
            // 🔹 Hanya yang total_pengajuan = 0
            return $q->where('masjids.total_pengajuan', 0);
        })
        ->when($filter === '1', function ($q) {
            // 🔹 Hanya yang total_pengajuan ≥1
            return $q->where('masjids.total_pengajuan', '>', 0);
        })
        ->orderBy('masjids.created_at', 'desc')
        ->get();

    return view('masjid.data-masjid', [
        'masjid' => $masjid,
        'title' => 'Data Masjid Terdaftar'
    ]);
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
            ->withInput()
            ->with('error', 'Data gagal disimpan karena ID pelanggan sudah terdaftar.');
    }

    // ==========================================
    // Upload Foto Masjid
    // ==========================================
    $fotoMasjidName = null;
    if ($request->hasFile('foto_masjid')) {
        $path = $request->file('foto_masjid')->store('foto_masjid', 'public');
        $fotoMasjidName = basename($path);
        StorageSync::run();
    }

    // ==========================================
    // Upload Foto Meteran
    // ==========================================
    $fotoMeteranName = null;
    if ($request->hasFile('foto_meteran_listrik')) {
        $path = $request->file('foto_meteran_listrik')->store('foto_meteran_listrik', 'public');
        $fotoMeteranName = basename($path);
        StorageSync::run();
    }

    // ==========================================
    // Simpan data utama
    // ==========================================
    $masjid = \App\Models\Masjid::create([
        'id_pelanggan' => $request->id_pelanggan,
        'no_meteran_listrik' => $request->no_meteran_listrik,
        'nama_pelanggan' => $request->nama_pelanggan,
        'jenis_bangunan' => $request->jenis_bangunan,
        'nama_masjid' => $request->nama_masjid,
        'jenis_layanan' => $request->jenis_layanan,
        'sesuai_id_masjid' => $request->sesuai_id_masjid,
        'alasan_id_berbeda'=> $request->alasan_id_berbeda,
        'nama_ketua_dkm' => $request->nama_ketua_dkm,
        'telp_ketua_dkm' => $request->telp_ketua_dkm,
        'penerima_informasi'=> $request->penerima_informasi,
        'telp_penerima_informasi'=> $request->telp_penerima_informasi,
        'provinsi_id'=> $request->province_id,
        'kota_id'=> $request->regency_id,
        'kecamatan_id'=> $request->district_id,
        'kelurahan_id'=> $request->village_id,
        'alamat_lengkap'=> $request->alamat_lengkap,
        'foto_masjid' => $fotoMasjidName,
        'foto_meteran_listrik' => $fotoMeteranName,
        'map_lokasi_masjid'=> $request->map_lokasi_masjid,
        'estimasi_biaya'=> $request->estimasi_biaya,
        'kode_relawan'=> $request->kode_relawan,
        'pernyataan'=> $request->pernyataan,
        'disetujui' => 0,
    ]);

    // ==========================================
    // KIRIM WHATSAPP (pakai WhatsappHelper)
    // ==========================================

    if ($request->telp_penerima_informasi) {

        $pesan = 
            
"Assalamu’alaikum Wr.Wb

Alhamdulillah,
Registrasi Masjid/Mushola *{$masjid->nama_masjid}* telah kami terima.
Saat ini data sedang dalam proses dan menunggu tahap verifikasi.
Kunjungi Website kami http://www.Citaamanatmartadiredja.id untuk pengecekan status secara berkala

Wassalamu'alikum Wr.WB

Hormat kami,
Yayasan Cita Amanat Martadiredja";

       // WifiHelper::send($request->telp_penerima_informasi, $pesan);
        // atau
         WhatsappHelper::send($request->telp_penerima_informasi, $pesan);
    }

    return redirect()->back()->with('success', 'Data masjid berhasil disimpan & pesan WA dikirim!');
}


// public function storePublic(Request $request)
// {
//       $validator = Validator::make($request->all(), [
//         'id_pelanggan' => 'required|unique:masjids,id_pelanggan',
//         'nama_pelanggan' => 'required',
//         'nama_masjid' => 'required',
//     ], [
//         'id_pelanggan.unique' => 'ID Pelanggan sudah terdaftar.',
//         'id_pelanggan.required' => 'ID Pelanggan wajib diisi.',
//     ]);

//     if ($validator->fails()) {
//         return redirect()->back()
//             ->withErrors($validator)
//             ->withInput() // 
//             ->with('error', 'Data gagal disimpan karena ID pelanggan sudah terdaftar.')
//             ->withInput();
//     }

//      // Simpan file foto masjid (jika di-upload)
//     $fotoMasjidName = null;
//     if ($request->hasFile('foto_masjid')) {
//         $path = $request->file('foto_masjid')->store('foto_masjid', 'public'); // disimpan ke storage/app/public/foto_masjid
//         $fotoMasjidName = basename($path); // hanya ambil nama A

//             // setelah upload → langsung sinkron
//     StorageSync::run();
//     }

//     // Simpan file foto meteran (jika di-upload)
//     $fotoMeteranName = null;
//     if ($request->hasFile('foto_meteran_listrik')) {
//         $path = $request->file('foto_meteran_listrik')->store('foto_meteran_listrik', 'public');
//         $fotoMeteranName = basename($path);
//          StorageSync::run();
//     }
    
//     // Simpan data ke database dengan kolom tambahan otomatis
//     \App\Models\Masjid::create([
//         'id_pelanggan' => $request->id_pelanggan,
//         'no_meteran_listrik' => $request->no_meteran_listrik,
//         'nama_pelanggan' => $request->nama_pelanggan,
//         'jenis_bangunan' => $request->jenis_bangunan,
//         'nama_masjid' => $request->nama_masjid,
//         'jenis_layanan' => $request->jenis_layanan,
//         'sesuai_id_masjid' => $request->sesuai_id_masjid,
//         'alasan_id_berbeda'=> $request->alasan_id_berbeda,
//          'nama_ketua_dkm' => $request->nama_ketua_dkm,
//           'telp_ketua_dkm' => $request->telp_ketua_dkm ,

//          'penerima_informasi'=>  $request->penerima_informasi ,
// 'telp_penerima_informasi'=>  $request->telp_penerima_informasi ,
// 'provinsi_id'=>  $request->province_id ,
// 'kota_id'=>  $request->regency_id ,
// 'kecamatan_id'=>  $request-> district_id,
// 'kelurahan_id'=>  $request-> village_id,
// 'alamat_lengkap'=>  $request-> alamat_lengkap,
// 'foto_masjid' => $fotoMasjidName,
// 'foto_meteran_listrik' => $fotoMeteranName,
// 'map_lokasi_masjid'=>  $request->map_lokasi_masjid ,
// 'estimasi_biaya'=> $request->estimasi_biaya,
// 'kode_relawan'=>  $request->kode_relawan ,
// 'pernyataan'=>  $request->pernyataan ,
// 'disetujui' => 0,
//     ]);


//     //   // ==========================================
//     // // KIRIM PESAN WHATSAPP OTOMATIS
//     // // ==========================================

//     // if ($request->telp_penerima_informasi) {
//     //     $response = Http::withoutVerifying()->get('https://markeyza.web.id/send', [
//     //         'to' => $request->telp_penerima_informasi,
//     //         'message' => 
//     //         "Assalamualaikum.\n\nRegistrasi masjid *{$request->nama_masjid}* telah berhasil.\nData sedang diproses dan menunggu verifikasi.\n\nTerima kasih."
//     //     ]);
//     //     dd($response->body());
//     // }
//     // Redirect kembali dengan pesan sukses
//     return redirect()->back()->with('success', 'Data masjid berhasil disimpan!');
// }



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



   // ==========================================
    // KIRIM WHATSAPP (pakai WhatsappHelper)
    // ==========================================

    if ($masjid->telp_penerima_informasi) {

        $pesan = 
"Assalamu’alaikum warahmatullahi wabarakatuh.

Subjek: Persetujuan Program Terangi Beribu Masjid
Bapak/Ibu Pengurus Masjid/Mushala *{$masjid->nama_masjid}*

Dengan mengucap Alhamdulillahi rabbil ‘alamin, kami sampaikan kabar gembira bahwa masjid/mushala yang Bapak/Ibu ajukan telah disetujui untuk mengikuti Program “Terangi Beribu Masjid”.

Sebagai tindak lanjut, mohon kesediaan Bapak/Ibu untuk melakukan beberapa langkah berikut:
Login ke sistem menggunakan:
* ID Pelanggan: *{$masjid->id_pelanggan}*
* Password: *{$masjid->id_pelanggan}*
Melakukan permintaan (request) token melalui sistem kami.
Bergabung ke Grup WhatsApp resmi program melalui tautan berikut:
https://chat.whatsapp.com/KW0hoNt1YHI57i8aK6kdGK
(Keikutsertaan dalam grup WA sangat penting agar Bapak/Ibu mendapatkan seluruh informasi dan pembaruan program.)
Terimakasih telah menjadi bagian dalam memakmurkan Masjid/Mushola, semoga menjadi amal kebaikan.

Wassalamu’alaikum Wr.Wb.

Hormat kami,
Yayasan Cita Amanat Martadiredja ";
         WhatsappHelper::send($masjid->telp_penerima_informasi, $pesan);
    }

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
    ->where('status_realisasi', 0)
    ->exists();

// Ambil tanggal request terakhir (jika ada)
$tglRequestTokenTerakhir = DB::table('histori_bayar')
    ->where('id_pelanggan', $masjid->id_pelanggan)
    ->max('tgl_request_token'); // Ambil tanggal paling akhir




return view('admin.masjid.show', [
    'masjid' => $masjid,
    'historiBayar' => $historiBayar,
    'adaRequestBelumRealisasi' => $adaRequestBelumRealisasi,
    'tglRequestTokenTerakhir' => $tglRequestTokenTerakhir, // ⬅️ tambahkan baris ini
    'title' => 'Detail Masjid',
        
    ]);
}

public function requestToken(Request $request, $id_pelanggan)
{
    $masjid = Masjid::where('id_pelanggan', $id_pelanggan)->firstOrFail();

    $request->validate([
        // Validasi lain jika ada
    ]);

    // Insert histori baru
    DB::table('histori_bayar')->insert([
        'id_pelanggan' => $masjid->id_pelanggan,
        'no_meteran_listrik' => $masjid->no_meteran_listrik,
        'nama_masjid' => $masjid->jenis_bangunan . ' ' . $masjid->nama_masjid,
        'nama_kota' => $masjid->regency->name ?? '-',
        'nama_provinsi' => $masjid->province->name ?? '-',
        'tgl_request_token' => now(),
        'tgl_realisasi_token' => null,
        'no_token_listrik' => null,
        'jumlah_realisasi_token' => null,
    ]);


    // 🔥 Tambahkan 1 ke total pengajuan masjid ini
    Masjid::where('id_pelanggan', $id_pelanggan)->increment('total_pengajuan');

        if ($masjid->telp_penerima_informasi) {

        $pesan = 
            "Assalamualaikum.\n\n".
            "Masjid *{$masjid->nama_masjid}* .\n".
            "Berhasil Melakukan Permintaan pengisian token listrik.\n\n".
            "Silahkan Menunggu sampai Permintaan Anda Di realisasikan. Kami akan mengirimkan pesan kepada anda jika sudah ada realisasi token.\n\n".
            "Terima kasih.\n\n".
"Cita Amanat Martadiredja.";
         WhatsappHelper::send($masjid->telp_penerima_informasi, $pesan);
    }

    return redirect()->route('masjid.show', $id_pelanggan)
        ->with('success', 'Request token berhasil dikirim!');
}


public function realisasiToken(Request $request, $id_pelanggan)
{
    $masjid = Masjid::where('id_pelanggan', $id_pelanggan)->firstOrFail();

    $request->validate([
        'no_token_listrik' => 'required|numeric|min:1',
        'jumlah_realisasi_token' => 'required|numeric|min:1',
    ]);

    // Ambil request terakhir yang belum direalisasi
    $histori = DB::table('histori_bayar')
        ->where('id_pelanggan', $masjid->id_pelanggan)
        ->whereNull('tgl_realisasi_token')
        ->orderBy('tgl_request_token', 'desc')
        ->first();

    if (!$histori) {
        return redirect()->back()->with('warning', 'Tidak ada request token yang perlu direalisasi.');
    }

    // Update data realisasi
    DB::table('histori_bayar')
        ->where('id_pelanggan', $masjid->id_pelanggan)
        ->whereNull('tgl_realisasi_token')
        ->update([
            'tgl_realisasi_token' => now(),
            'no_token_listrik' => $request->no_token_listrik,
            'jumlah_realisasi_token' => $request->jumlah_realisasi_token,
             'status_realisasi' => 1, // otomatis ubah jadi 1
        ]);

         if ($masjid->telp_penerima_informasi) {

        $pesan = 
            
"Assalamu’alaikum warahmatullahi wabarakatuh.

Bapak/Ibu Pengurus Masjid/Mushola *{$masjid->nama_masjid}*
Dengan ini kami sampaikan bahwa permintaan token listrik yang diajukan telah berhasil direalisasikan.

Berikut informasi token :

Nomor Token : *{$request->no_token_listrik}*
Jumlah Saldo : Rp *{$request->jumlah_realisasi_token}*

Semoga bantuan ini dapat bermanfaat bagi kegiatan operasional Masjid/Mushola *{$masjid->nama_masjid}*.
Atas perhatian dan kerja samanya, kami ucapkan terima kasih.

Wassalamu’alaikum Wr.Wb

Hormat kami,
Cita Amanat Martadiredja ";

         WhatsappHelper::send($masjid->telp_penerima_informasi, $pesan);
    }

    return redirect()->route('masjid.show', $id_pelanggan)
        ->with('success', 'Token berhasil direalisasikan!');
}

public function editField($id, $field)
{
    $allowed = ['nama_masjid','nama_pelanggan','no_telp_ketua_dkm', /* dst */];

    if (!in_array($field, $allowed)) {
        abort(404);
    }

    $masjid = Masjid::findOrFail($id);
    return view('admin.masjid.edit_field', ['masjid'=>$masjid, 'field'=>$field]);
}


public function updateField(Request $request, $id)
{
    $masjid = Masjid::findOrFail($id);

    if ($masjid->is_verified) {
        return back()->with('error', 'Data sudah diverifikasi admin dan tidak dapat diubah lagi.');
    }

    $field = array_keys($request->except('_token','_method'))[0];
    $masjid->$field = $request->$field;
    $masjid->save();

    return redirect()->route('masjid.show', $id)->with('success', 'Data berhasil diperbarui!');
}


public function verify(Request $request, $id)
{
    $masjid = Masjid::findOrFail($id);

    // ambil nilai langsung (0 atau 1)
    $masjid->is_verified = $request->is_verified;
    $masjid->save();

    return back()->with('success', 'Status verifikasi diperbarui.');
}
public function export(Request $request)
{
    $status = $request->query('status'); // null / '1' / '0'

    $filename = 'histori_bayar';
    if ($status === '1') $filename .= '_teralisasi';
    elseif ($status === '0') $filename .= '_belum_teralisasi';
    $filename .= '_' . date('Ymd_His') . '.xlsx';

    return Excel::download(new HistoriBayarExport($status), $filename);
}




}





