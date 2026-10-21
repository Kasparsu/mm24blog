<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(10)->create();
        $posts = Post::select('id')->get();
        foreach($posts as $post) {
            $randomTags = $tags->random(rand(0,10));
            $post->tags()->attach($randomTags);
        }
    }
}
