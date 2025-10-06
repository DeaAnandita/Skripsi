<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrasaranaDasar extends Model
{
    use HasFactory;

    protected $table = 'prasarana_dasars';

    protected $fillable = [
        'user_id',
        'status_pemilik_bangunan',
        'status_pemilik_lahan',
        'jenis_fisik_bangunan',
        'jenis_lantai',
        'kondisi_lantai',
        'jenis_dinding',
        'kondisi_dinding',
        'jenis_atap',
        'kondisi_atap',
        'sumber_air_minum',
        'kondisi_air_minum',
        'cara_memperoleh_air',
        'sumber_penerangan',
        'sumber_daya_terpasang',
        'bahan_bakar_memasak',
        'fasilitas_bab',
        'pembuangan_tinja',
        'pembuangan_sampah',
        'manfaat_air',
        'luas_lantai',
        'jumlah_kamar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}