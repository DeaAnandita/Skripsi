<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarpraskerja extends Model
{
    use HasFactory;

    protected $table = 'sarpras_kerjas';

    protected $fillable = [
        'user_id',
        'mesin_kerja', 'mesin_kerja_lainnya',
        'komputer_kerja', 'komputer_kerja_lainnya',
        'meja_kantor', 'meja_kantor_lainnya',
        'kursi_kantor', 'kursi_kantor_lainnya',
        'mobil_operasional', 'mobil_operasional_lainnya',
        'sepeda_motor_kerja', 'sepeda_motor_kerja_lainnya',
        'alat_berat', 'alat_berat_lainnya',
        'internet_kerja', 'internet_kerja_lainnya',
        'printer_scanner', 'printer_scanner_lainnya',
        'telepon_kantor', 'telepon_kantor_lainnya',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}