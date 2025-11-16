<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:20480', // max 20MB
        'keterangan' => 'nullable|string',
    ]);

    // Simpan video (jika ada)
    $videoPath = null;
    if ($request->hasFile('video')) {
        $videoPath = $request->file('video')->store('videos', 'public');
        StorageSync::run();
    }

$fotoPengelolaMasjid = null;
if ($request->hasFile('foto_pengelola')) {
    $path = $request->file('foto_pengelola')->store('foto_pengelola', 'public');
    $fotoPengelolaMasjid = basename($path);
    StorageSync::run();
}
    // Simpan data testimonial
    Testimonial::create([
        'id_testimonial' => $user->nama,
        'ucapan' => $request->ucapan,
        'photo' => $fotoPengelolaMasjid,
        'video' => $videoPath,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('testimonial.index')->with('success', 'Testimonial berhasil ditambahkan!');
}


}
