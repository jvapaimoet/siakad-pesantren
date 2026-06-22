<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SantriController;
use App\Http\Controllers\UstadzController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Santri hanya bisa melihat dashboard dan jadwal. Semua perubahan data hanya untuk ustadz/ustadzah.
Route::middleware(['auth', 'ustadz'])->group(function () {
    Route::resource('santri', SantriController::class);
    Route::resource('ustadz', UstadzController::class);
    Route::resource('jadwal', JadwalController::class)->except(['index']);
    Route::get('keuangan/cetak', [KeuanganController::class, 'cetak'])->name('keuangan.cetak');
    Route::resource('keuangan', KeuanganController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::get('laporan/cetak/{jenis}', [LaporanController::class, 'cetak'])->name('laporan.cetak');
    Route::resource('laporan', LaporanController::class);
    Route::resource('absen', AbsenController::class);
});

require __DIR__.'/auth.php';
