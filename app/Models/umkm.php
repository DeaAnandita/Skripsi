<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';

    protected $fillable = [
        'user_id',
        'Koperasi','Koperasi_lainnya',
        'Unit_Usaha_Simpan_Pinjam', 'Unit_Usaha_Simpan_Pinjam_lainnya',
        'Industri_Kerajinan_Tangan', 'Industri_Kerajinan_Tangan_lainnya',
        'Industir_Pakaian', 'Industri_Pakaian_lainnya',
        'Industri_Usaha_Makanan','Industri_Usaha_Makanan',
        'Industri_Alat_Rumah_Tangga','Industri_Alat_Rumah_Tangga',
        'Industri_Usaha_Bahan_Bangunan','Industri_Usaha_Bahan_Bangunan',
        'Industri_Alat_Pertanian','Industri_Alat_Pertanian',
        'Restoran','Restoran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
