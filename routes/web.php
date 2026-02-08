<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\PenyakitController;
use App\Http\Controllers\Admin\BasisPengetahuanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DiagnosaController;
use Illuminate\Support\Facades\Route;

//======================================================================
// RUTE GUEST
//======================================================================
Route::get('/', function () {
    return view('guest.index', ['title' => 'Beranda - Sistem Pakar Psikologi']);
})->name('beranda');
Route::get('/dagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
Route::post('/diagnosa/proses', [DiagnosaController::class, 'proses'])->name('diagnosa.proses');
Route::post('/diagnosa/cetak', [DiagnosaController::class, 'cetak'])->name('diagnosa.cetak');
Route::get('/tentang-kami', function () {
    return view('guest.tentang', ['title' => 'Tentang Kami']);
})->name('tentang.index');


//======================================================================
// RUTE AUTENTIKASI
//======================================================================

// --- RUTE UNTUK TAMU (Guest) ---
// Rute ini hanya bisa diakses oleh pengguna yang belum login.
Route::middleware('guest')->group(function () {
    // Rute Login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');

    // Rute Register
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register.post');
});


//======================================================================
// HALAMAN ADMIN & RUTE TERLINDUNG (BACKEND)
//======================================================================
// Semua rute di dalam grup ini dilindungi oleh middleware 'auth'.
Route::middleware('auth')->group(function () {
    // Rute Logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    
    // Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // =================================================================
    // MANAJEMEN SISTEM PAKAR
    // =================================================================
    
    // 1. Kelola Gejala
    // Menghasilkan route: gejala.index, gejala.create, gejala.store, dst.
    Route::resource('gejala', GejalaController::class);

    // 2. Kelola Penyakit
    // Menghasilkan route: penyakit.index, penyakit.create, penyakit.store, dst.
    Route::resource('penyakit', PenyakitController::class);

    // 3. Kelola Basis Pengetahuan (Aturan)
    // Menghasilkan route: basis_pengetahuan.index, dst.
    Route::resource('basis_pengetahuan', BasisPengetahuanController::class);
});