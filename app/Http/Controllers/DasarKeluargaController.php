<?php

namespace App\Http\Controllers;

use App\Models\DasarKeluarga;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DasarKeluargaController extends Controller
{
    public function index(Request $request)
    {
        $query = DasarKeluarga::where('user_id', auth()->id()); // tampilkan hanya data surveyor ini

        if ($request->filled('jenis_mutasi')) {
            $query->where('jenis_mutasi', $request->jenis_mutasi);
        }

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tanggal_mutasi', [$request->tanggal_awal, $request->tanggal_akhir]);
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('no_kk', 'like', "%$search%")
                ->orWhere('kepala_keluarga', 'like', "%$search%")
                ->orWhere('dusun', 'like', "%$search%")
                ->orWhere('alamat', 'like', "%$search%");
        }

        $dasar = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('dasar_keluarga.index', compact('dasar'));
    }

    public function create()
    {
        $users = User::all();
        return view('dasar_keluarga.create', compact('users'));
    }

    public function store(Request $request)
    {
        // ✅ Validasi input dengan pesan custom
        $validated = $request->validate([
            'no_kk' => 'required|digits_between:10,20',
            'kepala_keluarga' => 'required|string|max:255',
            'jenis_mutasi' => 'required|string|in:Tetap,Datang,Pindah,Meninggal,Lahir',
            'tanggal_mutasi' => 'required|date',
            'dusun' => 'nullable|string|max:255',
            'rw' => 'nullable|string|max:5',
            'rt' => 'nullable|string|max:5',
            'alamat' => 'nullable|string|max:1000',
            'provinsi' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'desa' => 'nullable|string|max:255',
        ], [
            'no_kk.required' => 'Nomor KK wajib diisi.',
            'no_kk.digits_between' => 'Nomor KK harus terdiri dari 10–20 digit angka.',
            'kepala_keluarga.required' => 'Nama kepala keluarga wajib diisi.',
            'jenis_mutasi.required' => 'Jenis mutasi wajib dipilih.',
            'jenis_mutasi.in' => 'Jenis mutasi tidak valid.',
            'tanggal_mutasi.required' => 'Tanggal mutasi wajib diisi.',
            'tanggal_mutasi.date' => 'Tanggal mutasi harus berupa format tanggal yang valid.',
        ]);

        // ✅ Cek apakah No KK sudah terdaftar
        $duplicate = DasarKeluarga::where('no_kk', $validated['no_kk'])->first();
        if ($duplicate) {
            return redirect()->route('dasar-keluarga.index')
                ->with('error', 'Nomor KK ' . $validated['no_kk'] . ' sudah terdaftar. Data tidak dapat disimpan dua kali.');
        }

        // ✅ Jika jenis mutasi = "Datang", wajib isi lokasi tujuan
        if ($validated['jenis_mutasi'] === 'Datang') {
            $request->validate([
                'provinsi' => 'required|string|max:255',
                'kabupaten' => 'required|string|max:255',
                'kecamatan' => 'required|string|max:255',
                'desa' => 'required|string|max:255',
            ], [
                'provinsi.required' => 'Provinsi wajib diisi untuk mutasi Datang.',
                'kabupaten.required' => 'Kabupaten wajib diisi untuk mutasi Datang.',
                'kecamatan.required' => 'Kecamatan wajib diisi untuk mutasi Datang.',
                'desa.required' => 'Desa wajib diisi untuk mutasi Datang.',
            ]);
        }

        // ✅ Simpan data
        DasarKeluarga::create([
            'user_id' => auth()->id(),
            'no_kk' => $validated['no_kk'],
            'kepala_keluarga' => $validated['kepala_keluarga'],
            'jenis_mutasi' => $validated['jenis_mutasi'],
            'tanggal_mutasi' => $validated['tanggal_mutasi'],
            'dusun' => $validated['dusun'] ?? null,
            'rw' => $validated['rw'] ?? null,
            'rt' => $validated['rt'] ?? null,
            'alamat' => $validated['alamat'] ?? null,
            'provinsi' => $validated['provinsi'] ?? null,
            'kabupaten' => $validated['kabupaten'] ?? null,
            'kecamatan' => $validated['kecamatan'] ?? null,
            'desa' => $validated['desa'] ?? null,
        ]);

        // ✅ Redirect ke index dengan notifikasi sukses
        return redirect()->route('dasar-keluarga.index')
            ->with('success', 'Data keluarga berhasil ditambahkan.');
    }



    public function show($id)
    {
        $item = DasarKeluarga::with('user')->findOrFail($id);
        return view('dasar_keluarga.show', compact('item'));
    }

    public function edit($id)
    {
        $item = DasarKeluarga::findOrFail($id);
        $users = User::all();
        return view('dasar_keluarga.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = DasarKeluarga::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'no_kk' => 'required|string|unique:dasar_keluargas,no_kk,' . $id,
            'kepala_rumah_tangga' => 'required|string|max:255',
            'jenis_mutasi' => 'nullable|string|max:255',
            'tanggal_mutasi' => 'nullable|date',
            'dusun' => 'nullable|string|max:255',
            'rw' => 'nullable|string|max:10',
            'rt' => 'nullable|string|max:10',
            'alamat' => 'nullable|string|max:1000',
            'provinsi' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'desa' => 'nullable|string|max:255',
        ]);

        $item->update($data);
        return redirect()->route('dasar-keluarga.index')->with('success', 'Data dasar keluarga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = DasarKeluarga::findOrFail($id);
        $item->delete();
        return redirect()->route('dasar-keluarga.index')->with('success', 'Data dasar keluarga berhasil dihapus.');
    }

    public function exportPdf()
    {
        $data = DasarKeluarga::with('user')->get();
        $pdf = Pdf::loadView('dasar_keluarga.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('dasar_keluarga.pdf');
    }
}
