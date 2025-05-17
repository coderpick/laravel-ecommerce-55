<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Mr. Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('password'),
                'role' => UserType::ADMIN->value,
            ],
            [
                'name' => 'Mr. Manager',
                'email' => 'manager@mail.com',
                'password' => bcrypt('password'),
                'role' => UserType::MANAGER->value,
            ],
            [
                'name' => 'Mr. User',
                'email' => 'user@mail.com',
                'password' => bcrypt('password'),
                'role' => UserType::USER->value,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
