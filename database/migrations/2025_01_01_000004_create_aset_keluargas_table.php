<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('aset_keluargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_aset',150);
            $table->enum('kategori', ['Rumah','Kendaraan','Tabungan','Usaha','Elektronik','Lainnya']);
            $table->decimal('nilai_aset', 15, 2)->nullable();
            $table->year('tahun_perolehan')->nullable();
            $table->enum('status_aset', ['Aktif','Dijual','Dipakai','Rusak','Hilangan'])->default('Aktif');
            $table->text('deskripsi')->nullable();
            $table->json('dokumen_ids')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void {
        Schema::dropIfExists('aset_keluargas');
    }
};
