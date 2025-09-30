<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        User::firstOrCreate(
            ['username' => 'admin'], // cek berdasarkan username
            [
                'role_id' => 1,
                'name' => 'Admin Desa',
                'email' => 'admin@desa.com',
                'password' => Hash::make('password'),
            ]
        );

        User::firstOrCreate(
            ['username' => 'warga1'],
            [
                'role_id' => 2,
                'name' => 'Warga Satu',
                'email' => 'warga1@desa.com',
                'password' => Hash::make('warga123'),
            ]
        );
    }
}
