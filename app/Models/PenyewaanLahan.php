<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyewaanLahan extends Model
{
    use HasFactory;

    protected $table = 'penyewaan_lahan';
    protected $fillable = [
        'nama_penyewa',
        'lokasi_lahan',
        'luas_lahan',
        'jenis_aset',
        'tanggal_mulai',
        'tanggal_selesai',
        'biaya_sewa',
        'status'
    ];
}