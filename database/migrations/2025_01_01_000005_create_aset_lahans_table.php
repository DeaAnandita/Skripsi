
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('aset_lahans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_lahan',30)->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('nama_lahan',150);
            $table->string('alamat',255)->nullable();
            $table->string('rt_rw',20)->nullable();
            $table->string('desa',100)->nullable();
            $table->string('kecamatan',100)->nullable();
            $table->string('kabupaten',100)->nullable();
            $table->string('provinsi',100)->nullable();
            $table->decimal('luas_m2',12,2);
            $table->enum('satuan',['m2','ha'])->default('m2');
            $table->decimal('koordinat_lat',10,7)->nullable();
            $table->decimal('koordinat_lng',10,7)->nullable();
            $table->enum('status',['Kosong','Digunakan','Disewa','Sengketa','Terdaftar'])->default('Kosong');
            $table->enum('kepemilikan',['Milik Pribadi','Milik Desa','Sewa','Pinjam Pakai'])->nullable();
            $table->string('nomor_sertifikat',100)->nullable();
            $table->unsignedBigInteger('dokumen_sertifikat_id')->nullable();
            $table->unsignedBigInteger('foto_cover_id')->nullable();
            $table->json('dokumen_lain')->nullable();
            $table->decimal('harga_sewa_bulanan',12,2)->nullable();
            $table->boolean('irigasi')->default(false);
            $table->enum('soil_type',['Latosol','Alluvial','Regosol','Podsolik','Lainnya'])->nullable();
            $table->decimal('slope_percent',5,2)->nullable();
            $table->decimal('jarak_pasar_km',6,2)->nullable();
            $table->enum('akses_jalan',['Aspal','Tanah','No Access'])->default('No Access');
            $table->string('previous_planting',100)->nullable();
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->enum('verification_status',['Pending','Verified','Rejected'])->default('Pending');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void {
        Schema::dropIfExists('aset_lahans');
    }
};
