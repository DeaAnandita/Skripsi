
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('attachable_type',100);
            $table->unsignedBigInteger('attachable_id');
            $table->string('filename',255);
            $table->string('file_path',255);
            $table->string('mime',50);
            $table->unsignedInteger('size');
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->string('disk',50)->default('public');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void {
        Schema::dropIfExists('attachments');
    }
};
