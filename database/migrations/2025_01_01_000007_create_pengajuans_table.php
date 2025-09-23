
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('kategori_aset',['Keluarga','Lahan']);
            $table->unsignedBigInteger('id_aset')->nullable();
            $table->string('jenis_pengajuan',150);
            $table->text('deskripsi')->nullable();
            $table->enum('status',['Menunggu','Diproses','Disetujui','Ditolak'])->default('Menunggu');
            $table->date('tanggal_pengajuan');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pengajuans');
    }
};
