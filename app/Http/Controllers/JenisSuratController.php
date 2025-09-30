<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = JenisSurat::latest()->paginate(10);
        return view('LayananUmum.master-data.JenisSurat.index', compact('jenis'));
    }

    public function create()
    {
        return view('LayananUmum.master-data.JenisSurat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|unique:jenis_surats',
            'deskripsi' => 'nullable'
        ]);

        JenisSurat::create($request->all());
        return redirect()->route('jenis-surat.index')->with('success', 'Jenis surat berhasil ditambahkan');
    }

    public function edit(JenisSurat $jenis_surat)
    {
        return view('LayananUmum.master-data.JenisSurat.edit', compact('jenis_surat'));
    }

    public function update(Request $request, JenisSurat $jenis_surat)
    {
        $request->validate([
            'nama_jenis' => 'required|unique:jenis_surats,nama_jenis,' . $jenis_surat->id,
            'deskripsi' => 'nullable'
        ]);

        $jenis_surat->update($request->all());
        return redirect()->route('jenis-surat.index')->with('success', 'Jenis surat berhasil diupdate');
    }

    public function destroy(JenisSurat $jenis_surat)
    {
        $jenis_surat->delete();
        return redirect()->route('jenis-surat.index')->with('success', 'Jenis surat berhasil dihapus');
    }
}
