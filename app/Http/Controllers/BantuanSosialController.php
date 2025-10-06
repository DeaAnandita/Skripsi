<?php

namespace App\Http\Controllers;

use App\Models\BantuanSosial;
<<<<<<< Updated upstream
use App\Models\Keluarga;
use App\Models\User;
=======
>>>>>>> Stashed changes
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BantuanSosialController extends Controller
{
    public function index(Request $request)
    {
<<<<<<< Updated upstream
        $query = BantuanSosial::with(['user']);
=======
        $query = BantuanSosial::query();
>>>>>>> Stashed changes

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
<<<<<<< Updated upstream
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $bantuan = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('bantuan-sosial.index', compact('bantuan'));
=======
            $query->where('nik_manual', 'like', "%$search%")
                  ->orWhere('nama_lengkap', 'like', "%$search%");
        }

        $bantuans = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('bantuan-sosial.index', compact('bantuans'));
>>>>>>> Stashed changes
    }

    public function create()
    {
<<<<<<< Updated upstream
        // $keluargas = Keluarga::all();
        $users = User::all();
        return view('bantuan-sosial.create', compact('users'));
=======
        return view('bantuan-sosial.create');
>>>>>>> Stashed changes
    }

    public function store(Request $request)
    {
<<<<<<< Updated upstream
        $data = $request->validate([
=======
        $validated = $request->validate([
            'nik_manual' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
>>>>>>> Stashed changes
            'kks_kps' => 'nullable|in:Ya,Tidak,Lainnya',
            'kks_kps_lainnya' => 'nullable|string|max:255',
            'pkh' => 'nullable|in:Ya,Tidak,Lainnya',
            'pkh_lainnya' => 'nullable|string|max:255',
            'raskin_bpnt' => 'nullable|in:Ya,Tidak,Lainnya',
            'raskin_bpnt_lainnya' => 'nullable|string|max:255',
            'kip' => 'nullable|in:Ya,Tidak,Lainnya',
            'kip_lainnya' => 'nullable|string|max:255',
            'kis' => 'nullable|in:Ya,Tidak,Lainnya',
            'kis_lainnya' => 'nullable|string|max:255',
<<<<<<< Updated upstream
            'jamsostek_bpjs_ketenagakerjaan' => 'nullable|in:Ya,Tidak,Lainnya',
            'jamsostek_bpjs_ketenagakerjaan_lainnya' => 'nullable|string|max:255',
            'peserta_mandiri_asuransi_lain' => 'nullable|in:Ya,Tidak,Lainnya',
            'peserta_mandiri_asuransi_lain_lainnya' => 'nullable|string|max:255',
            'status_verifikasi' => 'nullable|in:Belum Diverifikasi,Sedang Diverifikasi,Diverifikasi,Ditolak',
            'alasan_ditolak' => 'nullable|string|max:255',
            'tanggal_usul' => 'nullable|date',
            'tanggal_verifikasi' => 'nullable|date',
            'tanggal_penetapan' => 'nullable|date',
            'sk_nomor' => 'nullable|string|max:255',
            'jenis_distribusi' => 'nullable|in:Uang Tunai,Barang,Kartu/Keanggotaan,Tidak Ada',
            'jumlah_bantuan' => 'nullable|numeric|min:0',
            'tanggal_distribusi' => 'nullable|date',
            // 'bukti_distribusi' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'catatan_monitoring' => 'nullable|string|max:1000',
            'status_transparansi' => 'nullable|in:Internal,Eksternal,Publik',
            
        ]);

        if ($request->hasFile('bukti_distribusi')) {
            $data['bukti_distribusi'] = $request->file('bukti_distribusi')->store('bantuan-sosial', 'public');
        }

        BantuanSosial::create($data);
        return redirect()->route('bantuan-sosial.index')->with('success', 'Data bantuan sosial ditambahkan.');
=======
            'bpjs_ketenagakerjaan' => 'nullable|in:Ya,Tidak,Lainnya',
            'bpjs_ketenagakerjaan_lainnya' => 'nullable|string|max:255',
            'asuransi_mandiri' => 'nullable|in:Ya,Tidak,Lainnya',
            'asuransi_mandiri_lainnya' => 'nullable|string|max:255',
            'kriteria' => 'nullable|array',
            'tanggal_survey' => 'nullable|date',
            'tanggal_penerimaan' => 'nullable|date',
            'tanggal_distribusi' => 'nullable|date',
            'bukti_lampiran' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'created_by' => 'nullable|integer',
        ]);

        if ($request->hasFile('bukti_lampiran')) {
            $validated['bukti_lampiran'] = $request->file('bukti_lampiran')->store('bukti', 'public');
        }
        $validated['kriteria'] = json_encode($validated['kriteria'] ?? []);

        BantuanSosial::create($validated);
        return redirect()->route('bantuan-sosial.index')->with('success', 'Data bantuan sosial berhasil ditambahkan.');
>>>>>>> Stashed changes
    }

    public function show($id)
    {
<<<<<<< Updated upstream
        $item = BantuanSosial::with(['keluarga', 'petugas'])->findOrFail($id);
=======
        $item = BantuanSosial::findOrFail($id);
>>>>>>> Stashed changes
        return view('bantuan-sosial.show', compact('item'));
    }

    public function edit($id)
    {
        $item = BantuanSosial::findOrFail($id);
<<<<<<< Updated upstream
        // $keluargas = Keluarga::all();
        $users = User::all();
        return view('bantuan-sosial.edit', compact('item', 'keluargas', 'users'));
=======
        return view('bantuan_sosial.edit', compact('item'));
>>>>>>> Stashed changes
    }

    public function update(Request $request, $id)
    {
        $item = BantuanSosial::findOrFail($id);

<<<<<<< Updated upstream
        $data = $request->validate([
=======
        $validated = $request->validate([
            'nik_manual' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
>>>>>>> Stashed changes
            'kks_kps' => 'nullable|in:Ya,Tidak,Lainnya',
            'kks_kps_lainnya' => 'nullable|string|max:255',
            'pkh' => 'nullable|in:Ya,Tidak,Lainnya',
            'pkh_lainnya' => 'nullable|string|max:255',
            'raskin_bpnt' => 'nullable|in:Ya,Tidak,Lainnya',
            'raskin_bpnt_lainnya' => 'nullable|string|max:255',
            'kip' => 'nullable|in:Ya,Tidak,Lainnya',
            'kip_lainnya' => 'nullable|string|max:255',
            'kis' => 'nullable|in:Ya,Tidak,Lainnya',
            'kis_lainnya' => 'nullable|string|max:255',
<<<<<<< Updated upstream
            'jamsostek_bpjs_ketenagakerjaan' => 'nullable|in:Ya,Tidak,Lainnya',
            'jamsostek_bpjs_ketenagakerjaan_lainnya' => 'nullable|string|max:255',
            'peserta_mandiri_asuransi_lain' => 'nullable|in:Ya,Tidak,Lainnya',
            'peserta_mandiri_asuransi_lain_lainnya' => 'nullable|string|max:255',
            'status_verifikasi' => 'nullable|in:Belum Diverifikasi,Sedang Diverifikasi,Diverifikasi,Ditolak',
            'alasan_ditolak' => 'nullable|string|max:255',
            'tanggal_usul' => 'nullable|date',
            'tanggal_verifikasi' => 'nullable|date',
            'tanggal_penetapan' => 'nullable|date',
            'sk_nomor' => 'nullable|string|max:255',
            'jenis_distribusi' => 'nullable|in:Uang Tunai,Barang,Kartu/Keanggotaan,Tidak Ada',
            'jumlah_bantuan' => 'nullable|numeric|min:0',
            'tanggal_distribusi' => 'nullable|date',
            // 'bukti_distribusi' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'catatan_monitoring' => 'nullable|string|max:1000',
            'status_transparansi' => 'nullable|in:Internal,Eksternal,Publik',
        ]);

        if ($request->hasFile('bukti_distribusi')) {
            // Hapus file lama jika ada
            if ($item->bukti_distribusi) {
                Storage::disk('public')->delete($item->bukti_distribusi);
            }
            $data['bukti_distribusi'] = $request->file('bukti_distribusi')->store('bantuan-sosial', 'public');
        }

        $item->update($data);
        return redirect()->route('bantuan-sosial.index')->with('success', 'Data bantuan sosial diupdate.');
=======
            'bpjs_ketenagakerjaan' => 'nullable|in:Ya,Tidak,Lainnya',
            'bpjs_ketenagakerjaan_lainnya' => 'nullable|string|max:255',
            'asuransi_mandiri' => 'nullable|in:Ya,Tidak,Lainnya',
            'asuransi_mandiri_lainnya' => 'nullable|string|max:255',
            'kriteria' => 'nullable|array',
            'tanggal_survey' => 'nullable|date',
            'tanggal_penerimaan' => 'nullable|date',
            'tanggal_distribusi' => 'nullable|date',
            'bukti_lampiran' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'created_by' => 'nullable|integer',
        ]);

        if ($request->hasFile('bukti_lampiran')) {
            $validated['bukti_lampiran'] = $request->file('bukti_lampiran')->store('bukti', 'public');
        }
        $validated['kriteria'] = json_encode($validated['kriteria'] ?? []);

        $item->update($validated);
        return redirect()->route('bantuan-sosial.index')->with('success', 'Data bantuan sosial berhasil diperbarui.');
>>>>>>> Stashed changes
    }

    public function destroy($id)
    {
        $item = BantuanSosial::findOrFail($id);
        if ($item->bukti_distribusi) {
            Storage::disk('public')->delete($item->bukti_distribusi);
        }
        $item->delete();
<<<<<<< Updated upstream
        return redirect()->route('bantuan-sosial.index')->with('success', 'Data bantuan sosial dihapus.');
    }

    public function report(Request $request)
    {
        $query = BantuanSosial::with(['keluarga', 'petugas'])
            ->when($request->program, function ($q, $program) {
                $field = strtolower(str_replace(['/', ' '], '_', $program));
                $q->where($field, 'Ya');
            })
            ->when($request->status_verifikasi, function ($q, $status) {
                $q->where('status_verifikasi', $status);
            })
            ->when($request->tahun, function ($q, $tahun) {
                $q->whereYear('tanggal_usul', $tahun);
            });

        $data = $query->get();
        $total = $data->count();
        $totalNilai = $data->sum('jumlah_bantuan');
        $perProgram = [
            'KKS/KPS' => $data->where('kks_kps', 'Ya')->count(),
            'PKH' => $data->where('pkh', 'Ya')->count(),
            'Raskin/BPNT' => $data->where('raskin_bpnt', 'Ya')->count(),
            'KIP' => $data->where('kip', 'Ya')->count(),
            'KIS' => $data->where('kis', 'Ya')->count(),
            'Jamsostek/BPJS Ketenagakerjaan' => $data->where('jamsostek_bpjs_ketenagakerjaan', 'Ya')->count(),
            'Asuransi Lain' => $data->where('peserta_mandiri_asuransi_lain', 'Ya')->count(),
        ];
        $perStatus = $data->groupBy('status_verifikasi')->map->count()->toArray();

        return view('bantuan-sosial.report', compact('data', 'total', 'totalNilai', 'perProgram', 'perStatus'));
    }

    public function exportPdf()
    {
        $data = BantuanSosial::with(['keluarga', 'petugas'])->get();
        $pdf = Pdf::loadView('bantuan-sosial.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('bantuan_sosial.pdf');
=======
        return redirect()->route('bantuan-sosial.index')->with('success', 'Data bantuan sosial berhasil dihapus.');
>>>>>>> Stashed changes
    }

    public function exportCsv()
    {
<<<<<<< Updated upstream
        $data = BantuanSosial::with(['keluarga', 'petugas'])->get();
        $filename = 'bantuan_sosial_' . date('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'Keluarga', 'Petugas', 'KKS/KPS', 'PKH', 'Raskin/BPNT', 'KIP', 'KIS', 'Jamsostek', 'Asuransi Lain',
                'Status Verifikasi', 'Jumlah Bantuan', 'Tanggal Usul', 'Status Aktif'
            ]);

            foreach ($data as $row) {
                fputcsv($file, [
                    $row->keluarga->nama_kepala_keluarga ?? '-' . ' (KK: ' . ($row->keluarga->nomor_kk ?? '-') . ')',
                    $row->petugas->name ?? '-',
                    $row->kks_kps ?? '-',
                    $row->pkh ?? '-',
                    $row->raskin_bpnt ?? '-',
                    $row->kip ?? '-',
                    $row->kis ?? '-',
                    $row->jamsostek_bpjs_ketenagakerjaan ?? '-',
                    $row->peserta_mandiri_asuransi_lain ?? '-',
                    $row->status_verifikasi ?? '-',
                    $row->jumlah_bantuan ?? 0,
                    $row->tanggal_usul ? date('Y-m-d', strtotime($row->tanggal_usul)) : '-',
                    $row->is_active ? 'Aktif' : 'Tidak Aktif',
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
=======
        $query = BantuanSosial::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nik_manual', 'like', "%$search%")
                  ->orWhere('nama_lengkap', 'like', "%$search%");
        }

        if ($request->has('tanggal_survey') && $request->tanggal_survey != '') {
            $query->whereDate('tanggal_survey', $request->tanggal_survey);
        }

        $data = $query->orderBy('created_at', 'desc')->paginate(10);
        $total = $data->count();
        $perProgram = $query->selectRaw('kks_kps as program, COUNT(*) as count')->groupBy('kks_kps')->get()->pluck('count', 'kks_kps')->toArray();

        if ($request->has('export') && $request->export === 'pdf') {
            $allData = $query->get();
            $pdf = Pdf::loadView('bantuan_sosial.report', compact('allData', 'total', 'perProgram'))->setPaper('a4', 'landscape');
            return $pdf->download('laporan_bantuan_sosial.pdf');
        }

        return view('bantuan_sosial.report', compact('data', 'total', 'perProgram'));
>>>>>>> Stashed changes
    }
}