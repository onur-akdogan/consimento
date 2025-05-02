<?php

use App\Http\Controllers\PricecalcuteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PriceOfferController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FiyatController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AddressController;


use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/ 

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (requires authentication)
  
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/analytics', [DashboardController::class, 'analytics'])->name('analytics');
    Route::get('/priceoffer', [PriceOfferController::class, 'index'])->name('priceoffer');
    Route::get('/pricecalcute', [PricecalcuteController::class, 'index'])->name('pricecalcute');
    Route::post('/fiyat-hesapla', [PricecalcuteController::class, 'hesapla'])->name('fiyat.hesapla');

    // Fiyat hesaplama (kullanıcı)
 
// Admin paneli
Route::get('/admin/teklif-ekle', [AdminController::class, 'teklifForm'])->name('admin.teklif.form');
Route::post('/admin/teklif-kaydet', [AdminController::class, 'teklifKaydet'])->name('admin.teklif.kaydet');
// Listele
Route::get('/admin/teklifler', [AdminController::class, 'teklifListe'])->name('admin.teklif.liste');

// Düzenle
Route::get('/admin/teklif-duzenle/{id}', [AdminController::class, 'teklifDuzenleForm'])->name('admin.teklif.duzenle.form');
Route::post('/admin/teklif-guncelle/{id}', [AdminController::class, 'teklifGuncelle'])->name('admin.teklif.guncelle');

// Sil
Route::post('/admin/teklif-sil/{id}', [AdminController::class, 'teklifSil'])->name('admin.teklif.sil');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');


Route::get('/addresses/{type?}', [AddressController::class, 'index'])
    ->name('addresses.index')
    ->where('type', 'sender|receiver')
    ->middleware('auth'); // oturum kontrolü varsa
Route::get('/addresses/{type}/create', [AddressController::class, 'create'])->name('addresses.create');
Route::post('/addresses/{type}', [AddressController::class, 'store'])->name('addresses.store');

});

// Redirect root to login or dashboard based on authentication status
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});