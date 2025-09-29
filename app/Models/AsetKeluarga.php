<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetKeluarga extends Model {
    protected $table = 'aset_keluargas';

    protected $fillable = [
        'user_id',
        'tabung_gas', 'tabung_gas_lainnya',
        'komputer_laptop', 'komputer_laptop_lainnya',
        'tv_elektronik', 'tv_elektronik_lainnya',
        'ac_pendingin', 'ac_pendingin_lainnya',
        'kulkas', 'kulkas_lainnya',
        'water_heater', 'water_heater_lainnya',
        'rumah_tempat_lain', 'rumah_tempat_lain_lainnya',
        'diesel_listrik', 'diesel_listrik_lainnya',
        'sepeda_motor', 'sepeda_motor_lainnya',
        'mobil_pribadi', 'mobil_pribadi_lainnya',
        'perahu_bermotor', 'perahu_bermotor_lainnya',
        'kapal_barang', 'kapal_barang_lainnya',
        'kapal_penumpang', 'kapal_penumpang_lainnya',
        'kapal_pesiar', 'kapal_pesiar_lainnya',
        'helikopter_pribadi', 'helikopter_pribadi_lainnya',
        'pesawat_pribadi', 'pesawat_pribadi_lainnya',
        'ternak_besar', 'ternak_besar_lainnya',
        'ternak_kecil', 'ternak_kecil_lainnya',
        'hiasan_emas', 'hiasan_emas_lainnya',
        'tabungan_bank', 'tabungan_bank_lainnya',
        'surat_berharga', 'surat_berharga_lainnya',
        'sertifikat_deposito', 'sertifikat_deposito_lainnya',
        'sertifikat_tanah', 'sertifikat_tanah_lainnya',
        'sertifikat_bangunan', 'sertifikat_bangunan_lainnya',
        'perusahaan_industri_besar', 'perusahaan_industri_besar_lainnya',
        'perusahaan_industri_menengah', 'perusahaan_industri_menengah_lainnya',
        'perusahaan_industri_kecil', 'perusahaan_industri_kecil_lainnya',
        'usaha_perikanan', 'usaha_perikanan_lainnya',
        'usaha_peternakan', 'usaha_peternakan_lainnya',
        'usaha_perkebunan', 'usaha_perkebunan_lainnya',
        'usaha_pasar_swalayan', 'usaha_pasar_swalayan_lainnya',
        'usaha_di_pasar_swalayan', 'usaha_di_pasar_swalayan_lainnya',
        'usaha_di_pasar_tradisional', 'usaha_di_pasar_tradisional_lainnya',
        'usaha_di_pasar_desa', 'usaha_di_pasar_desa_lainnya',
        'usaha_transportasi', 'usaha_transportasi_lainnya',
        'saham_perusahaan', 'saham_perusahaan_lainnya',
        'pelanggan_telkom', 'pelanggan_telkom_lainnya',
        'hp_gsm', 'hp_gsm_lainnya',
        'hp_cdma', 'hp_cdma_lainnya',
        'usaha_wartel', 'usaha_wartel_lainnya',
        'parabola', 'parabola_lainnya',
        'berlangganan_koran', 'berlangganan_koran_lainnya',
    ];

    public function user() {
         return $this->belongsTo(User::class);
        }
}
