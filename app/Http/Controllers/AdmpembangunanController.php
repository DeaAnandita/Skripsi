<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admpembangunan;
use Illuminate\Support\Facades\Storage;

class AdmpembangunanController extends Controller
{
    public function index()
    {
    $data = Admpembangunan::orderBy('judul', 'desc')->paginate(10); // <= pakai paginate
    return view('admpembangunan.index', compact('data'));

    }

    // Laporan (semua data)
   public function report()
{
    $data = Admpembangunan::orderBy('tanggal', 'desc')->get();
    return view('admpembangunan.report', compact('data'));
}

    public function create()
    {
        return view('admpembangunan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_buku' => 'required|string|max:255',
            'judul'      => 'required|string|max:255',
            'dokumen'    => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'tanggal'    => 'required|date',
        ]);

        $payload = $request->only(['jenis_buku', 'judul', 'tanggal']);

        if ($request->hasFile('dokumen')) {
            $payload['dokumen'] = $request->file('dokumen')->store('dokumen_pembangunan', 'public');
        }

        Admpembangunan::create($payload);

        return redirect()->route('admpembangunan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Show detail (route-model binding)
    public function show(Admpembangunan $admpembangunan)
    {
        return view('admpembangunan.show', ['item' => $admpembangunan]);
    }

    public function edit(Admpembangunan $admpembangunan)
    {
        return view('admpembangunan.edit', ['item' => $admpembangunan]);
    }

    public function update(Request $request, Admpembangunan $admpembangunan)
    {
        $request->validate([
            'jenis_buku' => 'required|string|max:255',
            'judul'      => 'required|string|max:255',
            'dokumen'    => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'tanggal'    => 'required|date',
        ]);

        $payload = $request->only(['jenis_buku', 'judul', 'tanggal']);

        if ($request->hasFile('dokumen')) {
            // hapus file lama jika ada
            if ($admpembangunan->dokumen && Storage::disk('public')->exists($admpembangunan->dokumen)) {
                Storage::disk('public')->delete($admpembangunan->dokumen);
            }
            $payload['dokumen'] = $request->file('dokumen')->store('dokumen_pembangunan', 'public');
        }

        $admpembangunan->update($payload);

        return redirect()->route('admpembangunan.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(Admpembangunan $admpembangunan)
    {
        if ($admpembangunan->dokumen && Storage::disk('public')->exists($admpembangunan->dokumen)) {
            Storage::disk('public')->delete($admpembangunan->dokumen);
        }

        $admpembangunan->delete();

        return redirect()->route('admpembangunan.index')->with('success', 'Data berhasil dihapus!');
    }
}
