<?php

namespace App\Http\Controllers;

use App\Models\SosialEkonomi;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

    // Define valid options for other enum fields
    private const MEMILIKI_TEMPAT_USAHA_OPTIONS = ['Ada', 'Tidak ada'];
    private const OMSET_USAHA_BULAN_OPTIONS = [
        'Kurang dari/sama dengan Rp. 1 Juta',
        'Rp. 1 Juta s/d Rp. 5 juta',
        'Rp. 5 Juta s/d Rp. 10 Juta',
        'Lebih dari/sama dengan Rp. 10 Juta',
    ];
    private const PARTISIPASI_SEKOLAH_OPTIONS = [
        'SD',
        'SMP',
        'SMA',
        'Perguruan Tinggi',
        'Tidak Sekolah lagi',
        'Belum pernah Sekolah',
    ];
    private const IJAZAH_TERAKHIR_OPTIONS = [
        'Tidak memiliki',
        'SD',
        'SMP',
        'SMA',
        'D1',
        'D2',
        'D3',
        'D3/S1',
        'S2',
        'S3',
    ];
    private const JENIS_DISABILITAS_OPTIONS = [
        'Penglihatan',
        'Pendengaran',
        'Berjalan/naik tangga',
        'Mengingat/Konsentrasi (pikun)',
        'Mengurus Diri Sendiri',
        'Komunikasi',
        'Depresi/autis',
        'Lumpuh',
        'Sumbing',
        'Gila',
        'Stres',
        'Tidak mengalami',
    ];
    private const TINGKAT_KESULITAN_DISABILITAS_OPTIONS = [
        'Sedikit kesulitan',
        'Banyak kesulitan',
        'Tidak bisa sama sekali',
        'Tidak mengalami kesulitan',
    ];
    private const PENYAKIT_KRONIS_MENAHUN_OPTIONS = [
        'Tidak ada',
        'Hipertensi',
        'Rematik',
        'Asma',
        'Masalah jantung',
        'Diabetes',
        'TBC',
        'Stroke',
        'Kanker atau Tumor Ganas',
        'Lepra/Kustan',
        'Lever',
        'Malaria',
        'HIV/AIDS',
        'Gagal ginjal',
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
        return view('sosial-ekonomi.index', compact('sosialEkonomi'));
    }

    public function create()
    {
        $users = User::all();
        $lapanganUsahaOptions = self::LAPANGAN_USAHA_OPTIONS;
        $memilikiTempatUsahaOptions = self::MEMILIKI_TEMPAT_USAHA_OPTIONS;
        $omsetUsahaBulanOptions = self::OMSET_USAHA_BULAN_OPTIONS;
        $partisipasiSekolahOptions = self::PARTISIPASI_SEKOLAH_OPTIONS;
        $ijazahTerakhirOptions = self::IJAZAH_TERAKHIR_OPTIONS;
        $jenisDisabilitasOptions = self::JENIS_DISABILITAS_OPTIONS;
        $tingkatKesulitanDisabilitasOptions = self::TINGKAT_KESULITAN_DISABILITAS_OPTIONS;
        $penyakitKronisMenahunOptions = self::PENYAKIT_KRONIS_MENAHUN_OPTIONS;

        return view('sosial-ekonomi.create', compact(
            'users',
            'lapanganUsahaOptions',
            'memilikiTempatUsahaOptions',
            'omsetUsahaBulanOptions',
            'partisipasiSekolahOptions',
            'ijazahTerakhirOptions',
            'jenisDisabilitasOptions',
            'tingkatKesulitanDisabilitasOptions',
            'penyakitKronisMenahunOptions'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'lapangan_usaha' => 'required|string|in:' . implode(',', self::LAPANGAN_USAHA_OPTIONS),
            'nama_usaha' => 'required|string|max:255',
            'jumlah_pekerja' => 'required|integer|min:0',
            'memiliki_tempat_usaha' => 'required|string|in:' . implode(',', self::MEMILIKI_TEMPAT_USAHA_OPTIONS),
            'omset_usaha_bulan' => 'required|string|in:' . implode(',', self::OMSET_USAHA_BULAN_OPTIONS),
            'partisipasi_sekolah' => 'required|string|in:' . implode(',', self::PARTISIPASI_SEKOLAH_OPTIONS),
            'ijazah_terakhir' => 'required|string|in:' . implode(',', self::IJAZAH_TERAKHIR_OPTIONS),
            'jenis_disabilitas' => 'required|string|in:' . implode(',', self::JENIS_DISABILITAS_OPTIONS),
            'tingkat_kesulitan_disabilitas' => 'required|string|in:' . implode(',', self::TINGKAT_KESULITAN_DISABILITAS_OPTIONS),
            'penyakit_kronis_menahun' => 'required|string|in:' . implode(',', self::PENYAKIT_KRONIS_MENAHUN_OPTIONS),
        ]);

        SosialEkonomi::create($data);
        return redirect()->route('sosial-ekonomi.index')->with('success', 'Data sosial ekonomi ditambahkan.');
    }

    public function show($id)
    {
        $item = SosialEkonomi::with('user')->findOrFail($id);
        return view('sosial-ekonomi.show', compact('item'));
    }

    public function edit($id)
    {
        $item = SosialEkonomi::findOrFail($id);
        $users = User::all();
        $lapanganUsahaOptions = self::LAPANGAN_USAHA_OPTIONS;
        $memilikiTempatUsahaOptions = self::MEMILIKI_TEMPAT_USAHA_OPTIONS;
        $omsetUsahaBulanOptions = self::OMSET_USAHA_BULAN_OPTIONS;
        $partisipasiSekolahOptions = self::PARTISIPASI_SEKOLAH_OPTIONS;
        $ijazahTerakhirOptions = self::IJAZAH_TERAKHIR_OPTIONS;
        $jenisDisabilitasOptions = self::JENIS_DISABILITAS_OPTIONS;
        $tingkatKesulitanDisabilitasOptions = self::TINGKAT_KESULITAN_DISABILITAS_OPTIONS;
        $penyakitKronisMenahunOptions = self::PENYAKIT_KRONIS_MENAHUN_OPTIONS;

        return view('sosial-ekonomi.edit', compact(
            'item',
            'users',
            'lapanganUsahaOptions',
            'memilikiTempatUsahaOptions',
            'omsetUsahaBulanOptions',
            'partisipasiSekolahOptions',
            'ijazahTerakhirOptions',
            'jenisDisabilitasOptions',
            'tingkatKesulitanDisabilitasOptions',
            'penyakitKronisMenahunOptions'
        ));
    }

    public function update(Request $request, $id)
    {
        $item = SosialEkonomi::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'lapangan_usaha' => 'required|string|in:' . implode(',', self::LAPANGAN_USAHA_OPTIONS),
            'nama_usaha' => 'required|string|max:255',
            'jumlah_pekerja' => 'required|integer|min:0',
            'memiliki_tempat_usaha' => 'required|string|in:' . implode(',', self::MEMILIKI_TEMPAT_USAHA_OPTIONS),
            'omset_usaha_bulan' => 'required|string|in:' . implode(',', self::OMSET_USAHA_BULAN_OPTIONS),
            'partisipasi_sekolah' => 'required|string|in:' . implode(',', self::PARTISIPASI_SEKOLAH_OPTIONS),
            'ijazah_terakhir' => 'required|string|in:' . implode(',', self::IJAZAH_TERAKHIR_OPTIONS),
            'jenis_disabilitas' => 'required|string|in:' . implode(',', self::JENIS_DISABILITAS_OPTIONS),
            'tingkat_kesulitan_disabilitas' => 'required|string|in:' . implode(',', self::TINGKAT_KESULITAN_DISABILITAS_OPTIONS),
            'penyakit_kronis_menahun' => 'required|string|in:' . implode(',', self::PENYAKIT_KRONIS_MENAHUN_OPTIONS),
        ]);

        $item->update($data);
        return redirect()->route('sosial-ekonomi.index')->with('success', 'Data sosial ekonomi diupdate.');
    }

    public function destroy($id)
    {
        $item = SosialEkonomi::findOrFail($id);
        $item->delete();
        return redirect()->route('sosial-ekonomi.index')->with('success', 'Data sosial ekonomi dihapus.');
    }

    public function exportPdf()
    {
        $sosialEkonomi = SosialEkonomi::with('user')->get();
        $pdf = Pdf::loadView('sosial-ekonomi.report-pdf', compact('sosialEkonomi'))->setPaper('a4', 'landscape');
        return $pdf->download('sosial-ekonomi.pdf');
    }

    public function exportCsv()
    {
        $sosialEkonomi = SosialEkonomi::with('user')->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="sosial-ekonomi.csv"',
        ];

        $callback = function () use ($sosialEkonomi) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, ['#', 'Surveyor', 'Lapangan Usaha', 'Nama Usaha', 'Jumlah Pekerja', 'Memiliki Tempat Usaha', 'Omset Usaha/Bulan']);

            // Add data rows
            foreach ($sosialEkonomi as $index => $item) {
                fputcsv($file, [
                    $index + 1,
                    $item->user->name ?? '-',
                    $item->lapangan_usaha ?? '-',
                    $item->nama_usaha ?? '-',
                    $item->jumlah_pekerja ?? '-',
                    $item->memiliki_tempat_usaha ?? '-',
                    $item->omset_usaha_bulan ?? '-',
                ]);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}