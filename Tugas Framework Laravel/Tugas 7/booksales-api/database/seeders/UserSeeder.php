<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Alice',
            'email' => 'alice@example.com',
            'password' => bcrypt('Alice123'),
            'role' => 'customer'
        ]);

        User::create([
            'name' => 'Bob Smith',
            'email' => 'bobsmith@example.com',
            'password' => bcrypt('bob123'),
            'role' => 'customer'
        ]);
    }
}
