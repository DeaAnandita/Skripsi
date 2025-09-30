<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data surat dengan pagination
        $surats = Surat::latest()->paginate(10);
        return view('LayananUmum.Surat.index', compact('surats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisSurats = JenisSurat::all();
        return view('LayananUmum.Surat.create', compact('jenisSurats'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat_id' => 'required|exists:jenis_surats,id',
            'nama'           => 'required|string|max:255',
            'nik'            => 'required|string|max:20',
            'alamat'         => 'required|string',
            'keperluan'      => 'required|string',
        ]);

        // Nomor surat otomatis: SURAT-YYYYMMDD-000X
        $today = now()->format('Ymd');
        $countToday = Surat::whereDate('created_at', now()->toDateString())->count() + 1;
        $nomorSurat = 'SURAT-' . $today . '-' . str_pad($countToday, 4, '0', STR_PAD_LEFT);

        // Kode verifikasi unik
        $verifyCode = uniqid();
        $verifyUrl  = url('/verifikasi-surat/' . $verifyCode);

        // Nama file barcode (pakai .svg)
        $fileName = 'qr-' . $verifyCode . '.svg';
        $qrPath   = 'barcodes/' . $fileName;

        // Pastikan folder barcodes ada
        if (!Storage::disk('public')->exists('barcodes')) {
            Storage::disk('public')->makeDirectory('barcodes');
        }

        // Generate QR (SVG, tidak perlu imagick)
        $qrSvg = QrCode::format('svg')
            ->size(200)
            ->errorCorrection('H')
            ->generate($verifyUrl);

        // Simpan QR ke storage
        Storage::disk('public')->put($qrPath, $qrSvg);

        // Simpan data surat
        Surat::create([
            'nomor_surat'      => $nomorSurat,
            'jenis_surat_id'   => $request->jenis_surat_id,
            'nama'             => $request->nama,
            'nik'              => $request->nik,
            'alamat'           => $request->alamat,
            'keperluan'        => $request->keperluan,
            'barcode_verify'   => $verifyCode,
            'barcode_download' => $fileName,
        ]);

        return redirect()->route('surats.index')->with('success', 'Surat berhasil dibuat dengan nomor otomatis dan QR Code.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        //
    }
}
