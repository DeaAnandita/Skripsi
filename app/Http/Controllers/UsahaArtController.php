<?php

namespace App\Http\Controllers;

use App\Models\UsahaArt;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UsahaArtController extends Controller
{
    public function index(Request $request)
    {
        $query = UsahaArt::with(['user', 'surveyor']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })->orWhere('lapangan_usaha', 'like', "%$search%");
        }

        $usaha = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('usaha_art.index', compact('usaha'));
    }

    public function create()
    {
        $users = User::all();
        return view('usaha_art.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'lapangan_usaha' => 'required|in:Pertanian tanaman padi & 		     palawija,Hortikultura,Perkebunan,Perikanan tangkap,Perikanan Budidaya,Peternakan,Kehutanan & Pertanian lainnya,Pertambangan/penggalian,Industri pengolahan,Listrik, gas, & Air,Bangunan/Konstruksi,Perdagangan,Hotel & rumah makan,Transportasi & perududangan,Informasi dan Komunikasi,Kecurangan dan asuransi,Jasa pendidikan,Jasa kesehatan,Jasa kemasyarakatan, pemerintah & perorangan,Pemulung,Lainnya',
            'omset_per_bulan' => 'required|in:Kurang dari/sama dengan Rp. 1 Juta,Rp. 1 Juta s/d Rp. 5 Juta,Rp. 5 Juta s/d Rp. 10 Juta,Lebih dari/sama dengan Rp. 10 Juta',
            'pendapatan_per_bulan' => 'required|in:Kurang dari/sama dengan Rp. 1 Juta,Rp. 1 s/d Rp. 1.5 Juta,Rp. 1.5 s/d Rp. 2 Juta,Rp. 2 s/d Rp. 3 Juta,Lebih dari/sama dengan Rp. 3 Juta',
            'jumlah_pekerja' => 'required|integer|min:1',
            'status_kedudukan_kerja' => 'required|in:Berusaha sendiri,Berusaha dibantu buruh tidak tetap/dibayar,Buruh/karyawan/pekerja swasta,PNS/TNI/POLRI/BUMN/BUMD/Anggota legislatif,Pekerja bebas pertania,Pekerja bebas non pertania,Pekerja keluarga/tidak dibayar',
            'dokumen_usaha' => 'nullable|file|mimes:pdf|max:2048',
            'status_verifikasi' => 'required|in:pending,verified,rejected',
            'surveyor_id' => 'nullable|exists:users,id',
        ]);

        if ($request->hasFile('dokumen_usaha')) {
            $data['dokumen_usaha'] = $request->file('dokumen_usaha')->store('dokumen_usaha', 'public');
        }

        UsahaArt::create($data);
        return redirect()->route('usaha-art.index')->with('success', 'Data usaha ART ditambahkan.');
    }

    public function show($id)
    {
        $item = UsahaArt::with(['user', 'surveyor'])->findOrFail($id);
        return view('usaha_art.show', compact('item'));
    }

    public function edit($id)
    {
        $item = UsahaArt::findOrFail($id);
        $users = User::all();
        return view('usaha_art.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = UsahaArt::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'lapangan_usaha' => 'required|in:Pertanian tanaman padi & palawija,Hortikultura,Perkebunan,Perikanan tangkap,Perikanan Budidaya,Peternakan,Kehutanan & Pertanian lainnya,Pertambangan/penggalian,Industri pengolahan,Listrik, gas, & Air,Bangunan/Konstruksi,Perdagangan,Hotel & rumah makan,Transportasi & perududangan,Informasi dan Komunikasi,Kecurangan dan asuransi,Jasa pendidikan,Jasa kesehatan,Jasa kemasyarakatan, pemerintah & perorangan,Pemulung,Lainnya',
            'omset_per_bulan' => 'required|in:Kurang dari/sama dengan Rp. 1 Juta,Rp. 1 Juta s/d Rp. 5 Juta,Rp. 5 Juta s/d Rp. 10 Juta,Lebih dari/sama dengan Rp. 10 Juta',
            'pendapatan_per_bulan' => 'required|in:Kurang dari/sama dengan Rp. 1 Juta,Rp. 1 s/d Rp. 1.5 Juta,Rp. 1.5 s/d Rp. 2 Juta,Rp. 2 s/d Rp. 3 Juta,Lebih dari/sama dengan Rp. 3 Juta',
            'jumlah_pekerja' => 'required|integer|min:1',
            'status_kedudukan_kerja' => 'required|in:Berusaha sendiri,Berusaha dibantu buruh tidak tetap/dibayar,Buruh/karyawan/pekerja swasta,PNS/TNI/POLRI/BUMN/BUMD/Anggota legislatif,Pekerja bebas pertania,Pekerja bebas non pertania,Pekerja keluarga/tidak dibayar',
            'dokumen_usaha' => 'nullable|file|mimes:pdf|max:2048',
            'status_verifikasi' => 'required|in:pending,verified,rejected',
            'surveyor_id' => 'nullable|exists:users,id',
        ]);

        if ($request->hasFile('dokumen_usaha')) {
            $data['dokumen_usaha'] = $request->file('dokumen_usaha')->store('dokumen_usaha', 'public');
        }

        $item->update($data);
        return redirect()->route('usaha-art.index')->with('success', 'Data usaha ART diupdate.');
    }

    public function destroy($id)
    {
        $item = UsahaArt::findOrFail($id);
        $item->delete();
        return redirect()->route('usaha-art.index')->with('success', 'Data usaha ART dihapus.');
    }

    public function exportPdf()
    {
        $data = UsahaArt::with(['user', 'surveyor'])->get();
        $pdf = Pdf::loadView('usaha_art.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('usaha_art.pdf');
    }
}
