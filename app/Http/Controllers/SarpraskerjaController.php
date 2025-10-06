<?php

namespace App\Http\Controllers;

use App\Models\Sarpraskerja; // Pastikan nama model juga disesuaikan
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SarpraskerjaController extends Controller
{
    public function index(Request $request)
    {
        $query = Sarpraskerja::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $sarpraskerja = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('sarpraskerja.index', compact('sarpraskerja'));
    }

    public function create()
    {
        $users = User::all();
        return view('sarpraskerja.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'mesin_kerja' => 'nullable|string',
            'komputer_kerja' => 'nullable|string',
            'meja_kantor' => 'nullable|string',
            'kursi_kantor' => 'nullable|string',
            'mobil_operasional' => 'nullable|string',
            'sepeda_motor_kerja' => 'nullable|string',
            'alat_berat' => 'nullable|string',
            'internet_kerja' => 'nullable|string',
            'printer_scanner' => 'nullable|string',
            'telepon_kantor' => 'nullable|string',
        ]);

        Sarpraskerja::create($data);
        return redirect()->route('sarpras-kerja.index')->with('success', 'Data sarana prasarana kerja ditambahkan.');
    }

    public function show($id)
    {
        $item = Sarpraskerja::with('user')->findOrFail($id);
        return view('sarpraskerja.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Sarpraskerja::findOrFail($id);
        $users = User::all();
        return view('sarpraskerja.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = Sarpraskerja::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'mesin_kerja' => 'nullable|string',
            'komputer_kerja' => 'nullable|string',
            'meja_kantor' => 'nullable|string',
            'kursi_kantor' => 'nullable|string',
            'mobil_operasional' => 'nullable|string',
            'sepeda_motor_kerja' => 'nullable|string',
            'alat_berat' => 'nullable|string',
            'internet_kerja' => 'nullable|string',
            'printer_scanner' => 'nullable|string',
            'telepon_kantor' => 'nullable|string',
        ]);

        $item->update($data);
        return redirect()->route('sarpras-kerja.index')->with('success', 'Data sarana prasarana kerja diupdate.');
    }

    public function destroy($id)
    {
        $item = Sarpraskerja::findOrFail($id);
        $item->delete();
        return redirect()->route('sarpras-kerja.index')->with('success', 'Data sarana prasarana kerja dihapus.');
    }

    public function exportPdf()
    {
        $data = Sarpraskerja::with('user')->get();
        $pdf = Pdf::loadView('sarpraskerja.report.pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('sarpraskerja.pdf');
    }
}