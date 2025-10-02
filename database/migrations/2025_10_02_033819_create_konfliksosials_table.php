<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('konflik_sosials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            // Field indikator konflik sosial
            $table->enum('konflik_tanah', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('konflik_tanah_lainnya')->nullable();

            $table->enum('konflik_pemukiman', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('konflik_pemukiman_lainnya')->nullable();

            $table->enum('konflik_ekonomi', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('konflik_ekonomi_lainnya')->nullable();

            $table->enum('konflik_sosial_budaya', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('konflik_sosial_budaya_lainnya')->nullable();

            $table->enum('konflik_politik', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('konflik_politik_lainnya')->nullable();

            $table->enum('konflik_agraria', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('konflik_agraria_lainnya')->nullable();

            $table->enum('konflik_lingkungan', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('konflik_lingkungan_lainnya')->nullable();

            $table->enum('konflik_kriminalitas', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('konflik_kriminalitas_lainnya')->nullable();

            $table->enum('konflik_etnis', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('konflik_etnis_lainnya')->nullable();

            $table->enum('konflik_agama', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('konflik_agama_lainnya')->nullable();

            $table->enum('konflik_pelayanan_publik', ['Ya', 'Tidak', 'Lainnya'])->nullable();
            $table->string('konflik_pelayanan_publik_lainnya')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konflik_sosials');
    }
};