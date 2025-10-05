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

// Halaman awal
Route::get('/', fn() => view('welcome'));
Route::get('/statistik-data', [DashboardController::class, 'getStatistik'])->name('statistik.data');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profil user
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Semua CRUD pakai resource
    Route::resources([
        'keluarga' => KeluargaController::class,
        'dasar-keluarga' => DasarKeluargaController::class,
        'aset-keluarga' => AsetKeluargaController::class,
        'aset-lahan' => AsetLahanController::class,
        'aset-ternak' => AsetTernakController::class,
        'usaha-art' => UsahaArtController::class,
        'sosial-ekonomi' => SosialEkonomiController::class,
        'bantuan-sosial' => BantuanSosialController::class,
        'anggota-keluarga' => AnggotaKeluargaController::class,
        'penyewaan-lahan' => PenyewaanLahanController::class,
        'ibu-hamil' => IbuHamilController::class,
        'bayi' => BayiController::class,
        'surat-online' => SuratController::class,
        'jenis-surat' => JenisSuratController::class,
        'sarpras-kerja' => SarpraskerjaController::class,
        'bangun-keluarga' => BangunKeluargaController::class,
        'umkm' => UmkmController::class,
        'layanan-masyarakat' => LayananMasyarakatController::class,
        'kesejahteraan-keluarga' => KesejahteraanKeluargaController::class,
        'admpembangunan' => AdmpembangunanController::class,
        'kelahiran' => KelahiranController::class,
        'konflik-sosial' => KonflikSosialController::class,
        'nama-hewan' => NamaHewanController::class,
        'jenis-hewan' => JenisHewanController::class,
        'reports' => ReportController::class,
    ]);

    Route::get('/menu-daftarkeluarga', [KeluargaController::class, 'index'])
    ->name('menu-daftarkeluarga');

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
});

    //Menu-menu

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
    // Route::get('/data-keluarga', function () {
    //     return view('data-keluarga');
    // })->name('menu.data-keluarga');

    //Menu Layanan Umum
    Route::get('/menu-LayananUmum', function () {
        return view('LayananUmum.menu-LayananUmum');
    })->name('menu-LayananUmum');

    Route::middleware(['auth'])->group(function () {
        Route::get('/menu-master data', function () {
            return view('menu-master-data');
        })->name('menu-master-data');
    });

    //Menu Layanan Umum
    Route::get('/menu-LayananUmum', function () {
        return view('LayananUmum.menu-LayananUmum');
    })->name('menu-LayananUmum');

    // Menu buat soal survey (voice)
    Route::get('/buat-soal', function () {
        return view('buat-soal');
    })->name('buat-soal');

    require __DIR__.'/auth.php';
