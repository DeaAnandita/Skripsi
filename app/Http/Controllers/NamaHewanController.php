<?php

namespace App\Http\Controllers;

use App\Models\NamaHewan;
use Illuminate\Http\Request;

class NamaHewanController extends Controller
{
    public function index()
    {
        $data = NamaHewan::all();
        return view('aset_ternak.namahewan.index', compact('data'));
    }

    public function create()
    {
        return view('aset_ternak.namahewan.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:100']);
        NamaHewan::create($request->all());
        return redirect()->route('nama-hewan.index')->with('success', 'Nama Hewan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $namahewan = NamaHewan::findOrFail($id);
        return view('aset_ternak.namahewan.edit', compact('namahewan'));
    }

    public function update(Request $request, $id)
    {
        $namahewan = NamaHewan::findOrFail($id);
        $request->validate(['nama' => 'required|string|max:100']);
        $namahewan->update($request->all());

        return redirect()->route('nama-hewan.index')->with('success', 'Nama Hewan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $namahewan = NamaHewan::findOrFail($id);
        $namahewan->delete();

        return redirect()->route('nama-hewan.index')->with('success', 'Nama Hewan berhasil dihapus');
    }
}
