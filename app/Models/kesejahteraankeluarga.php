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
        'pendapatan_stabil',
        'akses_pendidikan', 
        'akses_kesehatan', 
        'sanitasi_baik', 
        'air_bersih', 
        'listrik_rumah', 
        'pangan_cukup', 
        'tabungan_aset', 
        'jaminan_sosial', 
        'pekerjaan_keluarga', 
        'akses_internet', 
        'transportasi', 
        'rumah_layak_huni', 
        'pakaian_layak', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}