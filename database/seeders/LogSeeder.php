<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Log;

class LogSeeder extends Seeder {
    public function run(): void {
        Log::create(['user_id'=>1,'aksi'=>'Tambah aset keluarga','tabel'=>'aset_keluargas','id_record'=>1]);
        Log::create(['user_id'=>1,'aksi'=>'Tambah aset lahan','tabel'=>'aset_lahans','id_record'=>1]);
    }
}
