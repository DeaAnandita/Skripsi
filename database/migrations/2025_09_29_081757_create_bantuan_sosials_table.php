<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bantuan_sosials', function (Blueprint $table) {
            // Primary key
            $table->id();

            // Relasi ke users (sementara sebagai pengganti keluarga, input manual)
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnDelete()
                ->comment('ID user sebagai representasi sementara keluarga, input manual');

            // Program-program bantuan
            $table->enum('kks_kps', ['Ya', 'Tidak', 'Lainnya'])->nullable();

            $table->enum('pkh', ['Ya', 'Tidak', 'Lainnya'])->nullable();

            $table->enum('raskin_bpnt', ['Ya', 'Tidak', 'Lainnya'])->nullable();

            $table->enum('kip', ['Ya', 'Tidak', 'Lainnya'])->nullable();

            $table->enum('kis', ['Ya', 'Tidak', 'Lainnya'])->nullable();

            $table->enum('jamsostek_bpjs_ketenagakerjaan', ['Ya', 'Tidak', 'Lainnya'])->nullable();

            $table->enum('peserta_mandiri_asuransi_lain', ['Ya', 'Tidak', 'Lainnya'])->nullable();

            // Workflow verifikasi
            $table->enum('status_verifikasi', ['Usulan', 'Diverifikasi', 'Ditetapkan', 'Dicabut'])->default('Usulan');
            $table->text('alasan_ditolak')->nullable()->comment('Alasan jika status menjadi Dicabut');
            $table->index('status_verifikasi');

            $table->timestamp('tanggal_usul')->useCurrent();
            $table->timestamp('tanggal_verifikasi')->nullable();
            $table->timestamp('tanggal_penetapan')->nullable();
            $table->string('sk_nomor', 50)->nullable()->comment('Nomor SK penetapan');

            // Distribusi bantuan
            $table->enum('jenis_distribusi', ['Uang Tunai', 'Barang', 'Kartu/Keanggotaan', 'Tidak Ada'])->nullable();
            $table->decimal('jumlah_bantuan', 15, 2)->nullable();
            $table->timestamp('tanggal_distribusi')->nullable();
            $table->enum('bukti_distribusi', ['Ya', 'Tidak', 'Lainnya'])->nullable()->comment('Ketersediaan bukti distribusi');
            $table->string('bukti_distribusi_lainnya')->nullable();
            $table->index('tanggal_distribusi');

            // Monitoring & transparansi
            $table->text('catatan_monitoring')->nullable();
            $table->enum('status_transparansi', ['Internal', 'Eksternal', 'Publik'])->nullable();

            // Audit officer
            $table->foreignId('petugas_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->comment('Petugas yang menangani');
            $table->enum('status_program', ['Aktif', 'Non-Aktif'])->default('Aktif')->comment('Status program');

            // Field tambahan untuk validasi dan kebenaran
            $table->string('nik_manual', 16)->nullable()->comment('NIK yang diinput manual untuk validasi identitas');
            $table->string('nama_lengkap', 100)->nullable()->comment('Nama lengkap penerima, input manual untuk konfirmasi');
            $table->enum('verifikasi_identitas', ['Ya', 'Tidak', 'Lainnya'])->nullable()->comment('Hasil verifikasi identitas via NIK/nama');
            $table->string('verifikasi_identitas_lainnya')->nullable();
            $table->enum('data_lintas_sektor', ['Ya', 'Tidak', 'Lainnya'])->nullable()->comment('Kesesuaian data dengan dinas terkait');
            $table->string('data_lintas_sektor_lainnya')->nullable();
            $table->text('dokumen_pendukung')->nullable()->comment('Upload manual dokumen seperti KK/Akta, untuk validasi');
            $table->enum('konfirmasi_kepala_desa', ['Ya', 'Tidak', 'Lainnya'])->nullable()->comment('Konfirmasi manual oleh Kepala Desa');
            $table->string('konfirmasi_kepala_desa_lainnya')->nullable();

            // Timestamp & soft delete
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bantuan_sosials');
    }
};