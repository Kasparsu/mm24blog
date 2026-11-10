<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::select('id')->get();
        foreach($users as $user){
            $randUsers = $users->random(rand(0, $users->count()));
            $user->followers()->attach($randUsers);
        }
    }
}
