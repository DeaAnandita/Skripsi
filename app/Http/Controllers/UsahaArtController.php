<?php

namespace App\Http\Controllers;

use App\Models\UsahaArt;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class UsahaArtController extends Controller
{
    public function index(Request $request)
    {
        $query = UsahaArt::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })->orWhere('lapangan_usaha', 'like', "%$search%");
        }

        $usaha = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('usaha-art.index', compact('usaha'));
    }

    public function create()
    {
        $users = User::all();
        return view('usaha-art.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'lapangan_usaha' => 'required|in:Pertanian tanaman padi & palawija,Hortikultura,Perkebunan,Perikanan tangkap,Perikanan Budidaya,Peternakan,Kehutanan & Pertanian lainnya,Pertambangan/penggalian,Industri pengolahan,Listrik, gas, & Air,Bangunan/Konstruksi,Perdagangan,Hotel & rumah makan,Transportasi & perududangan,Informasi dan Komunikasi,Kecurangan dan asuransi,Jasa pendidikan,Jasa kesehatan,Jasa kemasyarakatan, pemerintah & perorangan,Pemulung,Lainnya',
            'omset_usaha_bulan' => 'required|in:Kurang dari/sama dengan Rp. 1 Juta,Rp. 1 Juta s/d Rp. 5 Juta,Rp. 5 Juta s/d Rp. 10 Juta,Lebih dari/sama dengan Rp. 10 Juta',
            'jumlah_pekerja' => 'required|integer|min:1',
            'dokumen_usaha' => 'nullable|file|mimes:pdf|max:2048',
            'status_verifikasi' => 'required|in:pending,verified,rejected',
        ]);

        if ($request->hasFile('dokumen_usaha')) {
            $data['dokumen_usaha'] = $request->file('dokumen_usaha')->store('dokumen_usaha', 'public');
        }

        UsahaArt::create($data);
        return redirect()->route('usaha-art.index')->with('success', 'Data usaha ART ditambahkan.');
    }

    public function show($id)
    {
        $item = UsahaArt::with('user')->findOrFail($id);
        return view('usaha-art.show', compact('item'));
    }

    public function edit($id)
    {
        $item = UsahaArt::findOrFail($id);
        $users = User::all();
        return view('usaha-art.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = UsahaArt::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'lapangan_usaha' => 'required|in:Pertanian tanaman padi & palawija,Hortikultura,Perkebunan,Perikanan tangkap,Perikanan Budidaya,Peternakan,Kehutanan & Pertanian lainnya,Pertambangan/penggalian,Industri pengolahan,Listrik, gas, & Air,Bangunan/Konstruksi,Perdagangan,Hotel & rumah makan,Transportasi & perududangan,Informasi dan Komunikasi,Kecurangan dan asuransi,Jasa pendidikan,Jasa kesehatan,Jasa kemasyarakatan, pemerintah & perorangan,Pemulung,Lainnya',
            'omset_usaha_bulan' => 'required|in:Kurang dari/sama dengan Rp. 1 Juta,Rp. 1 Juta s/d Rp. 5 Juta,Rp. 5 Juta s/d Rp. 10 Juta,Lebih dari/sama dengan Rp. 10 Juta',
            'jumlah_pekerja' => 'required|integer|min:1',
            'dokumen_usaha' => 'nullable|file|mimes:pdf|max:2048',
            'status_verifikasi' => 'required|in:pending,verified,rejected',
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
        $data = UsahaArt::with('user')->get();
        $pdf = Pdf::loadView('usaha-art.report_pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('usaha-art.pdf');
    }

    public function exportCsv()
    {
        $data = UsahaArt::with('user')->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="usaha-art.csv"',
        ];

        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, ['#', 'Surveyor', 'Lapangan Usaha', 'Omset Usaha/Bulan', 'Jumlah Pekerja', 'Status Verifikasi']);

            // Add data rows
            foreach ($data as $index => $item) {
                fputcsv($file, [
                    $index + 1,
                    $item->user->name ?? '-',
                    $item->lapangan_usaha ?? '-',
                    $item->omset_usaha_bulan ?? '-',
                    $item->jumlah_pekerja ?? '-',
                    $item->status_verifikasi ?? '-',
                ]);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}