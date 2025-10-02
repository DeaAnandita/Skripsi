<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisHewan extends Model
{
        protected $table = 'jenis_hewan';
    protected $fillable = ['nama_hewan_id', 'jenis'];

    public function namaHewan()
    {
        return $this->belongsTo(NamaHewan::class, 'nama_hewan_id');
    }
}
