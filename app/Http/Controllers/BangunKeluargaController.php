<?php

namespace App\Http\Controllers;

use App\Models\BangunKeluarga;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BangunKeluargaController extends Controller
{
    public function index(Request $request)
    {
        $query = BangunKeluarga::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $bangun = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('bangunkeluarga.index', compact('bangun'));
    }

    public function create()
    {
        $users = User::all();
        return view('bangunkeluarga.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',

            // Indikator sesuai migration bangun_keluargas
            'pakaian_berbeda' => 'nullable|string',
            'ikut_kb' => 'nullable|string',
            'ikut_kegiatan_rt' => 'nullable|string',
            'ikut_posyandu' => 'nullable|string',
            'remaja_ikut_pik' => 'nullable|string',
            'anggota_merokok' => 'nullable|string',
            'anak_mengemisi' => 'nullable|string',
            'anggota_cacat_fisik' => 'nullable|string',
            'makan_protein' => 'nullable|string',
            'memiliki_tabungan' => 'nullable|string',
            'akses_informasi' => 'nullable|string',
            'ikut_bkb' => 'nullable|string',
            'ikut_bkl' => 'nullable|string',
            'ikut_bkr' => 'nullable|string',
            'ikut_uppks' => 'nullable|string',
            'ibadah_sesuai_agama' => 'nullable|string',
            'komunikasi_keluarga' => 'nullable|string',
            'pengurus_kegiatan_sosial' => 'nullable|string',
            'lansia_diatas_60' => 'nullable|string',
            'anak_jalanan' => 'nullable|string',
            'pengemis' => 'nullable|string',
            'pengamen' => 'nullable|string',
            'gila_stres' => 'nullable|string',
            'kelainan_kulit' => 'nullable|string',
        ]);

        BangunKeluarga::create($data);
        return redirect()->route('bangunkeluarga.index')->with('success', 'Data bangun keluarga berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = BangunKeluarga::with('user')->findOrFail($id);
        return view('bangunkeluarga.show', compact('item'));
    }

    public function edit($id)
    {
        $item = BangunKeluarga::findOrFail($id);
        $users = User::all();
        return view('bangunkeluarga.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = BangunKeluarga::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',

            // Indikator sama dengan store()
            'pakaian_berbeda' => 'nullable|string',
            'ikut_kb' => 'nullable|string',
            'ikut_kegiatan_rt' => 'nullable|string',
            'ikut_posyandu' => 'nullable|string',
            'remaja_ikut_pik' => 'nullable|string',
            'anggota_merokok' => 'nullable|string',
            'anak_mengemisi' => 'nullable|string',
            'anggota_cacat_fisik' => 'nullable|string',
            'makan_protein' => 'nullable|string',
            'memiliki_tabungan' => 'nullable|string',
            'akses_informasi' => 'nullable|string',
            'ikut_bkb' => 'nullable|string',
            'ikut_bkl' => 'nullable|string',
            'ikut_bkr' => 'nullable|string',
            'ikut_uppks' => 'nullable|string',
            'ibadah_sesuai_agama' => 'nullable|string',
            'komunikasi_keluarga' => 'nullable|string',
            'pengurus_kegiatan_sosial' => 'nullable|string',
            'lansia_diatas_60' => 'nullable|string',
            'anak_jalanan' => 'nullable|string',
            'pengemis' => 'nullable|string',
            'pengamen' => 'nullable|string',
            'gila_stres' => 'nullable|string',
            'kelainan_kulit' => 'nullable|string',
        ]);

        $item->update($data);
        return redirect()->route('bangunkeluarga.index')->with('success', 'Data bangun keluarga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = BangunKeluarga::findOrFail($id);
        $item->delete();
        return redirect()->route('bangunkeluarga.index')->with('success', 'Data bangun keluarga berhasil dihapus.');
    }

    public function exportPdf()
    {
        $data = BangunKeluarga::with('user')->get();
        $pdf = Pdf::loadView('bangunkeluarga.report.Pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('bangunkeluarga.pdf');
    }
}
