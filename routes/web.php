<?php


use App\Models\Testimonial;
use App\Exports\MasjidsExport;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DapurController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MasjidController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\MobileAuthController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\ListDonaturController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AktifitasController;
use App\Http\Controllers\PengadaanItemController;
use App\Http\Controllers\PengadaanRequestController;





// ✅ Halaman utama (welcome page) menampilkan data + testimonial
Route::get('/welcome-page', [DashboardController::class, 'welcome'])->name('welcome');
Route::get('/', [DashboardController::class, 'redirectLanding']);

Route::get('/landing-page', [DashboardController::class, 'landingpage'])->name('landingpage');
Route::get('/tentang-kami', [DashboardController::class, 'tentangkami'])->name('tentangkami');
Route::get('/aktifitas-kami', [DashboardController::class, 'aktifitas'])->name('aktifitas');
Route::get('/acara-kami', [DashboardController::class, 'acara'])->name('acara');
Route::get('/testimoni-kami', [DashboardController::class, 'testimoni'])->name('testimoni');
Route::get('/kontak-kami', [DashboardController::class, 'kontakkami'])->name('kontakkami');
Route::get('/list-masjid', [DashboardController::class, 'listmasjid'])->name('listmasjid');
Route::get('/form-registrasi', [DashboardController::class, 'formregistrasi'])->name('formregistrasi');
Route::get('/mobile-landingpage', [DashboardController::class, 'mobilelandingpage'])->name('mobilelandingpage');


Route::get('/mobile-daftarmasjid', [DashboardController::class, 'mobiledaftarmasjid'])->name('mobiledaftarmasjid');
Route::get('/list-donatur', [ListDonaturController::class, 'listdonatur'])->name('listdonatur');


// Login
Route::get('login',[AuthController::class,'login'])->name('login');


Route::post('login',[AuthController::class,'loginProses'])->name('loginProses');
// Logout
Route::get('logout',[AuthController::class,'logout'])->name('logout');

// LOGIN MOBILE (FRONTEND)
Route::get('/mobile/login', [MobileAuthController::class, 'showLogin'])
    ->name('mobile.login');

Route::post('/mobile/login', [MobileAuthController::class, 'login'])
    ->name('mobile.login.process');

Route::get('/mobile', function () {
    return view('mobile.home');
})->name('mobile.home');
Route::get('/mobile/logout', [MobileAuthController::class, 'logout'])
    ->name('mobile.logout');


Route::middleware('checkLogin:user,karyawan,admin')->group(function () {
    Route::get('/mobile-requesttoken');
});


// 🔹 ROUTE PUBLIK (tanpa login) Route::get('daftar-masjid', [MasjidController::class, 'createPublic'])->name('masjidPublicForm');
Route::get('daftar-masjid', [MasjidController::class, 'createPublic'])->name('masjidPublicForm');
//Route::get('daftar-masjid', [DashboardController::class, 'landingpage'])->name('landingpage');
Route::post('daftar-masjid/store', [MasjidController::class, 'storePublic'])->name('masjidPublicStore');

// Ambil daftar kota berdasarkan provinsi
// Form publik

Route::get('/form-masjid', [MasjidController::class, 'publicForm'])->name('formMasjid');
Route::get('/mobile-aktifitas', [DashboardController::class, 'mobileaktifitas'])->name('mobileaktifitas');
Route::get('/mobile-perbaikanberibumasjid', [AktifitasController::class, 'mobileperbaikanberibumasjid'])->name('mobileperbaikanberibumasjid');
Route::get('/mobile-nyaahkaindung', [AktifitasController::class, 'mobilenyaahkaindung'])->name('mobilenyaahkaindung');
Route::get('/mobile-muadzincilik', [AktifitasController::class, 'mobilemuadzincilik'])->name('mobilemuadzincilik');
Route::get('/mobile-honorgurungaji', [AktifitasController::class, 'mobilehonorgurungaji'])->name('mobilehonorgurungaji');

Route::get('/mobile-tentangkami', [DashboardController::class, 'mobiletentangkami'])->name('mobiletentangkami');
Route::get('/mobile-testimonial', [DashboardController::class, 'mobiletestimonial'])->name('mobiletestimonial');
Route::get('/mobile-donatur', [ListDonaturController::class, 'mobiledonatur'])->name('mobiledonatur');
Route::get('/mobile-acara', [DashboardController::class, 'mobileacara'])->name('mobileacara');
Route::get('/mobile-datamasjid', [DashboardController::class, 'mobiledatamasjid'])->name('mobiledatamasjid');
Route::get('/mobile-listmasjid', [DashboardController::class, 'mobilelistmasjid'])->name('mobilelistmasjid');
Route::get('/mobile-help', [DashboardController::class, 'mobilehelp'])->name('mobilehelp');
Route::get('/mobile-registrasi', [MasjidController::class, 'showProvincesMobile'])->name('mobileregistrasi');
Route::get('/registrasi', [MasjidController::class, 'showProvinces'])->name('registrasi');  
//Route::get('/registrasiyangdisembunyikan', [MasjidController::class, 'showProvinces'])->name('registrasi');  obinkini route registrasi asli yang lagi dimatikan
Route::get('/get-regencies/{province_id}', [MasjidController::class, 'getRegencies'])->name('getRegencies');
Route::get('/get-districts/{regency_id}', [MasjidController::class, 'getDistricts'])->name('getDistricts');
Route::get('/get-villages/{district_id}', [MasjidController::class, 'getVillages'])->name('getVillages');






Route::get('masjid/data-masjid', [MasjidController::class, 'dataMasjidPublik'])->name('data.masjid.publik');









// 🔒 ROUTE YANG PERLU LOGIN
Route::middleware('checkLogin')->group(function(){
    // Dashboard
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    //dapurdashboard
     Route::get('dapurdashboard',[DapurController::class,'dapurdashboard'])->name('dapurdashboard');
     //barang
    Route::resource('jenis_barang', JenisBarangController::class);
    Route::resource('barang', BarangController::class);

// route untuk  lihat profile
    Route::get('/mobile-profile', [DashboardController::class, 'mobileprofile'])
        ->name('mobileprofile');
     // Mobile - Request Token
    Route::get('/mobile-request', [DashboardController::class, 'mobilerequesttoken'])
        ->name('mobilerequesttoken');
        
  Route::get('/mobile-requesttokenlanjut', [DashboardController::class, 'mobilerequesttokenlanjut'])
        ->name('mobilerequesttokenlanjut');
        

Route::post(
    '/mobile-requesttokenlanjutform',
    [DashboardController::class, 'mobilerequesttokenlanjutform']
)->name('mobilerequesttokenlanjutform');
Route::delete(
    '/mobile-requesttoken/{id}/cancel',
    [DashboardController::class, 'cancelRequestToken']
)->name('mobilerequesttoken.cancel');


// route untuk mematikan fungsi registrasi
Route::post('/admin/toggle-registration', [AdminSettingController::class, 'toggle'])
    ->middleware(['checkLogin'])
    ->name('admin.toggle.registration');

// route untuk mennganti versi mobile atau web
Route::post('/admin/toggle-mobile', [AdminSettingController::class, 'toggleMobileMode'])
    ->middleware(['checkLogin'])
    ->name('admin.toggle.mobile');


  Route::get('setting',[AdminSettingController::class,'index'])->name('setting');
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

  Route::get('/masjid/export', [MasjidController::class, 'export'])->name('masjid.export');
    Route::get('/masjid/{id_pelanggan}', [MasjidController::class, 'show'])->name('masjid.show');
    
    Route::post('/masjid/{id_pelanggan}/request-token', [MasjidController::class, 'requestToken'])->name('masjid.requestToken');

Route::post('/masjid/{id_pelanggan}/realisasi-token', [MasjidController::class, 'realisasiToken'])->name('masjid.realisasiToken');
  // Testimonial(versi admin)
    Route::get('testimonial',[TestimonialController::class,'index'])->name('testimonial');
 Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');


 Route::get('/pengajuantoken', [PengajuanController::class, 'index'])->name('pengajuantoken.index');

Route::post('/pengajuantoken/import', [PengajuanController::class, 'import'])->name('histori.import');

Route::get('/masjid/{id}/edit/{field}', [MasjidController::class, 'editField'])
     ->name('masjid.editField');

Route::put('/masjid/{id}/updateField', [MasjidController::class, 'updateField'])
     ->name('masjid.updateField');

Route::put('/masjid/{id}/verify', [MasjidController::class, 'verify'])
    ->name('masjid.verify');

Route::get('masjid/{id}/edit-full', [MasjidController::class, 'editFull'])
    ->name('masjid.editFull');

Route::put('masjid/{id}/update-full', [MasjidController::class, 'updateFull'])
    ->name('masjid.updateFull');

Route::get('/kirim-pesan/{id}', [MasjidController::class, 'kirimPesan'])->name('kirim.pesan');
Route::get('/kirim-pesantemplate/{id}', [MasjidController::class, 'kirimPesanTemplate'])->name('kirim.pesantemplate');
Route::post('/kirim-wa-bulk', [MasjidController::class, 'kirimPesanBulk'])
    ->name('kirim.wa.bulk');


Route::get('/pengadaan/items', [PengadaanItemController::class, 'index'])
    ->name('pengadaan.items.index');
    Route::prefix('pengadaan')->name('pengadaan.')->group(function(){
    Route::get('/items', [PengadaanItemController::class, 'index'])->name('items.index');
    Route::get('/items/data', [PengadaanItemController::class, 'data'])->name('items.data'); // DataTables AJAX
    Route::get('/items/export-excel', [PengadaanItemController::class, 'exportExcel'])->name('items.export.excel');
    Route::get('/items/export-pdf', [PengadaanItemController::class, 'exportPdf'])->name('items.export.pdf');
    Route::get('/items/group-by-cabang', [PengadaanItemController::class, 'groupByCabang'])->name('items.group.cabang');
    Route::get('/items/summary-by-request', [PengadaanItemController::class, 'summaryByRequest'])->name('items.summary.request');
});
  // karyawan membuat request
    Route::get('pengadaan', [PengadaanRequestController::class,'index'])->name('pengadaan.index');
    Route::post('pengadaan/store', [PengadaanRequestController::class,'store'])->name('pengadaan.store');
    Route::get('pengadaan/create', [PengadaanRequestController::class,'create'])->name('pengadaan.create');
    Route::get('pengadaan/{id}', [PengadaanRequestController::class,'show'])->name('pengadaan.show');

    // admin approve/reject
    Route::post('pengadaan/{id}/approve', [PengadaanRequestController::class,'approve'])->name('pengadaan.approve');
    Route::post('pengadaan/{id}/reject', [PengadaanRequestController::class,'reject'])->name('pengadaan.reject');
    Route::post('pengadaan/{id}/approve-items', [PengadaanRequestController::class,'approveItems'])
    ->name('pengadaan.approve_items');

Route::get('/pengadaan/{id}/export-pdf', [PengadaanRequestController::class, 'exportPdf'])
    ->name('pengadaan.export_pdf');


Route::resource('donatur', DonaturController::class);
Route::get('/donatur/{id}', [DonaturController::class, 'show'])->name('donatur.show');
Route::post('/donatur/{id}/donasi', [DonaturController::class, 'storeDonasi'])->name('donatur.donasi.store');
/* HAPUS HISTORI DONASI (1 BARIS) */
Route::delete(
    '/donatur/donasi/{donasi}',
    [DonaturController::class, 'destroyDonasi']
)->name('donatur.donasi.destroy');
Route::get(
    '/donatur/donasi/{donasi}/edit',
    [DonaturController::class, 'editDonasi']
)->name('donatur.donasi.edit');

Route::put(
    '/donatur/donasi/{donasi}',
    [DonaturController::class, 'updateDonasi']
)->name('donatur.donasi.update');



Route::resource('pengeluaran', App\Http\Controllers\PengeluaranController::class);
Route::resource('request-perbaikan', \App\Http\Controllers\RequestPerbaikanController::class);



Route::get('/export/masjids', function () {
    $timestamp = now()->format('d-m-Y');
 // contoh: 2025-11-22_14-35

    return Excel::download(new MasjidsExport, "masjids_{$timestamp}.xlsx"); 
});




});

});


