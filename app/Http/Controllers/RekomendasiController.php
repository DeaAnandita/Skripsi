<?php
namespace App\Http\Controllers;
use App\Models\Rekomendasi;
use App\Models\AsetKeluarga;
use App\Models\AsetLahan;
use Illuminate\Http\Request;

class RekomendasiController extends Controller {
    public function index() {
        $items = Rekomendasi::with(['user','asetKeluarga','asetLahan'])->get();
        return view('rekomendasi.index', compact('items'));
    }
    public function create() {
        $keluarga = AsetKeluarga::all();
        $lahan = AsetLahan::all();
        return view('rekomendasi.create', compact('keluarga','lahan'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'user_id'=>'required|exists:users,id',
            'aset_keluarga_id'=>'nullable|exists:aset_keluargas,id',
            'aset_lahan_id'=>'nullable|exists:aset_lahans,id',
            'jenis_rekomendasi'=>'required|string|max:100',
            'deskripsi'=>'required|string'
        ]);
        Rekomendasi::create($data);
        return redirect()->route('rekomendasi.index')->with('success','Rekomendasi dibuat');
    }
    public function destroy($id) {
        Rekomendasi::findOrFail($id)->delete();
        return redirect()->route('rekomendasi.index')->with('success','Rekomendasi dihapus');
    }
}
