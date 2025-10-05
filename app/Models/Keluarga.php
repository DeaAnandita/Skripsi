<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'keluarga';
    protected $fillable = ['no_kk', 'kepala_keluarga', 'dusun', 'rw', 'rt', 'alamat'];

    public function dasarKeluarga()
    {
        return $this->hasMany(DasarKeluarga::class, 'no_kk');
    }
}
