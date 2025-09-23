
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('rekomendasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('aset_keluarga_id')->nullable();
            $table->unsignedBigInteger('aset_lahan_id')->nullable();
            $table->string('jenis_rekomendasi',100);
            $table->text('deskripsi');
            $table->decimal('confidence_score',5,2)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('rekomendasis');
    }
};
