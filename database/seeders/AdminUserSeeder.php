<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@arswoodworks.com')],
            [
                'name' => env('ADMIN_NAME', 'ARS Admin'),
                'password' => Hash::make(env('ADMIN_PASSWORD', 'Admin@12345')),
                'is_admin' => true,
            ]
        );
    }
}
