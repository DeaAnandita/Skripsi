<?php

namespace App\Http\Controllers;

use App\Models\Bayi;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BayiController extends Controller
{
    public function index(Request $request)
    {
        $query = Bayi::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $bayi = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('bayi.index', compact('bayi'));
    }

    public function create()
    {
        $users = User::all();
        return view('bayi.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',

            // semua indikator aset berupa pilihan Ya/Tidak/Lainnya
            'nama_ibu' => 'nullable|string',
            'nama_bayi' => 'nullable|string',
            'tgl_lahir' => 'nullable|string',
            'jenis_kelamin' => 'nullable|string',
            'berat_badan' => 'nullable|string',
            'tinggi_badan' => 'nullable|string',
            
        ]);

        // ubah nilai null jadi "Tidak"
        // foreach ($data as $key => $value) {
        //     if ($value === null) {
        //         $data[$key] = 'Tidak';
        //     }
        // }

        Bayi::create($data);
        return redirect()->route('bayi.index')->with('success', 'Data bayi ditambahkan.');
    }

    public function show($id)
    {
        $item = Bayi::with('user')->findOrFail($id);
        return view('bayi.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Bayi::findOrFail($id);
        $users = User::all();
        return view('bayi.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = Bayi::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            // indikator sama dengan store()
            'nama_ibu' => 'nullable|string',
            'nama_bayi' => 'nullable|string',
            'tgl_lahir' => 'nullable|string',
            'jenia_kelamin' => 'nullable|string',
            'berat_badan' => 'nullable|string',
            'tinggi_badan' => 'nullable|string',
        ]);

        $item->update($data);
        return redirect()->route('bayi.index')->with('success', 'Data bayi diupdate.');
    }

    public function destroy($id)
    {
        $item = Bayi::findOrFail($id);
        $item->delete();
        return redirect()->route('bayi.index')->with('success', 'Data bayi dihapus.');
    }

    public function exportPdf()
    {
        $data = Bayi::with('user')->get();
        $pdf = Pdf::loadView('bayi.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('bayi.pdf');
    }
}
