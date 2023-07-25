<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\KelolaKuotaController;
use App\Http\Controllers\Admin\PesertaMagangController;
use App\Http\Controllers\Admin\UploadTwibbonController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Guest\KuotaMagangController;
use App\Http\Controllers\Guest\PusatInformasiController;
use App\Http\Controllers\Guest\TentangSIGController;
use App\Http\Controllers\Mahasiswa\PengajuanMagangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Only Guest (User not login)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/tentang-sig', [TentangSIGController::class, 'index'])->name('tentang-sig.index');
Route::get('/kuota-magang', [KuotaMagangController::class, 'index'])->name('kuota-magang.index');
Route::get('/pusat-informasi', [PusatInformasiController::class, 'index'])->name('pusat-informasi.index');

// User Mahasiswa Login
Route::group([
    'prefix'     => 'mahasiswa',
    'middleware' => 'auth',
    'as'         => 'mahasiswa.'], function() {

    Route::resource('pengajuan-magang', PengajuanMagangController::class);
});

// Admin Login
Route::group([
    'prefix'     => 'admin',
    'middleware' => 'auth',
    'as'         => 'admin.'], function() {
    
        // Dashboard
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard.index');

        Route::resource('kelola-kuota', KelolaKuotaController::class);
        Route::resource('peserta-magang', PesertaMagangController::class);
        Route::resource('upload-twibbon', UploadTwibbonController::class);
        Route::resource('user-management', UserManagementController::class);
});



