<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asetternak extends Model
{
    protected $table = 'asetternaks';
    protected $fillable = [
            'user_id',
        'nama_hewan_id',
        'jenis_hewan_id',
        'kategori',
        'jumlah',
        'luas_kandang',
        'jenis_pakan',
        'kondisi',
        'keterangan'
    ];

    public function namaHewan()
    {
        return $this->belongsTo(NamaHewan::class, 'nama_hewan_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenisHewan()
    {
        return $this->belongsTo(JenisHewan::class, 'jenis_hewan_id');
    }
}
