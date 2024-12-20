<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create(['name' => 'admin']); // Create admin role
        Role::create(['name' => 'user']); // Create user role

        // create user
        $user = User::create([
            'uuid' => Str::uuid(),
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        // assign role to user
        $user->assignRole('admin');

        $runSeeder = new CategorySeeder();
        $runSeeder->run();
    }
}
