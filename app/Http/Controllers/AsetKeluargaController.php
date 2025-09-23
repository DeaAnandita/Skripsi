<?php
namespace App\Http\Controllers;

use App\Models\AsetKeluarga;
use App\Models\User;
use Illuminate\Http\Request;

class AsetKeluargaController extends Controller
{
    public function index()
    {
        $aset = AsetKeluarga::with('user')->get();
        return view('aset_keluarga.index', compact('aset'));
    }

    public function create()
    {
        $users = User::all();
        return view('aset_keluarga.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'=>'required|exists:users,id',
            'nama_aset'=>'required|string|max:150',
            'kategori'=>'required|in:Rumah,Kendaraan,Tabungan,Usaha,Elektronik,Lainnya',
            'nilai_aset'=>'nullable|numeric',
            'tahun_perolehan'=>'nullable|digits:4',
            'status_aset'=>'required|in:Aktif,Dijual,Dipakai,Rusak,Hilangan',
            'deskripsi'=>'nullable|string',
            'dokumen_ids'=>'nullable|array'
        ]);

        $data['dokumen_ids'] = json_encode($data['dokumen_ids'] ?? []);

        AsetKeluarga::create($data);

        return redirect()->route('aset-keluarga.index')->with('success','Aset keluarga ditambahkan');
    }

    public function show($id)
    {
        $item = AsetKeluarga::with('user')->findOrFail($id);
        return view('aset_keluarga.show', compact('item'));
    }

    public function edit($id)
    {
        $item = AsetKeluarga::findOrFail($id);
        $users = User::all();
        return view('aset_keluarga.edit', compact('item','users'));
    }

    public function update(Request $request, $id)
    {
        $item = AsetKeluarga::findOrFail($id);

        $data = $request->validate([
            'user_id'=>'sometimes|exists:users,id',
            'nama_aset'=>'sometimes|string|max:150',
            'kategori'=>'sometimes|in:Rumah,Kendaraan,Tabungan,Usaha,Elektronik,Lainnya',
            'nilai_aset'=>'nullable|numeric',
            'tahun_perolehan'=>'nullable|digits:4',
            'status_aset'=>'sometimes|in:Aktif,Dijual,Dipakai,Rusak,Hilangan',
            'deskripsi'=>'nullable|string',
            'dokumen_ids'=>'nullable|array'
        ]);

        $data['dokumen_ids'] = json_encode($data['dokumen_ids'] ?? []);

        $item->update($data);

        return redirect()->route('aset-keluarga.index')->with('success','Aset keluarga diupdate');
    }

    public function destroy($id)
    {
        $item = AsetKeluarga::findOrFail($id);
        $item->delete();
        return redirect()->route('aset-keluarga.index')->with('success','Aset keluarga dihapus');
    }

    public function report()
    {
        $data = AsetKeluarga::with('user')->get();
        return view('aset_keluarga.report', compact('data'));
    }
}
