<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as FakerFactory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {





        // Create an admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt("12345678"),
            'role' => 'admin',
        ]);

        // Create an regular user

        User::create([
            'name' => 'Omar',
            'email' => 'user@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'user'
        ]);

        // Create 10 regular users
        User::factory(20)->create([

            'role' => 'user'
        ]
        );
    }
}
