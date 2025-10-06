<?php

namespace App\Http\Controllers;

use App\Models\LembagaDesa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LembagaDesaController extends Controller
{
    public function index(Request $request)
    {
        $query = LembagaDesa::query();

        // Filter berdasarkan dusun jika ada
        if ($request->filled('dusun')) {
            $query->where('dusun', 'like', "%{$request->dusun}%");
        }

        // Filter berdasarkan nama lembaga (Pemerintah Desa atau BPD)
        if ($request->filled('nama_lembaga')) {
            $query->where('nama_lembaga', $request->nama_lembaga);
        }

        // Pencarian berdasarkan keterangan
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('keterangan', 'like', "%$search%")
                  ->orWhere('dusun', 'like', "%$search%");
        }

        $lembaga = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('lembaga-desa.index', compact('lembaga'));
    }

    public function create()
    {
        return view('lembaga-desa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lembaga' => 'required|in:Pemerintah Desa,BPD',
            'dusun' => 'nullable|string|max:255',
            'struktur_jabatan' => 'nullable|array',
            'keterangan' => 'nullable|string|max:1000',
        ], [
            'nama_lembaga.required' => 'Jenis lembaga wajib dipilih.',
            'nama_lembaga.in' => 'Jenis lembaga tidak valid.',
        ]);

        $strukturJabatan = [];
        foreach (['Kepala Desa', 'Sekretaris Desa', 'Kaur Keuangan', 'Kepala Dusun', 'Ketua BPD'] as $jabatan) {
            $strukturJabatan[$jabatan] = $request->input("struktur_jabatan.$jabatan", 0) ? 1 : 0;
        }

        LembagaDesa::create([
            'nama_lembaga' => $validated['nama_lembaga'],
            'dusun' => $validated['dusun'] ?? null,
            'struktur_jabatan' => json_encode($strukturJabatan),
            'keterangan' => $validated['keterangan'] ?? null,
        ]);

        return redirect()->route('lembaga-desa.index')
            ->with('success', 'Data lembaga desa berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = LembagaDesa::findOrFail($id);
        return view('lembaga_desa.show', compact('item'));
    }

    public function edit($id)
    {
        $item = LembagaDesa::findOrFail($id);
        return view('lembaga_desa.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = LembagaDesa::findOrFail($id);

        $data = $request->validate([
            'nama_lembaga' => 'required|in:Pemerintah Desa,BPD',
            'dusun' => 'nullable|string|max:255',
            'struktur_jabatan' => 'nullable|array',
            'keterangan' => 'nullable|string|max:1000',
        ], [
            'nama_lembaga.required' => 'Jenis lembaga wajib dipilih.',
            'nama_lembaga.in' => 'Jenis lembaga tidak valid.',
        ]);

        $strukturJabatan = [];
        foreach (['Kepala Desa', 'Sekretaris Desa', 'Kaur Keuangan', 'Kepala Dusun', 'Ketua BPD'] as $jabatan) {
            $strukturJabatan[$jabatan] = $request->input("struktur_jabatan.$jabatan", 0) ? 1 : 0;
        }

        $item->update([
            'nama_lembaga' => $data['nama_lembaga'],
            'dusun' => $data['dusun'] ?? null,
            'struktur_jabatan' => json_encode($strukturJabatan),
            'keterangan' => $data['keterangan'] ?? null,
        ]);

        return redirect()->route('lembaga-desa.index')
            ->with('success', 'Data lembaga desa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = LembagaDesa::findOrFail($id);
        $item->delete();
        return redirect()->route('lembaga-desa.index')
            ->with('success', 'Data lembaga desa berhasil dihapus.');
    }

    public function exportPdf()
    {
        $data = LembagaDesa::all();
        $pdf = Pdf::loadView('lembaga_desa.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('lembaga_desa.pdf');
    }
}