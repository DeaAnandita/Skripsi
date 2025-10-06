<?php

namespace App\Http\Controllers;

use App\Models\PrasaranaDasar;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PrasaranaDasarController extends Controller
{
    public function index(Request $request)
    {
        $query = PrasaranaDasar::where('user_id', auth()->id()); // tampilkan hanya data surveyor ini

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('status_pemilik_bangunan', 'like', "%$search%")
                  ->orWhere('status_pemilik_lahan', 'like', "%$search%")
                  ->orWhere('jenis_fisik_bangunan', 'like', "%$search%");
        }

        $prasarana = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('prasarana_dasar.index', compact('prasarana'));
    }

    public function create()
    {
        $users = User::all();
        return view('prasarana_dasar.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_pemilik_bangunan' => 'required|string|max:255',
            'status_pemilik_lahan' => 'required|string|max:255',
            'jenis_fisik_bangunan' => 'required|string|max:255',
            'jenis_lantai' => 'required|string|max:255',
            'kondisi_lantai' => 'required|string|max:255',
            'jenis_dinding' => 'required|string|max:255',
            'kondisi_dinding' => 'required|string|max:255',
            'jenis_atap' => 'required|string|max:255',
            'kondisi_atap' => 'required|string|max:255',
            'sumber_air_minum' => 'required|string|max:255',
            'kondisi_air_minum' => 'required|string|max:255',
            'cara_memperoleh_air' => 'required|string|max:255',
            'sumber_penerangan' => 'required|string|max:255',
            'sumber_daya_terpasang' => 'required|string|max:255',
            'bahan_bakar_memasak' => 'required|string|max:255',
            'fasilitas_bab' => 'required|string|max:255',
            'pembuangan_tinja' => 'required|string|max:255',
            'pembuangan_sampah' => 'required|string|max:255',
            'manfaat_air' => 'required|string|max:255',
            'luas_lantai' => 'required|numeric|min:0',
            'jumlah_kamar' => 'required|integer|min:0',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'numeric' => ':attribute harus berupa angka.',
            'integer' => ':attribute harus berupa bilangan bulat.'
        ]);

        PrasaranaDasar::create(array_merge($validated, [
            'user_id' => auth()->id(),
        ]));

        return redirect()->route('prasarana-dasar.index')
            ->with('success', 'Data prasarana dasar berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = PrasaranaDasar::with('user')->findOrFail($id);
        return view('prasarana_dasar.show', compact('item'));
    }

    public function edit($id)
    {
        $item = PrasaranaDasar::findOrFail($id);
        $users = User::all();
        return view('prasarana_dasar.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = PrasaranaDasar::findOrFail($id);

        $data = $request->validate([
            'status_pemilik_bangunan' => 'required|string|max:255',
            'status_pemilik_lahan' => 'required|string|max:255',
            'jenis_fisik_bangunan' => 'required|string|max:255',
            'jenis_lantai' => 'required|string|max:255',
            'kondisi_lantai' => 'required|string|max:255',
            'jenis_dinding' => 'required|string|max:255',
            'kondisi_dinding' => 'required|string|max:255',
            'jenis_atap' => 'required|string|max:255',
            'kondisi_atap' => 'required|string|max:255',
            'sumber_air_minum' => 'required|string|max:255',
            'kondisi_air_minum' => 'required|string|max:255',
            'cara_memperoleh_air' => 'required|string|max:255',
            'sumber_penerangan' => 'required|string|max:255',
            'sumber_daya_terpasang' => 'required|string|max:255',
            'bahan_bakar_memasak' => 'required|string|max:255',
            'fasilitas_bab' => 'required|string|max:255',
            'pembuangan_tinja' => 'required|string|max:255',
            'pembuangan_sampah' => 'required|string|max:255',
            'manfaat_air' => 'required|string|max:255',
            'luas_lantai' => 'required|numeric|min:0',
            'jumlah_kamar' => 'required|integer|min:0',
        ]);

        $item->update($data);
        return redirect()->route('prasarana-dasar.index')
            ->with('success', 'Data prasarana dasar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = PrasaranaDasar::findOrFail($id);
        $item->delete();
        return redirect()->route('prasarana-dasar.index')
            ->with('success', 'Data prasarana dasar berhasil dihapus.');
    }

    public function exportPdf()
    {
        $data = PrasaranaDasar::with('user')->get();
        $pdf = Pdf::loadView('prasarana_dasar.report-pdf', compact('data'))
            ->setPaper('a4', 'landscape');
        return $pdf->download('prasarana_dasar.pdf');
    }
}
