<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BantuanSosial extends Model
{
    use HasFactory;

    protected $table = 'bantuan_sosials';

    protected $fillable = [
        'kks_kps',
        'kks_kps_lainnya',
        'pkh',
        'pkh_lainnya',
        'raskin_bpnt',
        'raskin_bpnt_lainnya',
        'kip',
        'kip_lainnya',
        'kis',
        'kis_lainnya',
        'jamsostek_bpjs_ketenagakerjaan',
        'jamsostek_bpjs_ketenagakerjaan_lainnya',
        'peserta_mandiri_asuransi_lain',
        'peserta_mandiri_asuransi_lain_lainnya',
        'status_verifikasi',
        'alasan_ditolak',
        'tanggal_usul',
        'tanggal_verifikasi',
        'tanggal_penetapan',
        'sk_nomor',
        'jenis_distribusi',
        'jumlah_bantuan',
        'tanggal_distribusi',
        'catatan_monitoring',
        'status_transparansi',
    ];

    protected $casts = [
        'tanggal_usul' => 'date',
        'tanggal_verifikasi' => 'date',
        'tanggal_penetapan' => 'date',
        'tanggal_distribusi' => 'date',
        'jumlah_bantuan' => 'decimal:2',
    ];

    // public function keluarga()
    // {
    //     return $this->belongsTo(Keluarga::class, 'keluarga_id');
    // }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function user() {
         return $this->belongsTo(User::class);
        }
}