<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('aset_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            // Field indikator
            $table->enum('tabung_gas', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('tabung_gas_lainnya')->nullable();

            $table->enum('komputer_laptop', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('komputer_laptop_lainnya')->nullable();

            $table->enum('tv_elektronik', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('tv_elektronik_lainnya')->nullable();

            $table->enum('ac_pendingin', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('ac_pendingin_lainnya')->nullable();

            $table->enum('kulkas', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('kulkas_lainnya')->nullable();

            $table->enum('water_heater', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('water_heater_lainnya')->nullable();

            $table->enum('rumah_tempat_lain', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('rumah_tempat_lain_lainnya')->nullable();

            $table->enum('diesel_listrik', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('diesel_listrik_lainnya')->nullable();

            $table->enum('sepeda_motor', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('sepeda_motor_lainnya')->nullable();

            $table->enum('mobil_pribadi', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('mobil_pribadi_lainnya')->nullable();

            $table->enum('perahu_bermotor', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('perahu_bermotor_lainnya')->nullable();

            $table->enum('kapal_barang', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('kapal_barang_lainnya')->nullable();

            $table->enum('kapal_penumpang', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('kapal_penumpang_lainnya')->nullable();

            $table->enum('kapal_pesiar', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('kapal_pesiar_lainnya')->nullable();

            $table->enum('helikopter_pribadi', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('helikopter_pribadi_lainnya')->nullable();

            $table->enum('pesawat_pribadi', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('pesawat_pribadi_lainnya')->nullable();

            $table->enum('ternak_besar', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('ternak_besar_lainnya')->nullable();

            $table->enum('ternak_kecil', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('ternak_kecil_lainnya')->nullable();

            $table->enum('hiasan_emas', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('hiasan_emas_lainnya')->nullable();

            $table->enum('tabungan_bank', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('tabungan_bank_lainnya')->nullable();

            $table->enum('surat_berharga', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('surat_berharga_lainnya')->nullable();

            $table->enum('sertifikat_deposito', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('sertifikat_deposito_lainnya')->nullable();

            $table->enum('sertifikat_tanah', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('sertifikat_tanah_lainnya')->nullable();

            $table->enum('sertifikat_bangunan', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('sertifikat_bangunan_lainnya')->nullable();

            $table->enum('perusahaan_industri_besar', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('perusahaan_industri_besar_lainnya')->nullable();

            $table->enum('perusahaan_industri_menengah', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('perusahaan_industri_menengah_lainnya')->nullable();

            $table->enum('perusahaan_industri_kecil', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('perusahaan_industri_kecil_lainnya')->nullable();

            $table->enum('usaha_perikanan', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('usaha_perikanan_lainnya')->nullable();

            $table->enum('usaha_peternakan', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('usaha_peternakan_lainnya')->nullable();

            $table->enum('usaha_perkebunan', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('usaha_perkebunan_lainnya')->nullable();

            $table->enum('usaha_pasar_swalayan', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('usaha_pasar_swalayan_lainnya')->nullable();

            $table->enum('usaha_di_pasar_swalayan', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('usaha_di_pasar_swalayan_lainnya')->nullable();

            $table->enum('usaha_di_pasar_tradisional', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('usaha_di_pasar_tradisional_lainnya')->nullable();

            $table->enum('usaha_di_pasar_desa', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('usaha_di_pasar_desa_lainnya')->nullable();

            $table->enum('usaha_transportasi', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('usaha_transportasi_lainnya')->nullable();

            $table->enum('saham_perusahaan', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('saham_perusahaan_lainnya')->nullable();

            $table->enum('pelanggan_telkom', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('pelanggan_telkom_lainnya')->nullable();

            $table->enum('hp_gsm', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('hp_gsm_lainnya')->nullable();

            $table->enum('hp_cdma', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('hp_cdma_lainnya')->nullable();

            $table->enum('usaha_wartel', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('usaha_wartel_lainnya')->nullable();

            $table->enum('parabola', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('parabola_lainnya')->nullable();

            $table->enum('berlangganan_koran', ['Ya','Tidak','Lainnya'])->nullable();
            $table->string('berlangganan_koran_lainnya')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset_keluargas');
    }
};
