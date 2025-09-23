<?php
namespace App\Http\Controllers;

use App\Models\AsetLahan;
use App\Models\User;
use Illuminate\Http\Request;

class AsetLahanController extends Controller {
    public function index() {
        $asetLahan = AsetLahan::with('user')->get();
        return view('aset_lahan.index', compact('asetLahan'));
    }

    public function create() {
        $users = User::all();
        return view('aset_lahan.create', compact('users'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'kode_lahan'=>'required|string|max:30|unique:aset_lahans,kode_lahan',
            'user_id'=>'nullable|exists:users,id',
            'nama_lahan'=>'required|string|max:150',
            'alamat'=>'nullable|string|max:255',
            'rt_rw'=>'nullable|string|max:20',
            'desa'=>'nullable|string|max:100',
            'kecamatan'=>'nullable|string|max:100',
            'kabupaten'=>'nullable|string|max:100',
            'provinsi'=>'nullable|string|max:100',
            'luas_m2'=>'required|numeric|min:0',
            'satuan'=>'required|in:m2,ha',
            'koordinat_lat'=>'nullable|numeric',
            'koordinat_lng'=>'nullable|numeric',
            'status'=>'nullable|in:Kosong,Digunakan,Disewa,Sengketa,Terdaftar',
            'kepemilikan'=>'nullable|in:Milik Pribadi,Milik Desa,Sewa,Pinjam Pakai',
            'nomor_sertifikat'=>'nullable|string|max:100',
            'harga_sewa_bulanan'=>'nullable|numeric|min:0',
            'irigasi'=>'nullable|boolean',
            'soil_type'=>'nullable|in:Latosol,Alluvial,Regosol,Podsolik,Lainnya',
            'slope_percent'=>'nullable|numeric|min:0',
            'jarak_pasar_km'=>'nullable|numeric|min:0',
            'akses_jalan'=>'nullable|in:Aspal,Tanah,No Access',
            'previous_planting'=>'nullable|string|max:100',
            'notes'=>'nullable|string',
        ]);

        AsetLahan::create($data);
        return redirect()->route('aset-lahan.index')->with('success','Aset lahan ditambahkan');
    }

    public function show($id) {
        $item = AsetLahan::with('user')->findOrFail($id);
        return view('aset_lahan.show', compact('item'));
    }

    public function edit($id) {
        $item = AsetLahan::findOrFail($id);
        $users = User::all();
        return view('aset_lahan.edit', compact('item','users'));
    }

    public function update(Request $request, $id) {
        $item = AsetLahan::findOrFail($id);
        $data = $request->validate([
            'kode_lahan'=>'sometimes|string|max:30|unique:aset_lahans,kode_lahan,'.$id,
            'user_id'=>'nullable|exists:users,id',
            'nama_lahan'=>'sometimes|string|max:150',
            'alamat'=>'nullable|string|max:255',
            'rt_rw'=>'nullable|string|max:20',
            'desa'=>'nullable|string|max:100',
            'kecamatan'=>'nullable|string|max:100',
            'kabupaten'=>'nullable|string|max:100',
            'provinsi'=>'nullable|string|max:100',
            'luas_m2'=>'sometimes|numeric|min:0',
            'satuan'=>'sometimes|in:m2,ha',
            'koordinat_lat'=>'nullable|numeric',
            'koordinat_lng'=>'nullable|numeric',
            'status'=>'nullable|in:Kosong,Digunakan,Disewa,Sengketa,Terdaftar',
            'kepemilikan'=>'nullable|in:Milik Pribadi,Milik Desa,Sewa,Pinjam Pakai',
            'nomor_sertifikat'=>'nullable|string|max:100',
            'harga_sewa_bulanan'=>'nullable|numeric|min:0',
            'irigasi'=>'nullable|boolean',
            'soil_type'=>'nullable|in:Latosol,Alluvial,Regosol,Podsolik,Lainnya',
            'slope_percent'=>'nullable|numeric|min:0',
            'jarak_pasar_km'=>'nullable|numeric|min:0',
            'akses_jalan'=>'nullable|in:Aspal,Tanah,No Access',
            'previous_planting'=>'nullable|string|max:100',
            'notes'=>'nullable|string',
        ]);

        $item->update($data);
        return redirect()->route('aset-lahan.index')->with('success','Aset lahan diupdate');
    }

    public function destroy($id) {
        $item = AsetLahan::findOrFail($id);
        $item->delete();
        return redirect()->route('aset-lahan.index')->with('success','Aset lahan dihapus');
    }

    public function report() {
        $data = AsetLahan::with('user')->get();
        return view('aset_lahan.report', compact('data'));
    }
}
