<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    KeluargaController,
    DasarKeluargaController,
    AsetKeluargaController,
    AsetLahanController,
    AsetTernakController,
    UsahaArtController,
    SosialEkonomiController,
    BantuanSosialController,
    AnggotaKeluargaController,
    PenyewaanLahanController,
    IbuHamilController,
    BayiController,
    SuratController,
    JenisSuratController,
    SarpraskerjaController,
    BangunKeluargaController,
    UmkmController,
    LayananMasyarakatController,
    KesejahteraanKeluargaController,
    AdmpembangunanController,
    KelahiranController,
    KonflikSosialController,
    ReportController,
    NamaHewanController,
    JenisHewanController,
    DashboardController
};

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

    // Export PDF/CSV tambahan
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
    Route::get('/layanan-masyarakat/export/csv', [LayananMasyarakatController::class, 'exportCsv'])->name('layanan-masyarakat.export.csv');
    Route::get('/layanan-masyarakat/export/pdf', [LayananMasyarakatController::class, 'exportPdf'])->name('layanan-masyarakat.export.pdf');
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




