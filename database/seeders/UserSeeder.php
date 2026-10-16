<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => env('DEFAULT_USER_NAME', 'User McUserface'),
            'email' => env('DEFAULT_USER_EMAIL', 'user@user.user'),
            'password' => env('DEFAULT_USER_PASSWORD_HASH', Hash::make('password')),
        ]);
    }
}
