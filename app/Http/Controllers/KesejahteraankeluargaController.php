<?php

namespace App\Http\Controllers;

use App\Models\KesejahteraanKeluarga;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KesejahteraanKeluargaController extends Controller
{
    public function index(Request $request)
    {
        $query = KesejahteraanKeluarga::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $kesejahteraan = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('kesejahteraankeluarga.index', compact('kesejahteraan'));
    }

    public function create()
    {
        $users = User::all();
        return view('kesejahteraankeluarga.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',

            // Indikator kesejahteraan keluarga
            'pendapatan_stabil' => 'nullable|string',
            'akses_pendidikan' => 'nullable|string',
            'akses_kesehatan' => 'nullable|string',
            'sanitasi_baik' => 'nullable|string',
            'air_bersih' => 'nullable|string',
            'listrik_rumah' => 'nullable|string',
            'pangan_cukup' => 'nullable|string',
            'tabungan_aset' => 'nullable|string',
            'jaminan_sosial' => 'nullable|string',
            'pekerjaan_keluarga' => 'nullable|string',
            'akses_internet' => 'nullable|string',
            'transportasi' => 'nullable|string',
            'rumah_layak_huni' => 'nullable|string',
            'pakaian_layak' => 'nullable|string',
        ]);

        // Ubah nilai null jadi "Tidak"
        foreach ($data as $key => $value) {
            if ($value === null) {
                $data[$key] = 'Tidak';
            }
        }

        KesejahteraanKeluarga::create($data);
        return redirect()->route('kesejahteraankeluarga.index')->with('success', 'Data kesejahteraan keluarga ditambahkan.');
    }

    public function show($id)
    {
        $item = KesejahteraanKeluarga::with('user')->findOrFail($id);
        return view('kesejahteraankeluarga.show', compact('item'));
    }

    public function edit($id)
    {
        $item = KesejahteraanKeluarga::findOrFail($id);
        $users = User::all();
        return view('kesejahteraankeluarga.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = KesejahteraanKeluarga::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'pendapatan_stabil' => 'nullable|string',
            'akses_pendidikan' => 'nullable|string',
            'akses_kesehatan' => 'nullable|string',
            'sanitasi_baik' => 'nullable|string',
            'air_bersih' => 'nullable|string',
            'listrik_rumah' => 'nullable|string',
            'pangan_cukup' => 'nullable|string',
            'tabungan_aset' => 'nullable|string',
            'jaminan_sosial' => 'nullable|string',
            'pekerjaan_keluarga' => 'nullable|string',
            'akses_internet' => 'nullable|string',
            'transportasi' => 'nullable|string',
            'rumah_layak_huni' => 'nullable|string',
            'pakaian_layak' => 'nullable|string',
        ]);

        $item->update($data);
        return redirect()->route('kesejahteraankeluarga.index')->with('success', 'Data kesejahteraan keluarga diupdate.');
    }

    public function destroy($id)
    {
        $item = KesejahteraanKeluarga::findOrFail($id);
        $item->delete();
        return redirect()->route('kesejahteraankeluarga.index')->with('success', 'Data kesejahteraan keluarga dihapus.');
    }

    public function exportPdf()
    {
        $data = KesejahteraanKeluarga::with('user')->get();
        $pdf = Pdf::loadView('kesejahteraan_keluarga.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('kesejahteraan_keluarga.pdf');
    }
}