<?php

namespace App\Http\Controllers;

use App\Models\LayananMasyarakat;
use Illuminate\Http\Request;

class LayananMasyarakatController extends Controller
{
    // ... method CRUD sebelumnya ...

    /**
     * Display report for layanan masyarakat.
     */
    public function report(Request $request)
    {
        $query = LayananMasyarakat::with('user');

        // Apply filters
        if ($request->filled('status_pengajuan')) {
            $query->where('status_pengajuan', $request->status_pengajuan);
        }

        if ($request->filled('nama_pemohon')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->nama_pemohon . '%');
            });
        }

        if ($request->filled('tanggal_pengajuan')) {
            $query->whereDate('tanggal_pengajuan', $request->tanggal_pengajuan);
        }

        $data = $query->get();

        // Ringkasan
        $total = $data->count();

        // Per status pengajuan
        $perStatus = $data->groupBy('status_pengajuan')->map->count();

        // Per kategori layanan (hitung berdasarkan layanan yang true)
        $perKategori = collect();
        $services = [
            'layanan_ktp' => 'Administrasi Kependudukan',
            'layanan_kk' => 'Administrasi Kependudukan',
            'layanan_akta_kelahiran' => 'Administrasi Kependudukan',
            'layanan_akta_kematian' => 'Administrasi Kependudukan',
            'layanan_akta_perkawinan' => 'Administrasi Kependudukan',
            'layanan_akta_cerai' => 'Administrasi Kependudukan',
            'layanan_sim' => 'Administrasi Kendaraan',
            'layanan_stnk' => 'Administrasi Kendaraan',
            'layanan_pbb' => 'Administrasi Pajak',
            'layanan_bpjs_kesehatan' => 'Bantuan Kesehatan',
            'layanan_bpjs_ketenagakerjaan' => 'Bantuan Ketenagakerjaan',
            'layanan_kartu_keluarga_sejahtera' => 'Bantuan Sosial',
            'layanan_bantuan_langsung_tunai' => 'Bantuan Sosial',
            'layanan_sertifikat_tanah' => 'Administrasi Tanah',
            'layanan_izin_usaha' => 'Izin Usaha',
            'layanan_bantuan_pendidikan' => 'Bantuan Pendidikan',
            'layanan_bantuan_kesehatan' => 'Bantuan Kesehatan',
            'layanan_pengaduan_masyarakat' => 'Pengaduan',
            'layanan_informasi_publik' => 'Informasi Publik',
            'layanan_pendaftaran_sekolah' => 'Pendidikan',
            'layanan_vaksinasi' => 'Kesehatan Masyarakat',
            'layanan_posyandu' => 'Kesehatan Masyarakat',
            'layanan_program_keluarga_berencana' => 'Keluarga Berencana',
            'layanan_rehabilitasi_narkoba' => 'Rehabilitasi',
            'layanan_bantuan_hukum' => 'Bantuan Hukum',
            'layanan_pemakaman' => 'Layanan Pemakaman',
            'layanan_transportasi_sosial' => 'Transportasi Sosial',
            'layanan_penerangan_jalan' => 'Infrastruktur',
            'layanan_air_bersih' => 'Infrastruktur',
        ];

        foreach ($services as $field => $kategori) {
            $count = $data->filter(function ($item) use ($field) {
                return $item->$field;
            })->count();
            if ($count > 0) {
                $perKategori[$kategori] = $count;
            }
        }

        return view('layanan_masyarakat.report', compact('data', 'total', 'perStatus', 'perKategori'));
    }
}