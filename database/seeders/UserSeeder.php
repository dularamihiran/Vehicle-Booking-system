<?php

namespace Database\Seeders;

// database/seeders/UserSeeder.php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create the admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com', // Admin's email
            'password' => Hash::make('adminpassword'), // Admin's password
        ]);

        // Assign the 'admin' role to this user
        $adminRole = Role::where('name', 'admin')->first();
        $admin->roles()->attach($adminRole);

        // Create some normal users
        User::factory(5)->create()->each(function ($user) {
            // Assign the 'user' role to each normal user
            $userRole = Role::where('name', 'user')->first();
            $user->roles()->attach($userRole);
        });
    }
}

