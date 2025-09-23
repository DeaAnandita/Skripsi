<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        User::create(['role_id'=>1,'name'=>'Admin Desa','username'=>'admin','email'=>'admin@desa.com','password'=>Hash::make('password')]);
        User::create(['role_id'=>2,'name'=>'Warga Satu','username'=>'warga1','email'=>'warga1@desa.com','password'=>Hash::make('warga123')]);
    }
}
