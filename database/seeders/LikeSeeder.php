<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::select('id')->get();
        $posts = Post::select('id')->get();
        foreach($posts as $post) {
            $randUsers = $users->random(rand(0, $users->count()));
            foreach($randUsers as $user) {
                Like::factory(1)->create(['post_id' => $post->id, 'user_id' => $user->id]);
            }
        }
    }
}
