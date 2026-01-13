<?php

namespace App\Http\Controllers;



use App\Models\Masjid;
use App\Models\Testimonial;
use App\Helpers\StorageSync;
use Illuminate\Http\Request;
use App\Models\MobileTestimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MobileTestimonialController extends Controller
{


public function index()
{
    $user = Auth::user();

    if (!$user || empty($user->nama)) {
        abort(403);
    }

    $id_pelanggan = $user->nama;

    $masjid = Masjid::where('id_pelanggan', $id_pelanggan)->get();

    $testimonial = Testimonial::where('id_testimonial', $id_pelanggan)->first();

    return view('mobilemasjid.mobilegivetestimoni', [
        'masjid' => $masjid,
        'testimonial' => $testimonial,
        
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
    // UPDATE STATUS MASJID
    Masjid::where('id_pelanggan', $user->nama)
        ->update(['testimonial_status' => 1]);

    // 🔥 INI PENTING
    return redirect()
        ->route('mobilegivetestimoni')
        ->with('success', 'Testimoni berhasil dikirim');
}

public function editVideo()
{
    $user = Auth::user();

    if (!$user || empty($user->nama)) {
        abort(403);
    }

    $testimonial = Testimonial::where('id_testimonial', $user->nama)->first();

    if (!$testimonial) {
        return redirect()
            ->route('mobilegivetestimoni')
            ->with('error', 'Testimoni tidak ditemukan');
    }

    return view('mobilemasjid.edit-video-testimoni', [
        'testimonial' => $testimonial
    ]);
}


public function updateVideo(Request $request)
{
    $user = Auth::user();

    if (!$user || empty($user->nama)) {
        abort(403);
    }

    // Validasi
    $request->validate([
        'video' => 'required|mimes:mp4,mov,avi,wmv|max:20480',
    ]);

    // Ambil data lama
    $testimonial = Testimonial::where('id_testimonial', $user->nama)->first();

    if (!$testimonial) {
        return redirect()
            ->route('mobilegivetestimoni')
            ->with('error', 'Testimoni tidak ditemukan');
    }

    // Hapus video lama (jika ada)
    if ($testimonial->video && Storage::disk('public')->exists($testimonial->video)) {
        Storage::disk('public')->delete($testimonial->video);
    }

    // Simpan video baru
    $videoPath = $request->file('video')->store('videos', 'public');
    StorageSync::run();

    // 🔥 UPDATE CARA STORE (PALING AMAN)
    Testimonial::where('id_testimonial', $user->nama)->update([
        'video' => $videoPath
    ]);

    return redirect()
        ->route('mobilegivetestimoni')
        ->with('success', 'Video testimoni berhasil diperbarui 🎥');
}



}