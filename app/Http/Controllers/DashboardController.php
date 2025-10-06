<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AsetKeluarga;
use App\Models\AsetLahan;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil jumlah data dari masing-masing tabel
        $jumlahUser = User::count();
        $jumlahAsetKeluarga = AsetKeluarga::count();
        $jumlahAsetLahan = AsetLahan::count();

        // Ambil 5 data terbaru dari masing-masing tabel (buat contoh di dashboard)
        $dataKeluargaTerbaru = AsetKeluarga::latest()->take(5)->get();
        $dataLahanTerbaru = AsetLahan::latest()->take(5)->get();

        // Kirim data ke view dashboard
        return view('dashboard', compact(
            'jumlahUser',
            'jumlahAsetKeluarga',
            'jumlahAsetLahan',
            'dataKeluargaTerbaru',
            'dataLahanTerbaru'
        ));
    }
}
