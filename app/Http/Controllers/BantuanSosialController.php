<?php

namespace App\Http\Controllers;

use App\Models\BantuanSosial;
use App\Models\Keluarga;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BantuanSosialController extends Controller
{
    public function index(Request $request)
    {
        $query = BantuanSosial::with(['user']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $bantuan = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('bantuan-sosial.index', compact('bantuan'));
    }

    public function create()
    {
        // $keluargas = Keluarga::all();
        $users = User::all();
        return view('bantuan-sosial.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
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
    }

    public function show($id)
    {
        $item = BantuanSosial::with(['keluarga', 'petugas'])->findOrFail($id);
        return view('bantuan-sosial.show', compact('item'));
    }

    public function edit($id)
    {
        $item = BantuanSosial::findOrFail($id);
        // $keluargas = Keluarga::all();
        $users = User::all();
        return view('bantuan-sosial.edit', compact('item', 'keluargas', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = BantuanSosial::findOrFail($id);

        $data = $request->validate([
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
    }

    public function destroy($id)
    {
        $item = BantuanSosial::findOrFail($id);
        if ($item->bukti_distribusi) {
            Storage::disk('public')->delete($item->bukti_distribusi);
        }
        $item->delete();
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
    }

    public function exportCsv()
    {
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
    }
}