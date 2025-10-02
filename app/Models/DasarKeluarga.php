<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DasarKeluarga extends Model
{
    protected $table = 'dasar_keluargas';

    protected $fillable = [
        'user_id',
        'jenis_mutasi', 'jenis_mutasi_lainnya',
        'tanggal_mutasi', 'tanggal_mutasi_lainnya',
        'nomor_dtks/id_bdt', 'nomor_dtks/id_bdt_lainnya',
        'kepala_rumah_tangga', 'kepala_rumah_tangga_lainnya',
        'dusun/lingkungan', 'dusun/lingkungan_lainnya',
        'rw', 'rw_lainnya',
        'rt', 'rt_lainnya',
        'alamat_lengkap', 'alamat_lengkap_lainnya',
        'provinsi', 'provinsi_lainnya',
        'kabupaten', 'kabupaten_lainnya',
        'kecamatan', 'kecamatan_lainnya',
    ];

    public function user() {
         return $this->belongsTo(User::class);
        }
}
