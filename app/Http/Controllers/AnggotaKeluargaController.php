<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AnggotaKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AnggotaKeluarga::with(['user']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%$search%");
            });
        }

        $anggotas = $query->orderBy('created_at', 'desc')->paginate(5);
        return view('anggota-keluarga.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('anggota-keluarga.create', compact( 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            // 'id_keluarga' => 'required|exists:master_keluarga,id_keluarga',
            'user_id' => 'required|exists:users,id',

            'nik' => 'required|string|max:16|unique:anggota_keluarga,nik',
            'nama_lengkap' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'hubungan_keluarga' => 'required|in:kepala keluarga,istri/suami,anak,lainnya',
            'status_perkawinan' => 'required|in:belum kawin,kawin,cerai hidup,cerai mati',
        ]);

        AnggotaKeluarga::create($data);
        return redirect()->route('anggota-keluarga.index')->with('success', 'Data anggota keluarga ditambahkan.');
    }

    /**
     * Display the specified resource.
     */



    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(AnggotaKeluarga $anggotaKeluarga)
    // {
    //     $users = User::all();
    //     return view('anggota-keluarga.edit', compact('anggotaKeluarga',  'users'));
    // }

     public function show($id)
    {
        $item = AnggotaKeluarga::with('user')->findOrFail($id);
        return view('anggota-keluarga.show', compact('item'));
    }

        public function edit($id)
    {
        $item = AnggotaKeluarga::findOrFail($id);
        $users = User::all();
        return view('anggota-keluarga.edit', compact('item', 'users'));
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = AnggotaKeluarga::findOrFail($id);
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            // 'No_KK' => 'required|exists:master_keluarga,No_KK',
            'nik' => 'required|string|max:16|unique:anggota_keluarga',
            'nama_lengkap' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'hubungan_keluarga' => 'required|in:kepala keluarga,istri/suami,anak,lainnya',
            'status_perkawinan' => 'required|in:belum kawin,kawin,cerai hidup,cerai mati',
            
        ]);

        $item->update($data);
        return redirect()->route('anggota-keluarga.index')->with('success', 'Data anggota keluarga diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        $item = AnggotaKeluarga::findOrFail($id);
        $item->delete();
        return redirect()->route('anggota-keluarga.index')->with('success', 'Data anggota keluarga dihapus.');
    }
    /**
     * Export data to PDF.
     */
    public function exportPdf()
    {
        $data = AnggotaKeluarga::with(['user'])->get();
        $pdf = Pdf::loadView('anggota-keluarga.report-pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download('anggota_keluarga.pdf');
    }
}