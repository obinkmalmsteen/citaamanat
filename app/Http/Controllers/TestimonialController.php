<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Masjid;
use App\Models\Testimonial;
use App\Helpers\StorageSync;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
 public function index()
{
    $user = Auth::user();

    if (strtolower($user->jabatan) === 'admin') {
        $testimonial = Testimonial::all();
    } else {
        $testimonial = Testimonial::where('id_testimonial', $user->nama)->get();
    }

    return view('admin.testimonial.index', [
        'testimonial' => $testimonial,
        'title' => 'Data Testimonial',
        'menuAdminTestimonial' => 'active'
    ]);
}

public function store(Request $request)
{
    $user = Auth::user();

    // Validasi input
    $request->validate([
        'ucapan' => 'required|string',
        'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:20480',
        'keterangan' => 'nullable|string',
    ]);

    // Simpan video
    $videoPath = null;
    if ($request->hasFile('video')) {
        $videoPath = $request->file('video')->store('videos', 'public');
        StorageSync::run();
    }

    // Simpan foto pengelola
    $fotoPengelolaMasjid = null;
    if ($request->hasFile('foto_pengelola')) {
        $path = $request->file('foto_pengelola')->store('foto_pengelola', 'public');
        $fotoPengelolaMasjid = basename($path);
        StorageSync::run();
    }

// Simpan testimonial
Testimonial::create([
    'id_testimonial' => $user->nama,   // pastikan ini adalah id_pelanggan
    'ucapan' => $request->ucapan,
    'photo' => $fotoPengelolaMasjid,
    'video' => $videoPath,
    'keterangan' => $request->keterangan,
]);

// ⬇️ UPDATE TABEL MASJIDS BERDASARKAN id_pelanggan

Masjid::where('id_pelanggan', $user->nama)
    ->update([
        'testimonial_status' => 1
    ]);

$item = Masjid::where('id_pelanggan', $user->nama)
    ->first();

return redirect()->route('testimonial.index')->with('success', 'Terimakasih telah mendukung kami silahkan untuk memeriksa status pengajuan Token anda!');
}


}
