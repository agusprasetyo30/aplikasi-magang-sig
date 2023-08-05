<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KelolaKuotaController;
use App\Http\Controllers\Admin\PesertaMagangController;
use App\Http\Controllers\Admin\UploadTwibbonController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Guest\KuotaMagangController;
use App\Http\Controllers\Guest\PusatInformasiController;
use App\Http\Controllers\Guest\TentangSIGController;
use App\Http\Controllers\Mahasiswa\BerkasPengajuanMagangController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Mahasiswa\PengajuanMagangController;
use App\Http\Controllers\Mahasiswa\UploadBerkasController;
use App\Http\Controllers\Select2Controller;
use App\Models\BerkasPengajuanMagang;
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
    'middleware' => ['auth', 'can:mahasiswa'],
    'as'         => 'mahasiswa.'], function() {

    Route::get('/', [MahasiswaDashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/download-berkas-magang', [MahasiswaDashboardController::class, 'downloadBerkasMagang'])->name('dashboard.download-berkas-magang');
    Route::put('/upload-photo', [MahasiswaDashboardController::class, 'uploadPhoto'])->name('dashboard.upload-photo');
    
    Route::resource('pengajuan-magang', PengajuanMagangController::class);
    Route::resource('upload-berkas', BerkasPengajuanMagangController::class);
});

// Admin Login
Route::group([
    'prefix'     => 'admin',
    'middleware' => ['auth', 'can:admin'],
    'as'         => 'admin.'], function() {
    
        // Dashboard
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard.index');

        // Peserta Magang
        Route::prefix('peserta-magang')->as('peserta-magang.')->group(function() {
            Route::get('/{id}/upload-data', [PesertaMagangController::class, 'uploadDataView'])->name('upload-data-view');
            Route::put('/{id}/upload-data', [PesertaMagangController::class, 'uploadData'])->name('upload-data');
        });

        Route::resource('jurusan', JurusanController::class);
        Route::resource('kelola-kuota', KelolaKuotaController::class);
        Route::resource('peserta-magang', PesertaMagangController::class);
        Route::resource('upload-twibbon', UploadTwibbonController::class);
        Route::resource('user-management', UserManagementController::class);
});

// Select2
Route::group([
    'prefix'     => 'select2',
    'middleware' => ['auth'],
    'as'         => 'select2.'], function() {
    
    Route::get('/jurusan', [Select2Controller::class, 'jurusanSelect2'])->name('jurusan');
});




