<?php

use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasjidController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\TestimonialController;

// ✅ Halaman utama (welcome page) menampilkan data + testimonial
Route::get('/', [DashboardController::class, 'welcome'])->name('welcome');

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

   Route::get('masjid',[MasjidController::class,'index'])->name('masjid');

    Route::post('/masjid/approve/{id_pelanggan}', [MasjidController::class, 'approve'])->name('masjid.approve');

    Route::get('/masjid/detail/{id_pelanggan}', [MasjidController::class, 'show'])->name('masjid.show');
    
    Route::post('/masjid/{id_pelanggan}/setujui', [MasjidController::class, 'setujui'])->name('masjid.setujui');

Route::middleware(['auth'])->group(function () {
    Route::get('/masjid/{id_pelanggan}', [MasjidController::class, 'show'])->name('masjid.show');
    
    Route::post('/masjid/{id_pelanggan}/request-token', [MasjidController::class, 'requestToken'])->name('masjid.requestToken');

Route::post('/masjid/{id_pelanggan}/realisasi-token', [MasjidController::class, 'realisasiToken'])->name('masjid.realisasiToken');
  // Testimonial(versi admin)
    Route::get('testimonial',[TestimonialController::class,'index'])->name('testimonial');
 Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');


 Route::get('/pengajuantoken', [PengajuanController::class, 'index'])->name('pengajuantoken.index');

Route::post('/pengajuantoken/import', [PengajuanController::class, 'import'])->name('histori.import');

});

});


