<?php

namespace App\Http\Controllers;

use App\Models\AsetKeluarga;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AsetKeluargaController extends Controller
{
    public function index(Request $request)
    {
        $query = AsetKeluarga::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $aset = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('aset_keluarga.index', compact('aset'));
    }

    public function create()
    {
        $users = User::all();
        return view('aset_keluarga.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',

            // semua indikator aset berupa pilihan Ya/Tidak/Lainnya
            'tabung_gas' => 'nullable|string',
            'komputer_laptop' => 'nullable|string',
            'tv_elektronik' => 'nullable|string',
            'ac_pendingin' => 'nullable|string',
            'kulkas' => 'nullable|string',
            'water_heater' => 'nullable|string',
            'rumah_tempat_lain' => 'nullable|string',
            'diesel_listrik' => 'nullable|string',
            'sepeda_motor' => 'nullable|string',
            'mobil_pribadi' => 'nullable|string',
            'perahu_bermotor' => 'nullable|string',
            'kapal_barang' => 'nullable|string',
            'kapal_penumpang' => 'nullable|string',
            'kapal_pesiar' => 'nullable|string',
            'helikopter_pribadi' => 'nullable|string',
            'pesawat_pribadi' => 'nullable|string',
            'ternak_besar' => 'nullable|string',
            'ternak_kecil' => 'nullable|string',
            'hiasan_emas' => 'nullable|string',
            'tabungan_bank' => 'nullable|string',
            'surat_berharga' => 'nullable|string',
            'sertifikat_deposito' => 'nullable|string',
            'sertifikat_tanah' => 'nullable|string',
            'sertifikat_bangunan' => 'nullable|string',
            'perusahaan_industri_besar' => 'nullable|string',
            'perusahaan_industri_menengah' => 'nullable|string',
            'perusahaan_industri_kecil' => 'nullable|string',
            'usaha_perikanan' => 'nullable|string',
            'usaha_peternakan' => 'nullable|string',
            'usaha_perkebunan' => 'nullable|string',
            'usaha_pasar_swalayan' => 'nullable|string',
            'usaha_di_pasar_swalayan' => 'nullable|string',
            'usaha_di_pasar_tradisional' => 'nullable|string',
            'usaha_di_pasar_desa' => 'nullable|string',
            'usaha_transportasi' => 'nullable|string',
            'saham_perusahaan' => 'nullable|string',
            'pelanggan_telkom' => 'nullable|string',
            'hp_gsm' => 'nullable|string',
            'hp_cdma' => 'nullable|string',
            'usaha_wartel' => 'nullable|string',
            'parabola' => 'nullable|string',
            'berlangganan_koran' => 'nullable|string',
        ]);

        // ubah nilai null jadi "Tidak"
        // foreach ($data as $key => $value) {
        //     if ($value === null) {
        //         $data[$key] = 'Tidak';
        //     }
        // }

        AsetKeluarga::create($data);
        return redirect()->route('aset-keluarga.index')->with('success', 'Data aset keluarga ditambahkan.');
    }

    public function show($id)
    {
        $item = AsetKeluarga::with('user')->findOrFail($id);
        return view('aset_keluarga.show', compact('item'));
    }

    public function edit($id)
    {
        $item = AsetKeluarga::findOrFail($id);
        $users = User::all();
        return view('aset_keluarga.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = AsetKeluarga::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            // indikator sama dengan store()
            'tabung_gas' => 'nullable|string',
            'komputer_laptop' => 'nullable|string',
            'tv_elektronik' => 'nullable|string',
            'ac_pendingin' => 'nullable|string',
            'kulkas' => 'nullable|string',
            'water_heater' => 'nullable|string',
            'rumah_tempat_lain' => 'nullable|string',
            'diesel_listrik' => 'nullable|string',
            'sepeda_motor' => 'nullable|string',
            'mobil_pribadi' => 'nullable|string',
            'perahu_bermotor' => 'nullable|string',
            'kapal_barang' => 'nullable|string',
            'kapal_penumpang' => 'nullable|string',
            'kapal_pesiar' => 'nullable|string',
            'helikopter_pribadi' => 'nullable|string',
            'pesawat_pribadi' => 'nullable|string',
            'ternak_besar' => 'nullable|string',
            'ternak_kecil' => 'nullable|string',
            'hiasan_emas' => 'nullable|string',
            'tabungan_bank' => 'nullable|string',
            'surat_berharga' => 'nullable|string',
            'sertifikat_deposito' => 'nullable|string',
            'sertifikat_tanah' => 'nullable|string',
            'sertifikat_bangunan' => 'nullable|string',
            'perusahaan_industri_besar' => 'nullable|string',
            'perusahaan_industri_menengah' => 'nullable|string',
            'perusahaan_industri_kecil' => 'nullable|string',
            'usaha_perikanan' => 'nullable|string',
            'usaha_peternakan' => 'nullable|string',
            'usaha_perkebunan' => 'nullable|string',
            'usaha_pasar_swalayan' => 'nullable|string',
            'usaha_di_pasar_swalayan' => 'nullable|string',
            'usaha_di_pasar_tradisional' => 'nullable|string',
            'usaha_di_pasar_desa' => 'nullable|string',
            'usaha_transportasi' => 'nullable|string',
            'saham_perusahaan' => 'nullable|string',
            'pelanggan_telkom' => 'nullable|string',
            'hp_gsm' => 'nullable|string',
            'hp_cdma' => 'nullable|string',
            'usaha_wartel' => 'nullable|string',
            'parabola' => 'nullable|string',
            'berlangganan_koran' => 'nullable|string',
        ]);

        $item->update($data);
        return redirect()->route('aset-keluarga.index')->with('success', 'Data aset keluarga diupdate.');
    }

    public function destroy($id)
    {
        $item = AsetKeluarga::findOrFail($id);
        $item->delete();
        return redirect()->route('aset-keluarga.index')->with('success', 'Data aset keluarga dihapus.');
    }

    public function exportPdf()
    {
        $data = AsetKeluarga::with('user')->get();
        $pdf = Pdf::loadView('aset_keluarga.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('aset_keluarga.pdf');
    }
}
