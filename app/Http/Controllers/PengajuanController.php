<?php
namespace App\Http\Controllers;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller {
    public function index() {
        $items = Pengajuan::with('user')->get();
        return view('pengajuans.index', compact('items'));
    }
    public function create() { return view('pengajuans.create'); }
    public function store(Request $request) {
        $data = $request->validate([
            'user_id'=>'required|exists:users,id',
            'kategori_aset'=>'required|in:Keluarga,Lahan',
            'id_aset'=>'nullable|integer',
            'jenis_pengajuan'=>'required|string|max:150',
            'deskripsi'=>'nullable|string',
            'tanggal_pengajuan'=>'required|date'
        ]);
        Pengajuan::create($data);
        return redirect()->route('pengajuans.index')->with('success','Pengajuan dibuat');
    }
    public function destroy($id) { Pengajuan::findOrFail($id)->delete(); return redirect()->route('pengajuans.index')->with('success','Pengajuan dihapus'); }
}
