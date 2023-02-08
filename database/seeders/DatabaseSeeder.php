<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Doctor'
        ]);

        Role::create([
            'name' => 'Admin'
        ]);

        Role::create([
            'name' => 'Patient'
        ]);

        User::create([
            'name' => 'karem',
            'email' => 'karem@admin.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
            'gender' => 'male'
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
