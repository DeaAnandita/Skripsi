<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bantuan_sosials', function (Blueprint $table) {
            $table->id();
<<<<<<< Updated upstream

            // // Relasi ke keluargas
            // $table->foreignId('keluarga_id')
            //     ->nullable()
            //     ->constrained('keluargas')
            //     ->cascadeOnDelete();

            // Program-program bantuan
            $table->enum('kks_kps', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('kks_kps_lainnya')->nullable();

            $table->enum('pkh', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('pkh_lainnya')->nullable();

            $table->enum('raskin_bpnt', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('raskin_bpnt_lainnya')->nullable();

            $table->enum('kip', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('kip_lainnya')->nullable();

            $table->enum('kis', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('kis_lainnya')->nullable();

            $table->enum('jamsostek_bpjs_ketenagakerjaan', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('jamsostek_bpjs_ketenagakerjaan_lainnya')->nullable();

            $table->enum('peserta_mandiri_asuransi_lain', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('peserta_mandiri_asuransi_lain_lainnya')->nullable();

            // Workflow verifikasi
            $table->enum('status_verifikasi', [
                'Belum Diverifikasi',
                'Sedang Diverifikasi',
                'Diverifikasi',
                'Ditolak'
            ])->nullable();
            $table->string('alasan_ditolak')->nullable();
            $table->index('status_verifikasi');

            $table->date('tanggal_usul')->nullable();
            $table->date('tanggal_verifikasi')->nullable();
            $table->date('tanggal_penetapan')->nullable();
            $table->string('sk_nomor')->nullable();

            // Distribusi bantuan
            $table->enum('jenis_distribusi', ['Uang Tunai', 'Barang', 'Kartu/Keanggotaan', 'Tidak Ada'])->nullable();
            $table->decimal('jumlah_bantuan', 15, 2)->nullable();
            $table->date('tanggal_distribusi')->nullable();
            $table->index('tanggal_distribusi');
            // $table->string('bukti_distribusi')->nullable();

            // Monitoring & transparansi
            $table->text('catatan_monitoring')->nullable();
            $table->enum('status_transparansi', ['Internal', 'Eksternal', 'Publik'])->nullable();

            // Audit officer
            $table->foreignId('petugas_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->boolean('is_active')->default(true);

            // Timestamp & soft delete
=======
            $table->string('nik_manual', 16)->nullable();
            $table->string('nama_lengkap', 255)->nullable();
            $table->enum('kks_kps', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('kks_kps_lainnya', 255)->nullable();
            $table->enum('pkh', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('pkh_lainnya', 255)->nullable();
            $table->enum('raskin_bpnt', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('raskin_bpnt_lainnya', 255)->nullable();
            $table->enum('kip', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('kip_lainnya', 255)->nullable();
            $table->enum('kis', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('kis_lainnya', 255)->nullable();
            $table->enum('bpjs_ketenagakerjaan', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('bpjs_ketenagakerjaan_lainnya', 255)->nullable();
            $table->enum('asuransi_mandiri', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('asuransi_mandiri_lainnya', 255)->nullable();
            $table->json('kriteria')->nullable();
            $table->date('tanggal_survey')->nullable();
            $table->date('tanggal_penerimaan')->nullable();
            $table->date('tanggal_distribusi')->nullable();
            $table->string('bukti_lampiran')->nullable();
            $table->unsignedBigInteger('created_by')->nullable(); // Menjadikan created_by sebagai kolom biasa tanpa foreign key
>>>>>>> Stashed changes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuan_sosials');
    }
};
