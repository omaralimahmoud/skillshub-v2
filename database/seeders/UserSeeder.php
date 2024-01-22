<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'omar Ali',
            'email' => 'omar@gmail.com',
            'password' => Hash::make('123456789'),
        ])->assignRole(['superAdmin']);
    }
}
