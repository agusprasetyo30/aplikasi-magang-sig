<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Guest\KuotaMagangController;
use App\Http\Controllers\Guest\PusatInformasiController;
use App\Http\Controllers\Guest\TentangSIGController;
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

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function() {
        dd('Ini adalah admin', Auth::user());
    });
});

Route::group(['prefix' => 'user'], function() {
    Route::get('/', function() {
        dd('Ini adalah user yang register', Auth::user(), Auth::user()->role);
    });
});

