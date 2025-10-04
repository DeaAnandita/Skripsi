<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index(Request $request)
    {
        $query = Keluarga::query();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where('no_kk', 'like', "%{$s}%")
                  ->orWhere('kepala_keluarga', 'like', "%{$s}%");
        }

        $keluargas = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('keluarga.index', compact('keluargas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_kk' => 'required|string|unique:keluarga,no_kk',
            'kepala_keluarga' => 'required|string|max:255',
            'dusun' => 'nullable|string|max:255',
            'rt' => 'nullable|string|max:20',
            'rw' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:1000',
        ]);

        Keluarga::create($validated);

        return redirect()->route('keluarga.index')->with('success', 'Data keluarga berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $keluarga = Keluarga::findOrFail($id);

        $validated = $request->validate([
            'no_kk' => 'required|string|unique:keluarga,no_kk,' . $keluarga->id,
            'kepala_keluarga' => 'required|string|max:255',
            'dusun' => 'nullable|string|max:255',
            'rt' => 'nullable|string|max:20',
            'rw' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:1000',
        ]);

        $keluarga->update($validated);

        return redirect()->route('keluarga.index')->with('success', 'Data keluarga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $keluarga = Keluarga::findOrFail($id);
        $keluarga->delete();

        return redirect()->route('keluarga.index')->with('success', 'Data keluarga berhasil dihapus.');
    }
}
