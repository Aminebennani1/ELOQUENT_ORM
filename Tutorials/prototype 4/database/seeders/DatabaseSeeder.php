<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password'=>bcrypt('admin')
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password'=>bcrypt('user')
        ]);
        $this->call([
            RolePermissionSeeder::class,
        ]);
        $user->assignRole('admin');
    }
}