<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::select('id')->get();
        foreach($posts as $post) {
            Image::factory(rand(0,5))->create(['post_id' => $post->id]);
        }
    }
}
