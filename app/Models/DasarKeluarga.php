<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DasarKeluarga extends Model
{
    use HasFactory;
    protected $table = 'dasar_keluargas';
    protected $fillable = [
        'user_id',
        'no_kk',
        'kepala_keluarga',
        'dusun',
        'rw',
        'rt',
        'alamat',
        'jenis_mutasi',
        'tanggal_mutasi',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
