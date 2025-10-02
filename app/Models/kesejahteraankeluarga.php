<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KesejahteraanKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kesejahteraan_keluargas';

    protected $fillable = [
        'user_id',
        'pendapatan_stabil', 'pendapatan_stabil_lainnya',
        'akses_pendidikan', 'akses_pendidikan_lainnya',
        'akses_kesehatan', 'akses_kesehatan_lainnya',
        'sanitasi_baik', 'sanitasi_baik_lainnya',
        'air_bersih', 'air_bersih_lainnya',
        'listrik_rumah', 'listrik_rumah_lainnya',
        'pangan_cukup', 'pangan_cukup_lainnya',
        'tabungan_aset', 'tabungan_aset_lainnya',
        'jaminan_sosial', 'jaminan_sosial_lainnya',
        'pekerjaan_keluarga', 'pekerjaan_keluarga_lainnya',
        'akses_internet', 'akses_internet_lainnya',
        'transportasi', 'transportasi_lainnya',
        'rumah_layak_huni', 'rumah_layak_huni_lainnya',
        'pakaian_layak', 'pakaian_layak_lainnya',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}