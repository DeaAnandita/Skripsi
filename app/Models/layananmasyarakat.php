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
        'layanan_ktp', 'layanan_ktp_lainnya',
        'layanan_kk', 'layanan_kk_lainnya',
        'layanan_akta_kelahiran', 'layanan_akta_kelahiran_lainnya',
        'layanan_akta_kematian', 'layanan_akta_kematian_lainnya',
        'layanan_akta_perkawinan', 'layanan_akta_perkawinan_lainnya',
        'layanan_akta_cerai', 'layanan_akta_cerai_lainnya',
        'layanan_sim', 'layanan_sim_lainnya',
        'layanan_stnk', 'layanan_stnk_lainnya',
        'layanan_pbb', 'layanan_pbb_lainnya',
        'layanan_bpjs_kesehatan', 'layanan_bpjs_kesehatan_lainnya',
        'layanan_bpjs_ketenagakerjaan', 'layanan_bpjs_ketenagakerjaan_lainnya',
        'layanan_kartu_keluarga_sejahtera', 'layanan_kartu_keluarga_sejahtera_lainnya',
        'layanan_bantuan_langsung_tunai', 'layanan_bantuan_langsung_tunai_lainnya',
        'layanan_sertifikat_tanah', 'layanan_sertifikat_tanah_lainnya',
        'layanan_izin_usaha', 'layanan_izin_usaha_lainnya',
        'layanan_bantuan_pendidikan', 'layanan_bantuan_pendidikan_lainnya',
        'layanan_bantuan_kesehatan', 'layanan_bantuan_kesehatan_lainnya',
        'layanan_pengaduan_masyarakat', 'layanan_pengaduan_masyarakat_lainnya',
        'layanan_informasi_publik', 'layanan_informasi_publik_lainnya',
        'layanan_pendaftaran_sekolah', 'layanan_pendaftaran_sekolah_lainnya',
        'layanan_vaksinasi', 'layanan_vaksinasi_lainnya',
        'layanan_posyandu', 'layanan_posyandu_lainnya',
        'layanan_program_keluarga_berencana', 'layanan_program_keluarga_berencana_lainnya',
        'layanan_rehabilitasi_narkoba', 'layanan_rehabilitasi_narkoba_lainnya',
        'layanan_bantuan_hukum', 'layanan_bantuan_hukum_lainnya',
        'layanan_pemakaman', 'layanan_pemakaman_lainnya',
        'layanan_transportasi_sosial', 'layanan_transportasi_sosial_lainnya',
        'layanan_penerangan_jalan', 'layanan_penerangan_jalan_lainnya',
        'layanan_air_bersih', 'layanan_air_bersih_lainnya',
        'status_pengajuan', 'deskripsi_lengkap', 'tanggal_pengajuan', 'tanggal_selesai',
    ];

    protected $casts = [
        'tanggal_pengajuan' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}