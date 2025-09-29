<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsetKeluarga;

class AsetKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AsetKeluarga::create([
            'user_id' => 1, // pastikan ada user dengan ID 1

            'tabung_gas' => 'Ya',
            'komputer_laptop' => 'Tidak',
            'tv_elektronik' => 'Ya',
            'ac_pendingin' => 'Tidak',
            'kulkas' => 'Ya',
            'water_heater' => 'Tidak',
            'rumah_tempat_lain' => 'Tidak',
            'diesel_listrik' => 'Tidak',
            'sepeda_motor' => 'Ya',
            'mobil_pribadi' => 'Ya',
            'perahu_bermotor' => 'Tidak',
            'kapal_barang' => 'Tidak',
            'kapal_penumpang' => 'Tidak',
            'kapal_pesiar' => 'Tidak',
            'helikopter_pribadi' => 'Tidak',
            'pesawat_pribadi' => 'Tidak',
            'ternak_besar' => 'Ya',
            'ternak_kecil' => 'Ya',
            'hiasan_emas' => 'Ya',
            'tabungan_bank' => 'Ya',
            'surat_berharga' => 'Tidak',
            'sertifikat_deposito' => 'Tidak',
            'sertifikat_tanah' => 'Ya',
            'sertifikat_bangunan' => 'Ya',
            'perusahaan_industri_besar' => 'Tidak',
            'perusahaan_industri_menengah' => 'Tidak',
            'perusahaan_industri_kecil' => 'Ya',
            'usaha_perikanan' => 'Tidak',
            'usaha_peternakan' => 'Ya',
            'usaha_perkebunan' => 'Ya',
            'usaha_pasar_swalayan' => 'Tidak',
            'usaha_di_pasar_swalayan' => 'Tidak',
            'usaha_di_pasar_tradisional' => 'Ya',
            'usaha_di_pasar_desa' => 'Ya',
            'usaha_transportasi' => 'Tidak',
            'saham_perusahaan' => 'Tidak',
            'pelanggan_telkom' => 'Ya',
            'hp_gsm' => 'Ya',
            'hp_cdma' => 'Tidak',
            'usaha_wartel' => 'Tidak',
            'parabola' => 'Ya',
            'berlangganan_koran' => 'Tidak',
        ]);
    }
}
