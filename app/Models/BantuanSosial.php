<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BantuanSosial extends Model
{
    use HasFactory;

    protected $table = 'bantuan_sosials';

    protected $fillable = [
        'petugas_id',
        'nik_manual',
        'nama_lengkap',
        'dokumen_pendukung',
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
        'verifikasi_identitas',
        'verifikasi_identitas_lainnya',
        'data_lintas_sektor',
        'data_lintas_sektor_lainnya',
        'konfirmasi_kepala_desa',
        'konfirmasi_kepala_desa_lainnya',
        'status_verifikasi',
        'alasan_ditolak',
        'jenis_distribusi',
        'jumlah_bantuan',
        'tanggal_distribusi',
        'bukti_distribusi',
        'bukti_distribusi_lainnya',
        'status_program',
    ];

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}