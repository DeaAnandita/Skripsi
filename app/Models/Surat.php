<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surats';

    protected $fillable = [
        'nomor_surat',
        'jenis_surat_id',
        'nama',
        'nik',
        'keperluan',
        'alamat',
        'isi_surat',
        'barcode_download',
        'barcode_verify',
    ];

    // Relasi ke JenisSurat
    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }
    
}