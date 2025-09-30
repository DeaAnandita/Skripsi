<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class IbuHamilController extends Controller
{
    public function index(Request $request)
    {
        $query = IbuHamil::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $ibuhamil = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('ibu_hamil.index', compact('ibuhamil'));
    }

    public function create()
    {
        $users = User::all();
        return view('ibu_hamil.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',

            // semua indikator aset berupa pilihan Ya/Tidak/Lainnya
            'nama' => 'nullable|string',
            'nik' => 'nullable|string',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string',
            'status_hamil' => 'nullable|string',
            
        ]);

        // ubah nilai null jadi "Tidak"
        // foreach ($data as $key => $value) {
        //     if ($value === null) {
        //         $data[$key] = 'Tidak';
        //     }
        // }

        IbuHamil::create($data);
        return redirect()->route('ibu-hamil.index')->with('success', 'Data ibu hamil ditambahkan.');
    }

    public function show($id)
    {
        $item = IbuHamil::with('user')->findOrFail($id);
        return view('ibu_hamil.show', compact('item'));
    }

    public function edit($id)
    {
        $item = IbuHamil::findOrFail($id);
        $users = User::all();
        return view('ibu_hamil.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = IbuHamil::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            // indikator sama dengan store()
            'nama' => 'nullable|string',
            'nik' => 'nullable|string',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string',
            'status_hamil' => 'nullable|string',
        ]);

        $item->update($data);
        return redirect()->route('ibu-hamil.index')->with('success', 'Data ibu hamil diupdate.');
    }

    public function destroy($id)
    {
        $item = IbuHamil::findOrFail($id);
        $item->delete();
        return redirect()->route('ibu-hamil.index')->with('success', 'Data ibu hamil dihapus.');
    }

    public function exportPdf()
    {
        $data = IbuHamil::with('user')->get();
        $pdf = Pdf::loadView('ibu-hamil.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('ibu-hamil.pdf');
    }
}
