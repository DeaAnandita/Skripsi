<?php

namespace App\Http\Controllers;

use App\Models\KonflikSosial;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KonflikSosialController extends Controller
{
    public function index(Request $request)
    {
        $query = KonflikSosial::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $konflik = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('konfliksosial.index', compact('konflik'));
    }

    public function create()
    {
        $users = User::all();
        return view('konfliksosial.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',

            // Indikator konflik sosial
            'konflik_tanah' => 'nullable|string',
            'konflik_pemukiman' => 'nullable|string',
            'konflik_ekonomi' => 'nullable|string',
            'konflik_sosial_budaya' => 'nullable|string',
            'konflik_politik' => 'nullable|string',
            'konflik_agraria' => 'nullable|string',
            'konflik_lingkungan' => 'nullable|string',
            'konflik_kriminalitas' => 'nullable|string',
            'konflik_etnis' => 'nullable|string',
            'konflik_agama' => 'nullable|string',
            'konflik_pelayanan_publik' => 'nullable|string',
        ]);

        // Ubah nilai null jadi "Tidak"
        foreach ($data as $key => $value) {
            if ($value === null) {
                $data[$key] = 'Tidak';
            }
        }

        KonflikSosial::create($data);
        return redirect()->route('konfliksosial.index')->with('success', 'Data konflik sosial ditambahkan.');
    }

    public function show($id)
    {
        $item = KonflikSosial::with('user')->findOrFail($id);
        return view('konfliksosial.show', compact('item'));
    }

    public function edit($id)
    {
        $item = KonflikSosial::findOrFail($id);
        $users = User::all();
        return view('konfliksosial.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = KonflikSosial::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'konflik_tanah' => 'nullable|string',
            'konflik_pemukiman' => 'nullable|string',
            'konflik_ekonomi' => 'nullable|string',
            'konflik_sosial_budaya' => 'nullable|string',
            'konflik_politik' => 'nullable|string',
            'konflik_agraria' => 'nullable|string',
            'konflik_lingkungan' => 'nullable|string',
            'konflik_kriminalitas' => 'nullable|string',
            'konflik_etnis' => 'nullable|string',
            'konflik_agama' => 'nullable|string',
            'konflik_pelayanan_publik' => 'nullable|string',
        ]);

        $item->update($data);
        return redirect()->route('konfliksosial.index')->with('success', 'Data konflik sosial diupdate.');
    }

    public function destroy($id)
    {
        $item = KonflikSosial::findOrFail($id);
        $item->delete();
        return redirect()->route('konfliksosial.index')->with('success', 'Data konflik sosial dihapus.');
    }

    public function exportPdf()
    {
        $data = KonflikSosial::with('user')->get();
        $pdf = Pdf::loadView('konflik_sosial.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('konflik_sosial.pdf');
    }
}