<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::select('id')->get();
        $posts = Post::select('id')->get();
        foreach($posts as $post) {
            $comments = Comment::factory(rand(0,10))->make(['post_id' => $post->id]);
            foreach($comments as $comment) {
                $comment->user_id = $users->random()->id;
                $comment->save();
            }
        }
    }
}
