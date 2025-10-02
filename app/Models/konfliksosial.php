<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonflikSosial extends Model
{
    use HasFactory;

    protected $table = 'konflik_sosials';

    protected $fillable = [
        'user_id',
        'konflik_tanah', 'konflik_tanah_lainnya',
        'konflik_pemukiman', 'konflik_pemukiman_lainnya',
        'konflik_ekonomi', 'konflik_ekonomi_lainnya',
        'konflik_sosial_budaya', 'konflik_sosial_budaya_lainnya',
        'konflik_politik', 'konflik_politik_lainnya',
        'konflik_agraria', 'konflik_agraria_lainnya',
        'konflik_lingkungan', 'konflik_lingkungan_lainnya',
        'konflik_kriminalitas', 'konflik_kriminalitas_lainnya',
        'konflik_etnis', 'konflik_etnis_lainnya',
        'konflik_agama', 'konflik_agama_lainnya',
        'konflik_pelayanan_publik', 'konflik_pelayanan_publik_lainnya',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}