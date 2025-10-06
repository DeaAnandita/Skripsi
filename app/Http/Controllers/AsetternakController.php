<?php

namespace App\Http\Controllers;

use App\Models\Asetternak;
use App\Models\JenisHewan;
use App\Models\NamaHewan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class AsetternakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil query search jika ada
        $search = $request->input('search');

        // Query dengan relasi
        $query = AsetTernak::with(['namaHewan', 'jenisHewan']);

        // Filter berdasarkan search
        if ($search) {
            $query->whereHas('namaHewan', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            })->orWhereHas('jenisHewan', function ($q) use ($search) {
                $q->where('jenis', 'like', "%{$search}%");
            });
        }

        // Pagination 10 data per halaman
        $data = $query->orderBy('id', 'desc')->paginate(10);

        return view('aset_ternak.index', compact('data'));
    }


    public function create()
    {
        $users = User::all();
        $namaHewan = NamaHewan::all();
        $jenisHewan = JenisHewan::all();
        return view('aset_ternak.create', compact('namaHewan', 'jenisHewan', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_hewan_id' => 'required|exists:nama_hewan,id',
            'jenis_hewan_id' => 'required|exists:jenis_hewan,id',
            'kategori' => 'required|in:peternakan,perikanan',
            'jumlah' => 'required|integer|min:0',
            'luas_kandang' => 'nullable|numeric|min:0',
            'jenis_pakan' => 'nullable|string|max:255',
            'kondisi' => 'required|boolean',
            'keterangan' => 'nullable|string',
        ]);

        Asetternak::create($request->all());

        return redirect()->route('aset-ternak.index')
            ->with('success', 'Aset ternak berhasil ditambahkan');
    }
    public function show($id)
    {
        $asetternak = AsetTernak::with(['namaHewan', 'jenisHewan'])->findOrFail($id);
        return view('aset_ternak.show', compact('asetternak'));
    }
    public function edit($id)
    {
        $users = User::all();
        $asetternak = AsetTernak::findOrFail($id);
        $namaHewan = NamaHewan::all();
        $jenisHewan = JenisHewan::all();
        return view('aset_ternak.edit', compact('asetternak', 'namaHewan', 'jenisHewan', 'users'));
    }

    public function update(Request $request, $id)
    {
        $asetternak = AsetTernak::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_hewan_id' => 'required|exists:nama_hewan,id',
            'jenis_hewan_id' => 'required|exists:jenis_hewan,id',
            'kategori' => 'required|in:peternakan,perikanan',
            'jumlah' => 'required|integer|min:0',
            'luas_kandang' => 'nullable|numeric|min:0',
            'jenis_pakan' => 'nullable|string|max:255',
            'kondisi' => 'required|boolean',
            'keterangan' => 'nullable|string',
        ]);

        $asetternak->update($request->only([
            'nama_hewan_id',
            'jenis_hewan_id',
            'kategori',
            'jumlah',
            'luas_kandang',
            'jenis_pakan',
            'kondisi',
            'keterangan',
        ]));

        return redirect()->route('aset-ternak.index')
            ->with('success', 'Aset ternak berhasil diperbarui');
    }


    public function destroy($id)
    {
        $asetTernak = AsetTernak::findOrFail($id);
        $asetTernak->delete();

        return redirect()->route('aset-ternak.index')
            ->with('success', 'Aset ternak berhasil dihapus');
    }
    // -------------------- EXPORT CSV --------------------
    public function exportCsv()
    {
        $asetTernaks = AsetTernak::all();

        $filename = 'aset_ternak_' . date('Ymd_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
        ];

        $columns = ['Surveyor', 'Nama Hewan', 'Jenis Hewan', 'Kategori', 'Jumlah', 'Luas Kandang', 'Jenis Pakan', 'Kondisi', 'Keterangan'];

        $callback = function () use ($asetTernaks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($asetTernaks as $item) {
                fputcsv($file, [
                    $item->user->name ?? '-',
                    $item->namaHewan->nama ?? '-',
                    $item->jenisHewan->jenis ?? '-',
                    $item->kategori,
                    $item->jumlah,
                    $item->luas_kandang ?? '-',
                    $item->jenis_pakan ?? '-',
                    $item->kondisi ? 'Sehat' : 'Sakit',
                    $item->keterangan ?? '-',
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    // -------------------- EXPORT PDF --------------------
    public function exportPdf()
    {
        $asetTernaks = AsetTernak::all();

        $pdf = PDF::loadView('aset_ternak.pdf', compact('asetTernaks'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('aset_ternak_' . date('Ymd_His') . '.pdf');
    }
    public function getJenisHewan($namaHewanId)
    {
        $jenisHewan = JenisHewan::where('nama_hewan_id', $namaHewanId)->get();
        return response()->json($jenisHewan);
    }
}   
