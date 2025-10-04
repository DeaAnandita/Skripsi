<?php

namespace App\Http\Controllers;

use App\Models\DasarKeluarga;
use App\Models\User;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DasarKeluargaController extends Controller
{
    public function index(Request $request)
    {
        $query = DasarKeluarga::with(['user', 'kartuKeluarga']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('kartuKeluarga', function ($q) use ($search) {
                $q->where('no_kk', 'like', "%$search%")
                  ->orWhere('nama_kepala_keluarga', 'like', "%$search%");
            })
            ->orWhere('kepala_rumah_tangga', 'like', "%$search%");
        }

        $dasar = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('dasar_keluarga.index', compact('dasar'));
    }

    public function create()
    {
        $users = User::all();
        $keluarga = Keluarga::all();
        return view('dasar_keluarga.create', compact('users', 'keluarga'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'no_kk' => 'required|exists:keluarga,id',
            'jenis_mutasi' => 'required',
            'tanggal_mutasi' => 'required|date',
            'kepala_rumah_tangga' => 'required',
            'dusun' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'alamat_lengkap' => 'required',
            'provinsi' => 'nullable',
            'kabupaten' => 'nullable',
            'kecamatan' => 'nullable',
            'desa' => 'nullable',
        ]);

        DasarKeluarga::create($data);
        return redirect()->route('dasar-keluarga.index')->with('success', 'Data dasar keluarga berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = DasarKeluarga::with(['user', 'kartuKeluarga'])->findOrFail($id);
        return view('dasar_keluarga.show', compact('item'));
    }

    public function edit($id)
    {
        $item = DasarKeluarga::findOrFail($id);
        $users = User::all();
        $keluarga = Keluarga::all();
        return view('dasar_keluarga.edit', compact('item', 'users', 'keluarga'));
    }

    public function update(Request $request, $id)
    {
        $item = DasarKeluarga::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'no_kk' => 'required|exists:keluarga,id',
            'jenis_mutasi' => 'required',
            'tanggal_mutasi' => 'required|date',
            'kepala_rumah_tangga' => 'required',
            'dusun' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'alamat_lengkap' => 'required',
            'provinsi' => 'nullable',
            'kabupaten' => 'nullable',
            'kecamatan' => 'nullable',
            'desa' => 'nullable',
        ]);

        $item->update($data);
        return redirect()->route('dasar-keluarga.index')->with('success', 'Data dasar keluarga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = DasarKeluarga::findOrFail($id);
        $item->delete();
        return redirect()->route('dasar-keluarga.index')->with('success', 'Data dasar keluarga berhasil dihapus.');
    }

    public function exportPdf()
    {
        $data = DasarKeluarga::with(['user', 'kartuKeluarga'])->get();
        $pdf = Pdf::loadView('dasar_keluarga.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('dasar_keluarga.pdf');
    }
}
