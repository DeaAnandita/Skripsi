<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration {
         public function up(): void
         {
             Schema::create('sarpras_kerjas', function (Blueprint $table) {
                 $table->id();
                 $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

                 // Field indikator sarana prasarana kerja
                 $table->enum('mesin_kerja', ['Ya', 'Tidak', 'Lainnya'])->nullable();
                 $table->string('mesin_kerja_lainnya')->nullable();

                 $table->enum('komputer_kerja', ['Ya', 'Tidak', 'Lainnya'])->nullable();
                 $table->string('komputer_kerja_lainnya')->nullable();

                 $table->enum('meja_kantor', ['Ya', 'Tidak', 'Lainnya'])->nullable();
                 $table->string('meja_kantor_lainnya')->nullable();

                 $table->enum('kursi_kantor', ['Ya', 'Tidak', 'Lainnya'])->nullable();
                 $table->string('kursi_kantor_lainnya')->nullable();

                 $table->enum('mobil_operasional', ['Ya', 'Tidak', 'Lainnya'])->nullable();
                 $table->string('mobil_operasional_lainnya')->nullable();

                 $table->enum('sepeda_motor_kerja', ['Ya', 'Tidak', 'Lainnya'])->nullable();
                 $table->string('sepeda_motor_kerja_lainnya')->nullable();

                 $table->enum('alat_berat', ['Ya', 'Tidak', 'Lainnya'])->nullable();
                 $table->string('alat_berat_lainnya')->nullable();

                 $table->enum('internet_kerja', ['Ya', 'Tidak', 'Lainnya'])->nullable();
                 $table->string('internet_kerja_lainnya')->nullable();

                 $table->enum('printer_scanner', ['Ya', 'Tidak', 'Lainnya'])->nullable();
                 $table->string('printer_scanner_lainnya')->nullable();

                 $table->enum('telepon_kantor', ['Ya', 'Tidak', 'Lainnya'])->nullable();
                 $table->string('telepon_kantor_lainnya')->nullable();

                 $table->timestamps();
             });
         }

         public function down(): void
         {
             Schema::dropIfExists('sarpras_kerjas');
         }
     };