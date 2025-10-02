<?php

namespace App\Http\Controllers;

use App\Models\SocioEconomic;
use App\Models\SosialEkonomi;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SosialEkonomiController extends Controller
{
    // Define valid options for lapangan_usaha
    private const LAPANGAN_USAHA_OPTIONS = [
        'Pertanian tanaman padi & palawija',
        'Hortikultura',
        'Perkebunan',
        'Perikanan tangkap',
        'Perikanan Budidaya',
        'Peternakan',
        'Kehutanan & Pertanian lainnya',
        'Pertambangan/penggalian',
        'Industri pengolahan',
        'Listrik, gas, & Air',
        'Bangunan/Konstruksi',
        'Perdagangan',
        'Hotel & rumah makan',
        'Transportasi & perududangan',
        'Informasi dan Komunikasi',
        'Kecurangan dan asuransi',
        'Jasa pendidikan',
        'Jasa kesehatan',
        'Jasa kemasyarakatan, pemerintah & perorangan',
        'Pemulung',
        'Lainnya',
    ];

    public function index(Request $request)
    {
        $query = SosialEkonomi::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $sosialEkonomi = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('sosial_ekonomi.index', compact('sosialEkonomi'));
    }

    public function create()
    {
        $users = User::all();
        $lapanganUsahaOptions = self::LAPANGAN_USAHA_OPTIONS;
        return view('sosial_ekonomi.create', compact('users', 'lapanganUsahaOptions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'lapangan_usaha' => 'required|string|in:' . implode(',', self::LAPANGAN_USAHA_OPTIONS),
            'nama_usaha' => 'required|string|max:255',
            'jumlah_pekerja' => 'required|integer|min:0',
            'memiliki_tempat_usaha' => 'required|string|in:Ada,Tidak ada',
            'omset_usaha_bulan' => 'required|string|in:Kurang dari/sama dengan Rp. 1 Juta,Rp. 1 Juta s/d Rp. 5 juta,Rp. 5 Juta s/d Rp. 10 Juta,Lebih dari/sama dengan Rp. 10 Juta',
        ]);

        SosialEkonomi::create($data);
        return redirect()->route('sosial_ekonomi.index')->with('success', 'Data sosial ekonomi ditambahkan.');
    }

    public function show($id)
    {
        $item = SosialEkonomi::with('user')->findOrFail($id);
        return view('sosial_ekonomi.show', compact('item'));
    }

    public function edit($id)
    {
        $item = SosialEkonomi::findOrFail($id);
        $users = User::all();
        $lapanganUsahaOptions = self::LAPANGAN_USAHA_OPTIONS;
        return view('sosial_ekonomi.edit', compact('item', 'users', 'lapanganUsahaOptions'));
    }

    public function update(Request $request, $id)
    {
        $item = SosialEkonomi::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'lapangan_usaha' => 'required|string|in:' . implode(',', self::LAPANGAN_USAHA_OPTIONS),
            'nama_usaha' => 'required|string|max:255',
            'jumlah_pekerja' => 'required|integer|min:0',
            'memiliki_tempat_usaha' => 'required|string|in:Ada,Tidak ada',
            'omset_usaha_bulan' => 'required|string|in:Kurang dari/sama dengan Rp. 1 Juta,Rp. 1 Juta s/d Rp. 5 juta,Rp. 5 Juta s/d Rp. 10 Juta,Lebih dari/sama dengan Rp. 10 Juta',
        ]);

        $item->update($data);
        return redirect()->route('sosial_ekonomi.index')->with('success', 'Data sosial ekonomi diupdate.');
    }

    public function destroy($id)
    {
        $item = SosialEkonomi::findOrFail($id);
        $item->delete();
        return redirect()->route('sosial_ekonomi.index')->with('success', 'Data sosial ekonomi dihapus.');
    }

    public function exportPdf()
    {
        $data = SosialEkonomi::with('user')->get();
        $pdf = Pdf::loadView('sosial_ekonomi.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('sosial_ekonomi.pdf');
    }
}