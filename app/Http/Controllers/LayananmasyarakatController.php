<?php

namespace App\Http\Controllers;

use App\Models\LayananMasyarakat;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LayananMasyarakatController extends Controller
{
    public function index(Request $request)
    {
        $query = LayananMasyarakat::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $layanan = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('layananmasyarakat.index', compact('layanan'));
    }

    public function create()
    {
        $users = User::all();
        return view('layananmasyarakat.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            // Indikator layanan berupa boolean (Ya/Tidak) dan string untuk detail lainnya
            'layanan_ktp' => 'nullable|boolean',
            'layanan_ktp_lainnya' => 'nullable|string|max:255',
            'layanan_kk' => 'nullable|boolean',
            'layanan_kk_lainnya' => 'nullable|string|max:255',
            'layanan_akta_kelahiran' => 'nullable|boolean',
            'layanan_akta_kelahiran_lainnya' => 'nullable|string|max:255',
            'layanan_akta_kematian' => 'nullable|boolean',
            'layanan_akta_kematian_lainnya' => 'nullable|string|max:255',
            'layanan_akta_perkawinan' => 'nullable|boolean',
            'layanan_akta_perkawinan_lainnya' => 'nullable|string|max:255',
            'layanan_akta_cerai' => 'nullable|boolean',
            'layanan_akta_cerai_lainnya' => 'nullable|string|max:255',
            'layanan_sim' => 'nullable|boolean',
            'layanan_sim_lainnya' => 'nullable|string|max:255',
            'layanan_stnk' => 'nullable|boolean',
            'layanan_stnk_lainnya' => 'nullable|string|max:255',
            'layanan_pbb' => 'nullable|boolean',
            'layanan_pbb_lainnya' => 'nullable|string|max:255',
            'layanan_bpjs_kesehatan' => 'nullable|boolean',
            'layanan_bpjs_kesehatan_lainnya' => 'nullable|string|max:255',
            'layanan_bpjs_ketenagakerjaan' => 'nullable|boolean',
            'layanan_bpjs_ketenagakerjaan_lainnya' => 'nullable|string|max:255',
            'layanan_kartu_keluarga_sejahtera' => 'nullable|boolean',
            'layanan_kartu_keluarga_sejahtera_lainnya' => 'nullable|string|max:255',
            'layanan_bantuan_langsung_tunai' => 'nullable|boolean',
            'layanan_bantuan_langsung_tunai_lainnya' => 'nullable|string|max:255',
            'layanan_sertifikat_tanah' => 'nullable|boolean',
            'layanan_sertifikat_tanah_lainnya' => 'nullable|string|max:255',
            'layanan_izin_usaha' => 'nullable|boolean',
            'layanan_izin_usaha_lainnya' => 'nullable|string|max:255',
            'layanan_bantuan_pendidikan' => 'nullable|boolean',
            'layanan_bantuan_pendidikan_lainnya' => 'nullable|string|max:255',
            'layanan_bantuan_kesehatan' => 'nullable|boolean',
            'layanan_bantuan_kesehatan_lainnya' => 'nullable|string|max:255',
            'layanan_pengaduan_masyarakat' => 'nullable|boolean',
            'layanan_pengaduan_masyarakat_lainnya' => 'nullable|string|max:255',
            'layanan_informasi_publik' => 'nullable|boolean',
            'layanan_informasi_publik_lainnya' => 'nullable|string|max:255',
            'layanan_pendaftaran_sekolah' => 'nullable|boolean',
            'layanan_pendaftaran_sekolah_lainnya' => 'nullable|string|max:255',
            'layanan_vaksinasi' => 'nullable|boolean',
            'layanan_vaksinasi_lainnya' => 'nullable|string|max:255',
            'layanan_posyandu' => 'nullable|boolean',
            'layanan_posyandu_lainnya' => 'nullable|string|max:255',
            'layanan_program_keluarga_berencana' => 'nullable|boolean',
            'layanan_program_keluarga_berencana_lainnya' => 'nullable|string|max:255',
            'layanan_rehabilitasi_narkoba' => 'nullable|boolean',
            'layanan_rehabilitasi_narkoba_lainnya' => 'nullable|string|max:255',
            'layanan_bantuan_hukum' => 'nullable|boolean',
            'layanan_bantuan_hukum_lainnya' => 'nullable|string|max:255',
            'layanan_pemakaman' => 'nullable|boolean',
            'layanan_pemakaman_lainnya' => 'nullable|string|max:255',
            'layanan_transportasi_sosial' => 'nullable|boolean',
            'layanan_transportasi_sosial_lainnya' => 'nullable|string|max:255',
            'layanan_penerangan_jalan' => 'nullable|boolean',
            'layanan_penerangan_jalan_lainnya' => 'nullable|string|max:255',
            'layanan_air_bersih' => 'nullable|boolean',
            'layanan_air_bersih_lainnya' => 'nullable|string|max:255',
            'status_pengajuan' => 'nullable|in:pending,proses,selesai,ditolak',
            'deskripsi_lengkap' => 'nullable|string',
            'tanggal_pengajuan' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        // Ubah nilai null boolean jadi false
        foreach ($data as $key => $value) {
            if (str_ends_with($key, '_lainnya') === false && $value === null) {
                $data[$key] = false;
            }
        }

        LayananMasyarakat::create($data);
        return redirect()->route('layananmasyarakat.index')->with('success', 'Data layanan masyarakat ditambahkan.');
    }

    public function show($id)
    {
        $item = LayananMasyarakat::with('user')->findOrFail($id);
        return view('layanan_masyarakat.show', compact('item'));
    }

    public function edit($id)
    {
        $item = LayananMasyarakat::findOrFail($id);
        $users = User::all();
        return view('layanan_masyarakat.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
{
    $item = LayananMasyarakat::findOrFail($id);

    $data = $request->validate([
        'user_id' => 'sometimes|exists:users,id',
        'layanan_ktp' => 'nullable|boolean',
        'layanan_ktp_lainnya' => 'nullable|string|max:255',
        'layanan_kk' => 'nullable|boolean',
        'layanan_kk_lainnya' => 'nullable|string|max:255',
        'layanan_akta_kelahiran' => 'nullable|boolean',
        'layanan_akta_kelahiran_lainnya' => 'nullable|string|max:255',
        'layanan_akta_kematian' => 'nullable|boolean',
        'layanan_akta_kematian_lainnya' => 'nullable|string|max:255',
        'layanan_akta_perkawinan' => 'nullable|boolean',
        'layanan_akta_perkawinan_lainnya' => 'nullable|string|max:255',
        'layanan_akta_cerai' => 'nullable|boolean',
        'layanan_akta_cerai_lainnya' => 'nullable|string|max:255',
        'layanan_sim' => 'nullable|boolean',
        'layanan_sim_lainnya' => 'nullable|string|max:255',
        'layanan_stnk' => 'nullable|boolean',
        'layanan_stnk_lainnya' => 'nullable|string|max:255',
        'layanan_pbb' => 'nullable|boolean',
        'layanan_pbb_lainnya' => 'nullable|string|max:255',
        'layanan_bpjs_kesehatan' => 'nullable|boolean',
        'layanan_bpjs_kesehatan_lainnya' => 'nullable|string|max:255',
        'layanan_bpjs_ketenagakerjaan' => 'nullable|boolean',
        'layanan_bpjs_ketenagakerjaan_lainnya' => 'nullable|string|max:255',
        'layanan_kartu_keluarga_sejahtera' => 'nullable|boolean',
        'layanan_kartu_keluarga_sejahtera_lainnya' => 'nullable|string|max:255',
        'layanan_bantuan_langsung_tunai' => 'nullable|boolean',
        'layanan_bantuan_langsung_tunai_lainnya' => 'nullable|string|max:255',
        'layanan_sertifikat_tanah' => 'nullable|boolean',
        'layanan_sertifikat_tanah_lainnya' => 'nullable|string|max:255',
        'layanan_izin_usaha' => 'nullable|boolean',
        'layanan_izin_usaha_lainnya' => 'nullable|string|max:255',
        'layanan_bantuan_pendidikan' => 'nullable|boolean',
        'layanan_bantuan_pendidikan_lainnya' => 'nullable|string|max:255',
        'layanan_bantuan_kesehatan' => 'nullable|boolean',
        'layanan_bantuan_kesehatan_lainnya' => 'nullable|string|max:255',
        'layanan_pengaduan_masyarakat' => 'nullable|boolean',
        'layanan_pengaduan_masyarakat_lainnya' => 'nullable|string|max:255',
        'layanan_informasi_publik' => 'nullable|boolean',
        'layanan_informasi_publik_lainnya' => 'nullable|string|max:255',
        'layanan_pendaftaran_sekolah' => 'nullable|boolean',
        'layanan_pendaftaran_sekolah_lainnya' => 'nullable|string|max:255',
        'layanan_vaksinasi' => 'nullable|boolean',
        'layanan_vaksinasi_lainnya' => 'nullable|string|max:255',
        'layanan_posyandu' => 'nullable|boolean',
        'layanan_posyandu_lainnya' => 'nullable|string|max:255',
        'layanan_program_keluarga_berencana' => 'nullable|boolean',
        'layanan_program_keluarga_berencana_lainnya' => 'nullable|string|max:255',
        'layanan_rehabilitasi_narkoba' => 'nullable|boolean',
        'layanan_rehabilitasi_narkoba_lainnya' => 'nullable|string|max:255',
        'layanan_bantuan_hukum' => 'nullable|boolean',
        'layanan_bantuan_hukum_lainnya' => 'nullable|string|max:255',
        'layanan_pemakaman' => 'nullable|boolean',
        'layanan_pemakaman_lainnya' => 'nullable|string|max:255',
        'layanan_transportasi_sosial' => 'nullable|boolean',
        'layanan_transportasi_sosial_lainnya' => 'nullable|string|max:255',
        'layanan_penerangan_jalan' => 'nullable|boolean',
        'layanan_penerangan_jalan_lainnya' => 'nullable|string|max:255',
        'layanan_air_bersih' => 'nullable|boolean',
        'layanan_air_bersih_lainnya' => 'nullable|string|max:255',
        'status_pengajuan' => 'sometimes|in:pending,proses,selesai,ditolak',
        'deskripsi_lengkap' => 'nullable|string',
        'tanggal_pengajuan' => 'nullable|date',
        'tanggal_selesai' => 'nullable|date',
    ]);

    

    // Ubah nilai null boolean jadi false
    foreach ($data as $key => $value) {
        if (str_ends_with($key, '_lainnya') === false && $value === null) {
            $data[$key] = false;
        }
    }

    // Update data
    $item->update($data);

    return redirect()->route('layananmasyarakat.index')->with('success', 'Data layanan masyarakat diperbarui.');
}
}