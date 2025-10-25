<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasjidController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Login
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'loginProses'])->name('loginProses');
// Logout
Route::get('logout',[AuthController::class,'logout'])->name('logout');

// 🔹 ROUTE PUBLIK (tanpa login)
Route::get('daftar-masjid', [MasjidController::class, 'createPublic'])->name('masjidPublicForm');
Route::post('daftar-masjid/store', [MasjidController::class, 'storePublic'])->name('masjidPublicStore');

// Ambil daftar kota berdasarkan provinsi
// Form publik

Route::get('/form-masjid', [MasjidController::class, 'publicForm'])->name('formMasjid');


Route::get('/registrasi', [MasjidController::class, 'showProvinces'])->name('registrasi');
Route::get('/get-regencies/{province_id}', [MasjidController::class, 'getRegencies'])->name('getRegencies');
Route::get('/get-districts/{regency_id}', [MasjidController::class, 'getDistricts'])->name('getDistricts');
Route::get('/get-villages/{district_id}', [MasjidController::class, 'getVillages'])->name('getVillages');


Route::get('/', function () {
    return view('welcome');
})->name('welcome');



// 🔒 ROUTE YANG PERLU LOGIN
Route::middleware('checkLogin')->group(function(){

    // Dashboard
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    // User
    Route::get('user',[UserController::class,'index'])->name('user');
    Route::get('user/create',[UserController::class,'create'])->name('userCreate');
    Route::post('user/store',[UserController::class,'store'])->name('userStore');

    // Masjid (versi admin)
    Route::get('masjid',[MasjidController::class,'index'])->name('masjid');
    Route::get('masjid/create',[MasjidController::class,'create'])->name('masjidCreate');
    Route::post('masjid/store',[MasjidController::class,'store'])->name('masjidStore');

});


