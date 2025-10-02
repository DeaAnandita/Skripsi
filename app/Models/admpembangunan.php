<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admpembangunan extends Model
{
    protected $table = 'admpembangunan';
    protected $fillable = [
        'jenis_buku',
        'judul',
        'dokumen',
        'tanggal'
    ];
}
