<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admpembangunan extends Model
{
    protected $fillable = [
        'jenis_buku',
        'judul',
        'dokumen',
        'tanggal'
    ];
}
