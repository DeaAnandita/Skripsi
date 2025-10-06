<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = Umkm::with('user');
        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name','like',"%$search%");
            });
        }
        $umkm = $query->orderBy('created_at','desc')->paginate(5);
        return view('umkm.index', compact('umkm'));
    }

    public function create()
    {
        $users = User::all();
        return view('umkm.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'Koperasi' => 'nullable|string',
            'Unit_Usaha_Simpan_Pinjam' => 'nullable|string',
            'Industri_Kerajinan_Tangan' => 'nullable|string',
            'Industri_Pakaian' => 'nullable|string',
            'Industri_Usaha_Makanan' => 'nullable|string',
            'Industri_Alat_Rumah_Tangga' => 'nullable|string',
            'Industri_Usaha_Bahan_Bangunan' => 'nullable|string',
            'Industri_Alat_Pertanian' => 'nullable|string',
            'Restoran'=> 'nullable|string',
        ]);

        foreach (['Koperasi','Unit_Usaha_Simpan_Pinjam','Industri_Kerajinan_Tangan','Industri_Pakaian','Industri_Usaha_Makanan','Industri_Alat_Rumah_Tangga','Industri_Usaha_Bahan_Bangunan','Industri_Alat_Pertanian','Restoran'] as $field) {
            if (empty($data[$field])) {
                $data[$field] = 'Tidak';
            }
        }

        umkm::create($data);
        return redirect()->route('umkm.index')->with('success', 'Data UMKM ditambahkan.');
    }

    public function show($id)
    {
        $item = Umkm::with('user')->findOrFail($id);
        return view('umkm.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Umkm::findOrFail($id);
        $users = User::all();
        return view('umkm.edit', compact('item','users'));
    }

    public function update(Request $request, $id)
    {
        $item = Umkm::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'Koperasi' => 'nullable|string',
            'Unit_Usaha_Simpan_Pinjam' => 'nullable|string',
            'Industri_Kerajinan_Tangan' => 'nullable|string',
            'Industri_Pakaian' => 'nullable|string',
            'Industri_Usaha_Makanan' => 'nullable|string',
            'Industri_Alat_Rumah_Tangga' => 'nullable|string',
            'Industri_Usaha_Bahan_Bangunan' => 'nullable|string',
            'Industri_Alat_Pertanian' => 'nullable|string',
            'Restoran'=> 'nullable|string',
        ]);

        $item->update($data);
        return redirect()->route('umkm.index')->with('success', 'Data UMKM diupdate.');
    }

    public function destroy($id)
    {
        $item = Umkm::findOrFail($id);
        $item->delete();
        return redirect()->route('umkm.index')->with('success', 'Data UMKM dihapus.');
    }

    public function exportPdf()
    {
        $data = Umkm::with('user')->get();
        $pdf = Pdf::loadView('umkm.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('umkm.pdf');
    }
}
