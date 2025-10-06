<?php

namespace App\Http\Controllers;

use App\Models\LayananMasyarakat;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LayananMasyarakatController extends Controller
{
    public function index(Request $request)
    {
        $query = LayananMasyarakat::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $layanan = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('layananmasyarakat.index', compact('layanan'));
    }

    public function create()
    {
        $users = User::all();
        return view('layananmasyarakat.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            // Indikator layanan berupa boolean (Ya/Tidak) dan string untuk detail lainnya
            'Pengurus_RT' => 'nullable|string',
            'Anggota_Pengurus_RT' => 'nullable|string',
            'Pengurus_RW' => 'nullable|string',
            'Anggota_Pengurus_RW' => 'nullable|string',
            'Pengurus_LKMD/K/LPM' => 'nullable|string',
            'Anggota_LKMD/K/LPM' => 'nullable|string',
            'Pengurus_PKK' => 'nullable|string',
            'Anggota_PKK' => 'nullable|string',
            'Pengurus_Lembaga_Adat'=> 'nullable|string',
            'Anggota_Lembaga_Adat'=> 'nullable|string',

        ]);

        foreach (['Pengurus_RT','Anggota_Pengurus_RT','Pengurus_RW','Anggota_Pengurus_RW','Pengurus_LKMD/K/LPM','Anggota_LKMD/K/LPM','Pengurus_PKK','Pengurus_Lembaga_Adat','Anggota_Lembaga_Adat'] as $field) {
            if (empty($data[$field])) {
                $data[$field] = 'Tidak';
            }
        }

        layananmasyarakat::create($data);
        return redirect()->route('layanan-masyarakat.index')->with('success', 'Data layanan masyarakat ditambahkan.');
    }

    public function show($id)
    {
        $item = LayananMasyarakat::with('user')->findOrFail($id);
        return view('layananmasyarakat.show', compact('item'));
    }

    public function edit($id)
    {
        $item = LayananMasyarakat::findOrFail($id);
        $users = User::all();
        return view('layananmasyarakat.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
{
    $item = LayananMasyarakat::findOrFail($id);

    $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'Pengurus_RT' => 'nullable|string',
            'Anggota_Pengurus_RT' => 'nullable|string',
            'Pengurus_RW' => 'nullable|string',
            'Anggota_Pengurus_RW' => 'nullable|string',
            'Pengurus_LKMD/K/LPM' => 'nullable|string',
            'Anggota_LKMD/K/LPM' => 'nullable|string',
            'Pengurus_PKK' => 'nullable|string',
            'Anggota_PKK' => 'nullable|string',
            'Pengurus_Lembaga_Adat'=> 'nullable|string',
            'Anggota_Lembaga_Adat'=> 'nullable|string',

    ]);

     $item->update($data);
        return redirect()->route('layanan-masyarakat.index')->with('success', 'Data Layanan Masyarakat Diupdate.');
    }

    public function destroy($id)
    {
        $item = LayananMasyarakat::findOrFail($id);
        $item->delete();
        return redirect()->route('layanan-masyarakat.index')->with('success', 'Data Layanan Masyarakat dihapus.');
    }

    public function exportPdf()
    {
        $data = LayananMasyarakat::with('user')->get();
        $pdf = Pdf::loadView('layananmasyarakat.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('layananmasyarakat.pdf');
    }
}
