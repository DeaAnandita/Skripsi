<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AsetKeluargaController;
use App\Http\Controllers\AsetLahanController;
use App\Http\Controllers\AsetternakController;
use App\Http\Controllers\JenisHewanController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\NamaHewanController;
// routes/web.php
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SuratController;
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
//Layanan Umum
Route::middleware(['auth'])->group(function () {
    Route::get('/surat-online', [SuratController::class, 'index'])->name('surats.index');
    Route::get('/surat-online/create', [SuratController::class, 'create'])->name('surats.create');
    Route::post('/surat-online', [SuratController::class, 'store'])->name('surats.store');
    Route::get('/surat-online/{id}', [SuratController::class, 'show'])->name('surats.show');
    Route::get('/surat-online/{id}/edit', [SuratController::class, 'edit'])->name('surats.edit');
    Route::put('/surat-online/{id}', [SuratController::class, 'update'])->name('surats.update');
    Route::delete('/surat-online/{id}', [SuratController::class, 'destroy'])->name('surats.destroy');
    //master data jenis surat
    Route::resource('jenis-surat', JenisSuratController::class);
});
Route::get('/aset-keluarga/export/csv', [AsetKeluargaController::class, 'exportCsv'])->name('aset-keluarga.export.csv');
Route::get('/aset-keluarga/export/pdf', [AsetKeluargaController::class, 'exportPdf'])->name('aset-keluarga.export.pdf');
Route::get('/aset-lahan/export/csv', [AsetLahanController::class, 'exportCsv'])->name('aset-lahan.export.csv');
Route::get('/aset-lahan/export/pdf', [AsetLahanController::class, 'exportPdf'])->name('aset-lahan.export.pdf');
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

//Menu Layanan Umum
Route::get('/menu-LayananUmum', function () {
    return view('LayananUmum.menu-LayananUmum');
})->name('menu-LayananUmum');

//Aset Ternak
Route::middleware(['auth'])->group(function () {
    //aset ternak
    Route::get('/aset-ternak', [AsetTernakController::class, 'index'])->name('aset-ternak.index');
    Route::get('/aset-ternak/create', [AsetTernakController::class, 'create'])->name('aset-ternak.create');
    Route::post('/aset-ternak/store', [AsetTernakController::class, 'store'])->name('aset-ternak.store');
    Route::get('/aset-ternak/{id}/edit', [AsetTernakController::class, 'edit'])->name('aset-ternak.edit');
    Route::put('/aset-ternak/{id}/update', [AsetTernakController::class, 'update'])->name('aset-ternak.update');
    Route::delete('/aset-ternak/{id}/delete', [AsetTernakController::class, 'destroy'])->name('aset-ternak.destroy');
    Route::get('/aset-ternak/{id}', [AsetTernakController::class, 'show'])->name('aset-ternak.show');

    //cetak
    Route::get('/aset-ternak/export/csv', [AsetTernakController::class, 'exportCsv'])->name('aset_ternak.export.csv');
    Route::get('/aset-ternak/export/pdf', [AsetTernakController::class, 'exportPdf'])->name('aset_ternak.export.pdf');

    //nama hewan
    Route::get('/nama-hewan', [NamaHewanController::class, 'index'])->name('nama-hewan.index');
    Route::get('/nama-hewan/create', [NamaHewanController::class, 'create'])->name('nama-hewan.create');
    Route::post('/nama-hewan/store', [NamaHewanController::class, 'store'])->name('nama-hewan.store');
    Route::get('/nama-hewan/{id}/edit', [NamaHewanController::class, 'edit'])->name('nama-hewan.edit');
    Route::put('/nama-hewan/{id}/update', [NamaHewanController::class, 'update'])->name('nama-hewan.update');
    Route::delete('/nama-hewan/{id}/delete', [NamaHewanController::class, 'destroy'])->name('nama-hewan.destroy');

    //jenis hewan
    Route::get('/jenis-hewan', [JenisHewanController::class, 'index'])->name('jenis-hewan.index');
    Route::get('/jenis-hewan/create', [JenisHewanController::class, 'create'])->name('jenis-hewan.create');
    Route::post('/jenis-hewan/store', [JenisHewanController::class, 'store'])->name('jenis-hewan.store');
    Route::get('/jenis-hewan/{id}/edit', [JenisHewanController::class, 'edit'])->name('jenis-hewan.edit');
    Route::put('/jenis-hewan/{id}/update', [JenisHewanController::class, 'update'])->name('jenis-hewan.update');
    Route::delete('/jenis-hewan/{id}/delete', [JenisHewanController::class, 'destroy'])->name('jenis-hewan.destroy');
    Route::get('/get-jenis-hewan/{namaHewanId}', [AsetTernakController::class, 'getJenisHewan']);
});



Route::middleware(['auth'])->group(function () {
    Route::get('/menu-master data', function () {
        return view('menu-master-data');
    })->name('menu-master-data');
});
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

require __DIR__ . '/auth.php';
