<?php

namespace App\Http\Controllers;

use App\Models\Kelahiran;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kelahiran::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $kelahiran = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('kelahiran.index', compact('kelahiran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('kelahiran.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
             // 'No_KK' => 'required|exists:master_keluarga,No_KK',
            'nik' => 'required|string|max:16|unique:kelahiran,nik',
            'nama_lengkap' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'akta_kelahiran' => 'nullable|string|max:50',
        ]);

        Kelahiran::create($data);
        return redirect()->route('kelahiran.index')->with('success', 'Data kelahiran ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Kelahiran::with('user')->findOrFail($id);
        return view('kelahiran.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Kelahiran::findOrFail($id);
        $users = User::all();
        return view('kelahiran.edit', compact('item', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = Kelahiran::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nik' => 'required|string|max:16|unique:kelahiran,nik',
            'nama_lengkap' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'akta_kelahiran' => 'nullable|string|max:50',
        ]);

        $item->update($data);
        return redirect()->route('kelahiran.index')->with('success', 'Data kelahiran diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Kelahiran::findOrFail($id);
        $item->delete();
        return redirect()->route('kelahiran.index')->with('success', 'Data kelahiran dihapus.');
    }

    /**
     * Export data to PDF.
     */
    public function exportPdf()
    {
        $data = Kelahiran::with('user')->get();
        $pdf = Pdf::loadView('kelahiran.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('kelahiran.pdf');
    }
}