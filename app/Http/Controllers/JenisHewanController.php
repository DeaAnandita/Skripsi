<?php

namespace App\Http\Controllers;

use App\Models\JenisHewan;
use App\Models\NamaHewan;
use Illuminate\Http\Request;

class JenisHewanController extends Controller
{
        public function index()
    {
        $data = JenisHewan::with('namaHewan')->get();
        return view('aset_ternak.jenishewan.index', compact('data'));
    }

    public function create()
    {
        $namaHewan = NamaHewan::all();
        return view('aset_ternak.jenishewan.create', compact('namaHewan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hewan_id' => 'required|exists:nama_hewan,id',
            'jenis' => 'required|string|max:100',
        ]);

        JenisHewan::create($request->all());
        return redirect()->route('jenis-hewan.index')->with('success', 'Jenis Hewan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jenisHewan = JenisHewan::findOrFail($id); // pastikan variabel sesuai view
        $namaHewan = NamaHewan::all();
        return view('aset_ternak.jenishewan.edit', compact('jenisHewan', 'namaHewan'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $jenisHewan = JenisHewan::findOrFail($id);

        $request->validate([
            'nama_hewan_id' => 'required|exists:nama_hewan,id',
            'jenis' => 'required|string|max:100',
        ]);

        $jenisHewan->update($request->all());

        return redirect()->route('jenis-hewan.index')
                         ->with('success', 'Jenis Hewan berhasil diperbarui');
    }

    // Hapus data
    public function destroy($id)
    {
        $jenisHewan = JenisHewan::findOrFail($id);
        $jenisHewan->delete();

        return redirect()->route('jenis-hewan.index')
                         ->with('success', 'Jenis Hewan berhasil dihapus');
    }
    // AsetTernakController.php

}
