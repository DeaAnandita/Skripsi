<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangunKeluarga extends Model
{
    use HasFactory;

    protected $table = 'bangun_keluargas'; // nama tabel sesuai migration

    protected $fillable = [
        'user_id',

        // Indikator bangun keluarga
        'pakaian_berbeda',
        'ikut_kb',
        'ikut_kegiatan_rt',
        'ikut_posyandu',
        'remaja_ikut_pik',
        'anggota_merokok',
        'anak_mengemisi',
        'anggota_cacat_fisik',
        'makan_protein',
        'memiliki_tabungan',
        'akses_informasi',
        'ikut_bkb',
        'ikut_bkl',
        'ikut_bkr',
        'ikut_uppks',
        'ibadah_sesuai_agama',
        'komunikasi_keluarga',
        'pengurus_kegiatan_sosial',
        'lansia_diatas_60',
        'anak_jalanan',
        'pengemis',
        'pengamen',
        'gila_stres',
        'kelainan_kulit',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dasar_keluarga()
    {
        return $this->belongsTo(DasarKeluarga::class);
    }
}
