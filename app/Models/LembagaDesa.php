<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembagaDesa extends Model
{
    use HasFactory;
    protected $table = 'lembaga_desas';
    protected $fillable = [
        'nama_lembaga',
        'dusun',
        'struktur_jabatan',
        'keterangan',
    ];

    // Method untuk mengakses dan memanipulasi struktur_jabatan (JSON)
    public function getStrukturJabatanAttribute($value)
    {
        return json_decode($value, true) ?: [];
    }

    public function setStrukturJabatanAttribute($value)
    {
        $this->attributes['struktur_jabatan'] = json_encode($value);
    }
}