<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder {
    public function run(): void {
        Role::create(['name'=>'Super Admin','slug'=>'super_admin','description'=>'Super admin desa']);
        Role::create(['name'=>'User','slug'=>'user','description'=>'Warga desa']);
    }
}
