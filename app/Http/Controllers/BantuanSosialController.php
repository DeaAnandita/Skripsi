<?php

namespace App\Http\Controllers;

use App\Models\BantuanSosial;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BantuanSosialController extends Controller
{
    public function index(Request $request)
    {
        $query = BantuanSosial::with('petugas');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama_lengkap', 'like', "%$search%")
                  ->orWhere('nik_manual', 'like', "%$search%");
        }

        $bantuans = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('bantuan_sosial.index', compact('bantuans'));
    }

    public function create()
    {
        $users = User::all();
        return view('bantuan-sosial.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'petugas_id' => 'required|exists:users,id',
            'nik_manual' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'dokumen_pendukung' => 'nullable|file',
            'kks_kps' => 'nullable|string',
            'kks_kps_lainnya' => 'nullable|string',
            'pkh' => 'nullable|string',
            'pkh_lainnya' => 'nullable|string',
            'raskin_bpnt' => 'nullable|string',
            'raskin_bpnt_lainnya' => 'nullable|string',
            'kip' => 'nullable|string',
            'kip_lainnya' => 'nullable|string',
            'kis' => 'nullable|string',
            'kis_lainnya' => 'nullable|string',
            'jamsostek_bpjs_ketenagakerjaan' => 'nullable|string',
            'jamsostek_bpjs_ketenagakerjaan_lainnya' => 'nullable|string',
            'peserta_mandiri_asuransi_lain' => 'nullable|string',
            'peserta_mandiri_asuransi_lain_lainnya' => 'nullable|string',
            'verifikasi_identitas' => 'nullable|string',
            'verifikasi_identitas_lainnya' => 'nullable|string',
            'data_lintas_sektor' => 'nullable|string',
            'data_lintas_sektor_lainnya' => 'nullable|string',
            'konfirmasi_kepala_desa' => 'nullable|string',
            'konfirmasi_kepala_desa_lainnya' => 'nullable|string',
            'status_verifikasi' => 'nullable|string',
            'alasan_ditolak' => 'nullable|string',
            'jenis_distribusi' => 'nullable|string',
            'jumlah_bantuan' => 'nullable|numeric',
            'tanggal_distribusi' => 'nullable|date',
            'bukti_distribusi' => 'nullable|string',
            'bukti_distribusi_lainnya' => 'nullable|string',
            'status_program' => 'nullable|string',
        ]);

        // Handle file upload jika ada
        if ($request->hasFile('dokumen_pendukung')) {
            $data['dokumen_pendukung'] = $request->file('dokumen_pendukung')->store('dokumen_pendukung', 'public');
        }

        // Ubah nilai null jadi "Tidak" untuk field yang bersifat Ya/Tidak
        foreach (['kks_kps', 'pkh', 'raskin_bpnt', 'kip', 'kis', 'jamsostek_bpjs_ketenagakerjaan', 'peserta_mandiri_asuransi_lain', 'verifikasi_identitas', 'data_lintas_sektor', 'konfirmasi_kepala_desa', 'bukti_distribusi'] as $field) {
            if (!isset($data[$field])) {
                $data[$field] = 'Tidak';
            }
        }

        BantuanSosial::create($data);
        return redirect()->route('bantuan-sosial.index')->with('success', 'Data bantuan sosial ditambahkan.');
    }

    public function show($id)
    {
        $item = BantuanSosial::with('petugas')->findOrFail($id);
        return view('bantuan-sosial.show', compact('item'));
    }

    public function edit($id)
    {
        $item = BantuanSosial::findOrFail($id);
        $users = User::all();
        return view('bantuan-sosial.edit', compact('item', 'users'));
    }

    public function update(Request $request, $id)
    {
        $item = BantuanSosial::findOrFail($id);

        $data = $request->validate([
            'petugas_id' => 'sometimes|exists:users,id',
            'nik_manual' => 'sometimes|string|max:16',
            'nama_lengkap' => 'sometimes|string|max:255',
            'dokumen_pendukung' => 'nullable|file',
            'kks_kps' => 'nullable|string',
            'kks_kps_lainnya' => 'nullable|string',
            'pkh' => 'nullable|string',
            'pkh_lainnya' => 'nullable|string',
            'raskin_bpnt' => 'nullable|string',
            'raskin_bpnt_lainnya' => 'nullable|string',
            'kip' => 'nullable|string',
            'kip_lainnya' => 'nullable|string',
            'kis' => 'nullable|string',
            'kis_lainnya' => 'nullable|string',
            'jamsostek_bpjs_ketenagakerjaan' => 'nullable|string',
            'jamsostek_bpjs_ketenagakerjaan_lainnya' => 'nullable|string',
            'peserta_mandiri_asuransi_lain' => 'nullable|string',
            'peserta_mandiri_asuransi_lain_lainnya' => 'nullable|string',
            'verifikasi_identitas' => 'nullable|string',
            'verifikasi_identitas_lainnya' => 'nullable|string',
            'data_lintas_sektor' => 'nullable|string',
            'data_lintas_sektor_lainnya' => 'nullable|string',
            'konfirmasi_kepala_desa' => 'nullable|string',
            'konfirmasi_kepala_desa_lainnya' => 'nullable|string',
            'status_verifikasi' => 'nullable|string',
            'alasan_ditolak' => 'nullable|string',
            'jenis_distribusi' => 'nullable|string',
            'jumlah_bantuan' => 'nullable|numeric',
            'tanggal_distribusi' => 'nullable|date',
            'bukti_distribusi' => 'nullable|string',
            'bukti_distribusi_lainnya' => 'nullable|string',
            'status_program' => 'nullable|string',
        ]);

        // Handle file upload jika ada
        if ($request->hasFile('dokumen_pendukung')) {
            $data['dokumen_pendukung'] = $request->file('dokumen_pendukung')->store('dokumen_pendukung', 'public');
        }

        // Ubah nilai null jadi "Tidak" untuk field yang bersifat Ya/Tidak
        foreach (['kks_kps', 'pkh', 'raskin_bpnt', 'kip', 'kis', 'jamsostek_bpjs_ketenagakerjaan', 'peserta_mandiri_asuransi_lain', 'verifikasi_identitas', 'data_lintas_sektor', 'konfirmasi_kepala_desa', 'bukti_distribusi'] as $field) {
            if (!isset($data[$field])) {
                $data[$field] = 'Tidak';
            }
        }

        $item->update($data);
        return redirect()->route('bantuan-sosial.index')->with('success', 'Data bantuan sosial diupdate.');
    }

    public function destroy($id)
    {
        $item = BantuanSosial::findOrFail($id);
        $item->delete();
        return redirect()->route('bantuan-sosial.index')->with('success', 'Data bantuan sosial dihapus.');
    }

    public function exportPdf()
    {
        $data = BantuanSosial::with('petugas')->get();
        $pdf = Pdf::loadView('bantuan-sosial.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('bantuan_sosial.pdf');
    }

    public function report(Request $request)
    {
        $query = BantuanSosial::with('petugas')->filter($request->only('program', 'status_verifikasi', 'tanggal_distribusi'));

        $data = $query->paginate(10);
        $total = $data->count();
        $totalNilai = $query->sum('jumlah_bantuan');
        $perProgram = $query->select('kks_kps as program')->groupBy('kks_kps')->count();
        $perStatus = $query->select('status_verifikasi')->groupBy('status_verifikasi')->count();

        return view('bantuan-sosial.report', compact('data', 'total', 'totalNilai', 'perProgram', 'perStatus'));
    }
}