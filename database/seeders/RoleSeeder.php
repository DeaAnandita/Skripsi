<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder {
    public function run(): void {
<<<<<<< Updated upstream
        Role::create(['name'=>'Super Admin','slug'=>'super_admin','description'=>'Super admin desa']);
        Role::create(['name'=>'User','slug'=>'user','description'=>'Warga desa']);
=======
        Role::firstOrCreate(
            ['slug' => 'super_admin'], // kondisi unik
            ['name' => 'Super Admin', 'description' => 'Super admin desa']
        );

        Role::firstOrCreate(
            ['slug' => 'user'],
            ['name' => 'User', 'description' => 'Warga desa']
        );

        Role::firstOrCreate(
            ['slug' => 'dev'],
            ['name' => 'Dev', 'description' => 'Developer']
        );
>>>>>>> Stashed changes
    }
}
