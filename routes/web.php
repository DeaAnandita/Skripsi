<?php
use App\Http\Controllers\KesejahteraanKeluargaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AsetKeluargaController;
use App\Http\Controllers\AsetLahanController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\BantuanSosialController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\BangunKeluargaController;
use App\Http\Controllers\IbuHamilController;
use App\Http\Controllers\BayiController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\PenyewaanLahanController;
use App\Http\Controllers\LayananMasyarakatController;
use App\Http\Controllers\KonflikSosialController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UsahaArtController;
use App\Http\Controllers\SaprasKerjaController;
use App\Http\Controllers\SarpraskerjaController;
use App\Http\Controllers\SosialEkonomiController;
use App\Http\Controllers\SuratController;


use App\Models\AsetLahan;
use App\Models\KesejahteraanKeluarga;
use App\Models\Sarpraskerja;
use App\Http\Controllers\KelahiranController;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/usaha_art', [UsahaArtController::class, 'index'])->name('usaha_art.index');
    Route::get('/usaha_art/create', [UsahaArtController::class, 'create'])->name('usaha_art.create');
    Route::post('/usaha_art', [UsahaArtController::class, 'store'])->name('usaha_art.store');
    Route::get('/usaha_art/{id}', [UsahaArtController::class, 'show'])->name('usaha_art.show');
    Route::get('/usaha_art/{id}/edit', [UsahaArtController::class, 'edit'])->name('usaha_art.edit');
    Route::put('/usaha_art/{id}', [UsahaArtController::class, 'update'])->name('usaha_art.update');
    Route::get('usaha_art/export-pdf', [UsahaArtController::class, 'exportPdf'])->name('usaha_art.export.pdf');

// Untuk hapus data juga sekalian
    Route::delete('/usaha_art/{id}', [UsahaArtController::class, 'destroy'])->name('usaha_art.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/sosial_ekonomi', [SosialEkonomiController::class, 'index'])->name('sosial_ekonomi.index');
    Route::get('/sosial_ekonomi/create', [SosialEkonomiController::class, 'create'])->name('sosial_ekonomi.create');
    Route::post('/sosial_ekonomi', [SosialEkonomiController::class, 'store'])->name('sosial_ekonomi.store');
    Route::get('/sosial_ekonomi/{id}', [SosialEkonomiController::class, 'show'])->name('sosial_ekonomi.show');
    Route::get('/sosial_ekonomi/{id}/edit', [SosialEkonomiController::class, 'edit'])->name('sosial_ekonomi.edit');
    Route::put('/sosial_ekonomi/{id}', [SosialEkonomiController::class, 'update'])->name('sosial_ekonomi.update');
    Route::get('sosial_ekonomi/export-pdf', [SosialEkonomiController::class, 'exportPdf'])->name('sosial_ekonomi.export.pdf');

    // Untuk hapus data juga sekalian
    Route::delete('/sosial_ekonomi/{id}', [SosialEkonomiController::class, 'destroy'])->name('sosial_ekonomi.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/bantuan-sosial', [BantuanSosialController::class, 'index'])->name('bantuan-sosial.index');
    Route::get('/bantuan-sosial/create', [BantuanSosialController::class, 'create'])->name('bantuan-sosial.create');
    Route::post('/bantuan-sosial', [BantuanSosialController::class, 'store'])->name('bantuan-sosial.store');
    Route::get('/bantuan-sosial/{id}', [BantuanSosialController::class, 'show'])->name('bantuan-sosial.show');
    Route::get('/bantuan-sosial/{id}/edit', [BantuanSosialController::class, 'edit'])->name('bantuan-sosial.edit');
    Route::put('/bantuan-sosial/{id}', [BantuanSosialController::class, 'update'])->name('bantuan-sosial.update');

// Untuk hapus data juga sekalian
    Route::delete('/bantuan-sosial/{id}', [BantuanSosialController::class, 'destroy'])->name('bantuan-sosial.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/anggota-keluarga', [AnggotaKeluargaController::class, 'index'])->name('anggota-keluarga.index');
    Route::get('/anggota-keluarga/create', [AnggotaKeluargaController::class, 'create'])->name('anggota-keluarga.create');
    Route::post('/anggota-keluarga', [AnggotaKeluargaController::class, 'store'])->name('anggota-keluarga.store');
    Route::get('/anggota-keluarga/{id}', [AnggotaKeluargaController::class, 'show'])->name('anggota-keluarga.show');
    Route::get('/anggota-keluarga/{id}/edit', [AnggotaKeluargaController::class, 'edit'])->name('anggota-keluarga.edit');
    Route::put('/anggota-keluarga/{id}', [AnggotaKeluargaController::class, 'update'])->name('anggota-keluarga.update');

// Untuk hapus data juga sekalian
    Route::delete('/anggota-keluarga/{id}', [AnggotaKeluargaController::class, 'destroy'])->name('anggota-keluarga.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/penyewaan-lahan', [PenyewaanLahanController::class, 'index'])->name('penyewaan-lahan.index');
    Route::get('/penyewaan-lahan/create', [PenyewaanLahanController::class, 'create'])->name('penyewaan-lahan.create');
    Route::post('/penyewaan-lahan', [PenyewaanLahanController::class, 'store'])->name('penyewaan-lahan.store');
    Route::get('/penyewaan-lahan/{id}', [PenyewaanLahanController::class, 'show'])->name('penyewaan-lahan.show');
    Route::get('/penyewaan-lahan/{id}/edit', [PenyewaanLahanController::class, 'edit'])->name('penyewaan-lahan.edit');
    Route::put('/penyewaan-lahan/{id}', [PenyewaanLahanController::class, 'update'])->name('penyewaan-lahan.update');

// Untuk hapus data penyewaan lahan
    Route::delete('/penyewaan-lahan/{id}', [PenyewaanLahanController::class, 'destroy'])->name('penyewaan-lahan.destroy');
});
//Ibu Hamil
Route::middleware(['auth'])->group(function () {
    Route::get('/ibu-hamil', [IbuHamilController::class, 'index'])->name('ibu-hamil.index');
    Route::get('/ibu-hamil/create', [IbuHamilController::class, 'create'])->name('ibu-hamil.create');
    Route::post('/ibu-hamil', [IbuHamilController::class, 'store'])->name('ibu-hamil.store');
    Route::get('/ibu-hamil/{id}', [IbuHamilController::class, 'show'])->name('ibu-hamil.show');
    Route::get('/ibu-hamil/{id}/edit', [IbuHamilController::class, 'edit'])->name('ibu-hamil.edit');
    Route::put('/ibu-hamil/{id}', [IbuHamilController::class, 'update'])->name('ibu-hamil.update');

// Untuk hapus data juga sekalian
    Route::delete('/ibu-hamil/{id}', [IbuHamilController::class, 'destroy'])->name('ibu-hamil.destroy');
});

//Bayi
Route::middleware(['auth'])->group(function () {
    Route::get('/bayi', [BayiController::class, 'index'])->name('bayi.index');
    Route::get('/bayi/create', [BayiController::class, 'create'])->name('bayi.create');
    Route::post('/bayi', [BayiController::class, 'store'])->name('bayi.store');
    Route::get('/bayi/{id}', [BayiController::class, 'show'])->name('bayi.show');
    Route::get('/bayi/{id}/edit', [BayiController::class, 'edit'])->name('bayi.edit');
    Route::put('/bayi/{id}', [BayiController::class, 'update'])->name('bayi.update');

// Untuk hapus data juga sekalian
    Route::delete('/bayi/{id}', [BayiController::class, 'destroy'])->name('bayi.destroy');
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

Route::middleware(['auth'])->group(function () {
    Route::get('/sarpraskerja', [SarpraskerjaController::class, 'index'])->name('sarpraskerja.index');
    Route::get('/sarpraskerja/create', [SarpraskerjaController::class, 'create'])->name('sarpraskerja.create');
    Route::post('/sarpraskerja', [SarpraskerjaController::class, 'store'])->name('sarpraskerja.store');
    Route::get('/sarpraskerja/{id}', [SarpraskerjaController::class, 'show'])->name('sarpraskerja.show');
    Route::get('/sarpraskerja/{id}/edit', [SarpraskerjaController::class, 'edit'])->name('sarpraskerja.edit');
    Route::put('/sarpraskerja/{id}', [SarpraskerjaController::class, 'update'])->name('sarpraskerja.update');

// Untuk hapus data juga sekalian
    Route::delete('/sarpraskerja/{id}', [SarpraskerjaController::class, 'destroy'])->name('sarpraskerja.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/bangunkeluarga', [BangunKeluargaController::class, 'index'])->name('bangunkeluarga.index');
    Route::get('/bangunkeluarga/create', [BangunKeluargaController::class, 'create'])->name('bangunkeluarga.create');
    Route::post('/bangunkeluarga', [BangunKeluargaController::class, 'store'])->name('bangunkeluarga.store');
    Route::get('/bangunkeluarga/{id}', [BangunKeluargaController::class, 'show'])->name('bangunkeluarga.show');
    Route::get('/bangunkeluarga/{id}/edit', [BangunKeluargaController::class, 'edit'])->name('bangunkeluarga.edit');
    Route::put('/bangunkeluarga/{id}', [BangunKeluargaController::class, 'update'])->name('bangunkeluarga.update');

    // Untuk hapus data juga sekalian
    Route::delete('/bangunkeluarga/{id}', [BangunKeluargaController::class, 'destroy'])->name('bangunkeluarga.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');
    Route::get('/umkm/create', [UmkmController::class, 'create'])->name('umkm.create');
    Route::post('/umkm', [UmkmController::class, 'store'])->name('umkm.store');
    Route::get('/umkm/{id}', [UmkmController::class, 'show'])->name('umkm.show');
    Route::get('/umkm/{id}/edit', [UmkmController::class, 'edit'])->name('umkm.edit');
    Route::put('/umkm/{id}', [UmkmController::class, 'update'])->name('umkm.update');
    Route::delete('/umkm/{id}', [UmkmController::class, 'destroy'])->name('umkm.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/layananmasyarakat', [LayananMasyarakatController::class, 'index'])->name('layananmasyarakat.index');
    Route::get('/layananmasyarakat/create', [LayananMasyarakatController::class, 'create'])->name('layananmasyarakat.create');
    Route::post('/layananmasyarakat', [LayananMasyarakatController::class, 'store'])->name('layananmasyarakat.store');
    Route::get('/layananmasyarakat/{id}', [LayananMasyarakatController::class, 'show'])->name('layananmasyarakat.show');
    Route::get('/layananmasyarakat/{id}/edit', [LayananMasyarakatController::class, 'edit'])->name('layananmasyarakat.edit');
    Route::put('/layananmasyarakat/{id}', [LayananMasyarakatController::class, 'update'])->name('layananmasyarakat.update');


Route::get('/layananmasyarakat/export/csv', [LayananmasyarakatController::class, 'exportCsv'])
    ->name('layananmasyarakat.export.csv');

Route::get('/layananmasyarakat/export/pdf', [LayananmasyarakatController::class, 'exportPdf'])
    ->name('layananmasyarakat.export.pdf');

// Untuk hapus data juga sekalian
    Route::delete('/layananmasyarakat/{id}', [LayananMasyarakatController::class, 'destroy'])->name('layananmasyarakat.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/kesejahteraankeluarga', [KesejahteraanKeluargaController::class, 'index'])->name('kesejahteraankeluarga.index');
    Route::get('/kesejahteraankeluarga/create', [KesejahteraanKeluargaController::class, 'create'])->name('kesejahteraankeluarga.create');
    Route::post('/kesejahteraankeluarga', [KesejahteraanKeluargaController::class, 'store'])->name('kesejahteraankeluarga.store');
    Route::get('/kesejahteraankeluarga/{id}', [KesejahteraanKeluargaController::class, 'show'])->name('kesejahtraankeluarga.show');
    Route::get('/kesejahteraankeluarga/{id}/edit', [KesejahteraanKeluargaController::class, 'edit'])->name('kesejahteraankeluarga.edit');
    Route::put('/kesejahteraankeluarga/{id}', [KesejahteraanKeluargaController::class, 'update'])->name('kesejahteraankeluarga.update');

// Untuk hapus data juga sekalian
    Route::delete('/kesejahteraankeluarga/{id}', [KesejahteraanKeluargaController::class, 'destroy'])->name('kesejahteraankeluarga.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/kelahiran', [KelahiranController::class, 'index'])->name('kelahiran.index');
    Route::get('/kelahiran/create', [KelahiranController::class, 'create'])->name('kelahiran.create');
    Route::post('/kelahiran', [KelahiranController::class, 'store'])->name('kelahiran.store');
    Route::get('/kelahiran/{id}', [KelahiranController::class, 'show'])->name('kelahiran.show');
    Route::get('/kelahiran/{id}/edit', [KelahiranController::class, 'edit'])->name('kelahiran.edit');
    Route::put('/kelahiran/{id}', [KelahiranController::class, 'update'])->name('kelahiran.update');

// Untuk hapus data juga sekalian
    Route::delete('/kesejahteraankeluarga/{id}', [KesejahteraanKeluargaController::class, 'destroy'])->name('kesejahteraankeluarga.destroy');
});

Route::get('/aset-keluarga/export/csv', [AsetKeluargaController::class, 'exportCsv'])->name('aset-keluarga.export.csv');
Route::get('/aset-keluarga/export/pdf', [AsetKeluargaController::class, 'exportPdf'])->name('aset-keluarga.export.pdf');
Route::get('/aset-lahan/export/csv', [AsetLahanController::class, 'exportCsv'])->name('aset-lahan.export.csv');
Route::get('/aset-lahan/export/pdf', [AsetLahanController::class, 'exportPdf'])->name('aset-lahan.export.pdf');
Route::get('/kesejahteraan_keluarga/export/csv', [KesejahteraanKeluargaController::class, 'exportCsv'])->name('kesejahteraan_keluarga.export.csv');
Route::get('/kesejahteraan_keluarga/export/pdf', [KesejahteraanKeluargaController::class, 'exportPdf'])->name('kesejahteraan_keluarga.export.pdf');
Route::get('/sarpraskerja/export/csv', [SarpraskerjaController::class, 'exportCsv'])->name('sarpraskerja.export.csv');
Route::get('/sarpraskerja/export/pdf', [SarpraskerjaController::class, 'exportPdf'])->name('sarpraskerja.export.pdf');
Route::get('/umkm/export/csv', [UmkmController::class, 'exportCsv'])->name('umkm.export.csv');
Route::get('/umkm/export/pdf', [UmkmController::class, 'exportPdf'])->name('umkm.export.pdf');
Route::get('/bantuan-sosial/export/csv', [BantuanSosialController::class, 'exportCsv'])->name('bantuan-sosial.export.csv');
Route::get('/bantuan-sosial/export/pdf', [BantuanSosialController::class, 'exportPdf'])->name('bantuan-sosial.export.pdf');
Route::get('/anggota-keluarga/export/csv', [AnggotaKeluargaController::class, 'exportCsv'])->name('anggota-keluarga.export.csv');
Route::get('/anggota-keluarga/export/pdf', [AnggotaKeluargaController::class, 'exportPdf'])->name('anggota-keluarga.export.pdf');
Route::get('/ibu-hamil/export/csv', [IbuHamilController::class, 'exportCsv'])->name('ibu-hamil.export.csv');
Route::get('/ibu-hamil/export/pdf', [IbuHamilController::class, 'exportPdf'])->name('ibu-hamil.export.pdf');
Route::get('/bayi/export/csv', [IbuHamilController::class, 'exportCsv'])->name('bayi.export.csv');
Route::get('/bayi/export/pdf', [IbuHamilController::class, 'exportPdf'])->name('bayi.export.pdf');
Route::get('/bangunkeluarga/export/csv', [BangunKeluargaController::class, 'exportCsv'])->name('bangunkeluarga.export.csv');
Route::get('/bangunkeluarga/export/pdf', [BangunKeluargaController::class, 'exportPdf'])->name('bangunkeluarga.export.Pdf');
Route::get('/konfliksosial/export/pdf', [IbuHamilController::class, 'exportPdf'])->name('konfliksosial.export.pdf');
Route::get('/konfliksosial/export/csv', [IbuHamilController::class, 'exportCsv'])->name('konfliksosial.export.csv');
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
    Route::get('/konfliksosial', [KonflikSosialController::class, 'index'])->name('konfliksosial.index');
    Route::get('/konfliksosial/create', [KonflikSosialController::class, 'create'])->name('konfliksosial.create');
    Route::post('/konfliksosial', [KonflikSosialController::class, 'store'])->name('konfliksosial.store');
    Route::get('/konfliksosial/{id}', [KonflikSosialController::class, 'show'])->name('konfliksosial.show');
    Route::get('/konfliksosial/{id}/edit', [KonflikSosialController::class, 'edit'])->name('konfliksosial.edit');
    Route::put('/konfliksosial/{id}', [KonflikSosialController::class, 'update'])->name('konfliksosial.update');

// Untuk hapus data juga sekalian
    Route::delete('/konfliksosial/{id}', [KonflikSosialController::class, 'destroy'])->name('konfliksosial.destroy');
});

//amd pembangunan
use App\Http\Controllers\AdmPembangunanController;

Route::resource('admin-pembangunan', AdmPembangunanController::class)->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('/admpembangunan', [AdmpembangunanController::class, 'index'])->name('admpembangunan.index');
    Route::get('/admpembangunan/create', [AdmpembangunanController::class, 'create'])->name('admpembangunan.create');
    Route::post('/admpembangunan', [AdmpembangunanController::class, 'store'])->name('admpembangunan.store');
    Route::get('/admpembangunan/{id}', [AdmpembangunanController::class, 'show'])->name('admpembangunan.show');
    Route::get('/admpembangunan/{id}/edit', [AdmpembangunanController::class, 'edit'])->name('admpembangunan.edit');
    Route::put('/admpembangunan/{id}', [AdmpembangunanController::class, 'update'])->name('admpembangunan.update');

// Untuk hapus data juga sekalian
    Route::delete('/admpembangunan/{id}', [AdmpembangunanController::class, 'destroy'])->name('admpembangunan.destroy');
});



