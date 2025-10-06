<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PenyewaanLahan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;

class PenyewaanLahanController extends Controller
{
    public function index(Request $request)
    {
        $penyewaan = PenyewaanLahan::all();
        // if ($request->has('search')) {
        //     $search = $request->search;
        //     $query->whereHas('penyewaan_lahan', function ($q) use ($search) {
        //         $q->where('nama_penyewa', 'like', "%$search%");
        //     });
        // }   

        // $penyewaan = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('Penyewaanlahan.index', compact('penyewaan'));
    }

    public function create()
    {
        return view('Penyewaanlahan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_penyewa' => 'required|string|max:255',
            'lokasi_lahan' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric|min:0',
            'jenis_aset' => 'required|in:ternak,perikanan',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'biaya_sewa' => 'required|numeric|min:0',
            'status' => 'required|in:aktif,selesai,batal'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        PenyewaanLahan::create($request->all());
        return redirect()->route('penyewaan-lahan.index')->with('success', 'Data penyewaan berhasil ditambahkan');
    }

    public function show($id)
    {
        $penyewaan = PenyewaanLahan::findOrFail($id);
        return view('Penyewaanlahan.show', compact('penyewaan'));
    }

    public function edit($id)
    {
        $penyewaan = PenyewaanLahan::findOrFail($id);
        return view('Penyewaanlahan.edit', compact('penyewaan'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_penyewa' => 'required|string|max:255',
            'lokasi_lahan' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric|min:0',
            'jenis_aset' => 'required|in:ternak,perikanan',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'biaya_sewa' => 'required|numeric|min:0',
            'status' => 'required|in:aktif,selesai,batal'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penyewaan = PenyewaanLahan::findOrFail($id);
        $penyewaan->update($request->all());
        return redirect()->route('penyewaan-lahan.index')->with('success', 'Data penyewaan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $penyewaan = PenyewaanLahan::findOrFail($id);
        $penyewaan->delete();
        return redirect()->route('penyewaan-lahan.index')->with('success', 'Data penyewaan berhasil dihapus');
    }

    public function report(Request $request)
    {
        $query = PenyewaanLahan::query();

        if ($request->has('jenis_aset') && $request->jenis_aset != '') {
            $query->where('jenis_aset', $request->jenis_aset);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $penyewaan = $query->get();
        $total_biaya = $penyewaan->sum('biaya_sewa');
        $total_luas = $penyewaan->sum('luas_lahan');

        return view('Penyewaanlahan.report', compact('penyewaan', 'total_biaya', 'total_luas'));
   
   
    }
    public function exportPdf()
    {
        $data = PenyewaanLahan::with('user')->get();
        $pdf = Pdf::loadView('Penyewaanlahan.report', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('Penyewaanlahan.pdf');
    }
    
}