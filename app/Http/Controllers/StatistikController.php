<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function getData()
    {
        // Contoh ambil data dari tabel 'penduduk' dan 'aset_desa'
        $jumlahPenduduk = DB::table('dasar_keluargas')->count();
        $jumlahKeluarga = DB::table('dasar-keluarga')->count();
        $jumlahAset = DB::table('aset_keluarga')->count();
        $jumlahLahan = DB::table('lahan')->count();

        return response()->json([
            'dasar_keluargas' => $jumlahPenduduk,
            'keluarga' => $jumlahKeluarga,
            'aset' => $jumlahAset,
            'lahan' => $jumlahLahan,
        ]);
    }
}
