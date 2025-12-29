<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Masjid;

public function index()
{
    $user = Auth::user();

    $masjids = Masjid::where('id_pelanggan', $user->nama)->get();

    return view('mobileprofile', compact('user', 'masjids'));
}