<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananMasyarakat extends Model
{
    use HasFactory;

    protected $table = 'layanan_masyarakats';

    protected $fillable = [
        'user_id',
        'Pengurus_RT','Pengurus_RT',
        'Anggota_Pengurus_RT', 'Anggota_Pengurus_RT',
        'Pengurus_RW', 'Pengurus_RW',
        'Anggota_Pengurus_RW', 'Anggota_Pengurus_RW',
        'Pengurus_LKMD/K/LPM','Pengurus_LKMD/K/LPM',
        'Anggota_LKMD/K/LPM','Anggota_LKMD/K/LPM',
        'Pengurus_PKK','Pengurus_PKK',
        'Anggota_PKK','Anggota_PKK',
        'Pengurus_Lembaga_Adat','Pengurus_Lembaga_Adat',
        'Anggota_Lembaga_Adat','Anggota_Lembaga_Adat'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
