<?php

namespace Database\Seeders;
// database/seeders/RoleSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create the admin and user roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
    }
}

