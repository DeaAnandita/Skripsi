<?php

namespace App\Http\Controllers;

use App\Models\DasarKeluarga;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DasarKeluargaController extends Controller
{
    public function index(Request $request)
    {
        $query = DasarKeluarga::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $dasar = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('dasar_keluarga.index', compact('dasar'));
    }

    public function create()
    {
        $users = User::all();
        return view('dasar_keluarga.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',

            // semua indikator aset berupa pilihan Ya/Tidak/Lainnya
            'jenis_mutasi' => 'nullable|string',
            'tanggal_mutasi' => 'nullable|string',
            'nomor_dtks/id_bdt' => 'nullable|string',
            'kepala_rumah_tangga' => 'nullable|string',
            'dusun/lingkungan' => 'nullable|string',
            'rw' => 'nullable|string',
            'rt' => 'nullable|string',
            'alamat_lengkap' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'kecamatan' => 'nullable|string',
        ]);

        // ubah nilai null jadi "Tidak"
        // foreach ($data as $key => $value) {
        //     if ($value === null) {
        //         $data[$key] = 'Tidak';
        //     }
        // }

        DasarKeluarga::create($data);
        return redirect()->route('dasar-keluarga.index')->with('success', 'Data dasar keluarga ditambahkan.');
    }

    public function show($id)
    {
        $item = DasarKeluarga::with('user')->findOrFail($id);
        return view('dasar_keluarga.show', compact('item'));
    }

    public function edit($id)
    {
        $item = DasarKeluarga::findOrFail($id);
        $users = User::all();
        return view('dasar_keluarga.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = DasarKeluarga::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            // indikator sama dengan store()
            'jenis_mutasi' => 'nullable|string',
            'tanggal_mutasi' => 'nullable|string',
            'nomor_dtks/id_bdt' => 'nullable|string',
            'kepala_rumah_tangga' => 'nullable|string',
            'dusun/lingkungan' => 'nullable|string',
            'rw' => 'nullable|string',
            'rt' => 'nullable|string',
            'alamat_lengkap' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'kecamatan' => 'nullable|string',
        ]);

        $item->update($data);
        return redirect()->route('dasar-keluarga.index')->with('success', 'Data dasar keluarga diupdate.');
    }

    public function destroy($id)
    {
        $item = DasarKeluarga::findOrFail($id);
        $item->delete();
        return redirect()->route('dasar-keluarga.index')->with('success', 'Data dasar keluarga dihapus.');
    }

    public function exportPdf()
    {
        $data = DasarKeluarga::with('user')->get();
        $pdf = Pdf::loadView('dasar_keluarga.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('dasar_keluarga.pdf');
    }
}