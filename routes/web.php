<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SantriController;
use App\Http\Controllers\UstadzController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsenController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::resource('santri', SantriController::class);
    Route::resource('ustadz', UstadzController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('laporan', LaporanController::class);

    // FIX INI
    Route::resource('absen', AbsenController::class);

});

require __DIR__.'/auth.php';