<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AsetKeluargaController;
use App\Http\Controllers\AsetLahanController;
use App\Http\Controllers\UmkmController;

// routes/web.php
use App\Http\Controllers\ReportController;
use App\Models\AsetLahan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/aset-keluarga', [AsetKeluargaController::class, 'index'])->name('aset-keluarga.index');
    Route::get('/aset-keluarga/create', [AsetKeluargaController::class, 'create'])->name('aset-keluarga.create');
    Route::post('/aset-keluarga', [AsetKeluargaController::class, 'store'])->name('aset-keluarga.store');
    Route::get('/aset-keluarga/{id}', [AsetKeluargaController::class, 'show'])->name('aset-keluarga.show');
    Route::get('/aset-keluarga/{id}/edit', [AsetKeluargaController::class, 'edit'])->name('aset-keluarga.edit');
    Route::put('/aset-keluarga/{id}', [AsetKeluargaController::class, 'update'])->name('aset-keluarga.update');

// Untuk hapus data juga sekalian
    Route::delete('/aset-keluarga/{id}', [AsetKeluargaController::class, 'destroy'])->name('aset-keluarga.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/aset-lahan', [AsetlahanController::class, 'index'])->name('aset-lahan.index');
    Route::get('/aset-lahan/create', [AsetlahanController::class, 'create'])->name('aset-lahan.create');
    Route::post('/aset-lahan', [AsetlahanController::class, 'store'])->name('aset-lahan.store');
    Route::get('/aset-lahan/{id}', [AsetlahanController::class, 'show'])->name('aset-lahan.show');
    Route::get('/aset-lahan/{id}/edit', [AsetlahanController::class, 'edit'])->name('aset-lahan.edit');
    Route::put('/aset-lahan/{id}', [AsetlahanController::class, 'update'])->name('aset-lahan.update');

// Untuk hapus data juga sekalian
    Route::delete('/aset-lahan/{id}', [AsetLahanController::class, 'destroy'])->name('aset-lahan.destroy');
});

Route::get('/aset-keluarga/export/csv', [AsetKeluargaController::class, 'exportCsv'])->name('aset-keluarga.export.csv');
Route::get('/aset-keluarga/export/pdf', [AsetKeluargaController::class, 'exportPdf'])->name('aset-keluarga.export.pdf');
Route::get('/aset-lahan/export/csv', [AsetLahanController::class, 'exportCsv'])->name('aset-lahan.export.csv');
Route::get('/aset-lahan/export/pdf', [AsetLahanController::class, 'exportPdf'])->name('aset-lahan.export.pdf');
Route::get('/umkm/export/csv', [UmkmController::class, 'exportCsv'])->name('umkm.export.csv');
Route::get('/umkm/export/pdf', [UmkmController::class, 'exportPdf'])->name('umkm.export.pdf');
Route::get('/reports/export/{format}', [ReportController::class, 'export'])->name('reports.export');



Route::get('/reports/export', [ReportController::class, 'export'])->name('reports.export');

Route::get('/menu-utama')->name('menu-utama');
Route::get('/menu-kependudukan')->name('menu-kependudukan');


// Menu tingkat 1
Route::get('/menu-utama', function () {
    return view('menu-utama');
})->name('menu.utama');

// Menu kependudukan
Route::get('/menu-kependudukan', function () {
    return view('menu-kependudukan');
})->name('menu.kependudukan');

// Submenu Data Keluarga
Route::get('/data-keluarga', function () {
    return view('data-keluarga');
})->name('menu.data-keluarga');

// Submenu CRUD (butuh controller nanti)
// Route::get('/data-dasar', [DataDasarController::class, 'index'])->name('data-dasar.index');
// Route::get('/prasarana', [PrasaranaController::class, 'index'])->name('prasarana.index');
// Route::get('/aset-keluarga', [AsetKeluargaController::class, 'index'])->name('aset-keluarga.index');
// Route::get('/aset-lahan', [AsetLahanController::class, 'index'])->name('aset-lahan.index');
// Route::get('/aset-ternak', [AsetTernakController::class, 'index'])->name('aset-ternak.index');
// Route::get('/aset-perikanan', [AsetPerikananController::class, 'index'])->name('aset-perikanan.index');
// Route::get('/sarpras-kerja', [SarprasKerjaController::class, 'index'])->name('sarpras-kerja.index');
// Route::get('/bangun-keluarga', [BangunKeluargaController::class, 'index'])->name('bangun-keluarga.index');

// Menu buat soal survey (voice)
Route::get('/buat-soal', function () {
    return view('buat-soal');
})->name('buat-soal');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');
    Route::get('/umkm/create', [UmkmController::class, 'create'])->name('umkm.create');
    Route::post('/umkm', [UmkmController::class, 'store'])->name('umkm.store');
    Route::get('/umkm/{id}', [UmkmController::class, 'show'])->name('umkm.show');
    Route::get('/umkm/{id}/edit', [UmkmController::class, 'edit'])->name('umkm.edit');
    Route::put('/umkm/{id}', [UmkmController::class, 'update'])->name('umkm.update');
    Route::delete('/umkm/{id}', [UmkmController::class, 'destroy'])->name('umkm.destroy');
});

