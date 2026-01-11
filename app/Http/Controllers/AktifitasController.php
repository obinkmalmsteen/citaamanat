<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AktifitasController extends Controller
{
    public function mobileperbaikanberibumasjid()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobilemasjid.mobileperbaikanberibumasjid', compact('jumlahUser'));
}
  public function mobilenyaahkaindung()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobilemasjid.mobilenyaahkaindung', compact('jumlahUser'));
}
  public function mobilemuadzincilik()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobilemasjid.mobilemuadzincilik', compact('jumlahUser'));
}
public function mobilehonorgurungaji()
{
    // Hitung semua user terdaftar
    $jumlahUser = User::count();

    // Kirim hasilnya ke view
    return view('mobilemasjid.mobilehonorgurungaji', compact('jumlahUser'));
}

}
