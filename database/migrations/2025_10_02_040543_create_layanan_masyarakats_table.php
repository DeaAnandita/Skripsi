<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('layanan_masyarakats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->boolean('layanan_ktp')->default(false);
            $table->string('layanan_ktp_lainnya')->nullable()->default(null);
            $table->boolean('layanan_kk')->default(false);
            $table->string('layanan_kk_lainnya')->nullable()->default(null);
            $table->boolean('layanan_akta_kelahiran')->default(false);
            $table->string('layanan_akta_kelahiran_lainnya')->nullable()->default(null);
            $table->boolean('layanan_akta_kematian')->default(false);
            $table->string('layanan_akta_kematian_lainnya')->nullable()->default(null);
            $table->boolean('layanan_akta_perkawinan')->default(false);
            $table->string('layanan_akta_perkawinan_lainnya')->nullable()->default(null);
            $table->boolean('layanan_akta_cerai')->default(false);
            $table->string('layanan_akta_cerai_lainnya')->nullable()->default(null);
            $table->boolean('layanan_sim')->default(false);
            $table->string('layanan_sim_lainnya')->nullable()->default(null);
            $table->boolean('layanan_stnk')->default(false);
            $table->string('layanan_stnk_lainnya')->nullable()->default(null);
            $table->boolean('layanan_pbb')->default(false);
            $table->string('layanan_pbb_lainnya')->nullable()->default(null);
            $table->boolean('layanan_bpjs_kesehatan')->default(false);
            $table->string('layanan_bpjs_kesehatan_lainnya')->nullable()->default(null);
            $table->boolean('layanan_bpjs_ketenagakerjaan')->default(false);
            $table->string('layanan_bpjs_ketenagakerjaan_lainnya')->nullable()->default(null);
            $table->boolean('layanan_kartu_keluarga_sejahtera')->default(false);
            $table->string('layanan_kartu_keluarga_sejahtera_lainnya')->nullable()->default(null);
            $table->boolean('layanan_bantuan_langsung_tunai')->default(false);
            $table->string('layanan_bantuan_langsung_tunai_lainnya')->nullable()->default(null);
            $table->boolean('layanan_sertifikat_tanah')->default(false);
            $table->string('layanan_sertifikat_tanah_lainnya')->nullable()->default(null);
            $table->boolean('layanan_izin_usaha')->default(false);
            $table->string('layanan_izin_usaha_lainnya')->nullable()->default(null);
            $table->boolean('layanan_bantuan_pendidikan')->default(false);
            $table->string('layanan_bantuan_pendidikan_lainnya')->nullable()->default(null);
            $table->boolean('layanan_bantuan_kesehatan')->default(false);
            $table->string('layanan_bantuan_kesehatan_lainnya')->nullable()->default(null);
            $table->boolean('layanan_pengaduan_masyarakat')->default(false);
            $table->string('layanan_pengaduan_masyarakat_lainnya')->nullable()->default(null);
            $table->boolean('layanan_informasi_publik')->default(false);
            $table->string('layanan_informasi_publik_lainnya')->nullable()->default(null);
            $table->boolean('layanan_pendaftaran_sekolah')->default(false);
            $table->string('layanan_pendaftaran_sekolah_lainnya')->nullable()->default(null);
            $table->boolean('layanan_vaksinasi')->default(false);
            $table->string('layanan_vaksinasi_lainnya')->nullable()->default(null);
            $table->boolean('layanan_posyandu')->default(false);
            $table->string('layanan_posyandu_lainnya')->nullable()->default(null);
            $table->boolean('layanan_program_keluarga_berencana')->default(false);
            $table->string('layanan_program_keluarga_berencana_lainnya')->nullable()->default(null);
            $table->boolean('layanan_rehabilitasi_narkoba')->default(false);
            $table->string('layanan_rehabilitasi_narkoba_lainnya')->nullable()->default(null);
            $table->boolean('layanan_bantuan_hukum')->default(false);
            $table->string('layanan_bantuan_hukum_lainnya')->nullable()->default(null);
            $table->boolean('layanan_pemakaman')->default(false);
            $table->string('layanan_pemakaman_lainnya')->nullable()->default(null);
            $table->boolean('layanan_transportasi_sosial')->default(false);
            $table->string('layanan_transportasi_sosial_lainnya')->nullable()->default(null);
            $table->boolean('layanan_penerangan_jalan')->default(false);
            $table->string('layanan_penerangan_jalan_lainnya')->nullable()->default(null);
            $table->boolean('layanan_air_bersih')->default(false);
            $table->string('layanan_air_bersih_lainnya')->nullable()->default(null);
            $table->enum('status_pengajuan', ['pending', 'proses', 'selesai', 'ditolak'])->default('pending');
            $table->text('deskripsi_lengkap')->nullable();
            $table->date('tanggal_pengajuan')->useCurrent();
            $table->date('tanggal_selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_masyarakats');
    }
};