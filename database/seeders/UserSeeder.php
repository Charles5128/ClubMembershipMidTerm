<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {

        $adminRole = Role::firstOrCreate(['name' => 'Administrator']);
        $userRole = Role::firstOrCreate(['name' => 'Data Entry']);


        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'charlespangan144u@gmail.com',
            'password' => Hash::make('panganian123'),
        ]);
        $admin->assignRole($adminRole);


        $user = User::create([
            'name' => 'Regular User',
            'email' => 'charlespangan2@gmail.com',
            'password' => Hash::make('iyan5128'),
        ]);
        $user->assignRole($userRole);

        echo "✅ Admin and Regular User created successfully! 🎉\n";
    }
}
