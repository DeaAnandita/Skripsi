
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('role_id')->default(2);
            $table->string('name',100);
            $table->string('username',50)->unique();
            $table->string('email',100)->nullable()->unique();
            $table->string('password',255);
            $table->string('nik',20)->nullable();
            $table->text('alamat')->nullable();
            $table->string('kontak',15)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('restrict');
        });
    }
    public function down(): void {
        Schema::dropIfExists('useers');
    }
};
