<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NamaHewan extends Model
{
    protected $table = 'nama_hewan';
    protected $fillable = ['nama'];

    public function jenisHewan()
    {
        return $this->hasMany(JenisHewan::class, 'nama_hewan_id');
    }
    
}
