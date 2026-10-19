<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $created = Carbon::create(fake()->dateTimeBetween());
        $updated = fake()->dateTimeBetween($created, Carbon::create($created)->addDays(3));
        if(rand(0,9)){
            $updated = $created;
        }
        
        $imageUrl = null;
        if(rand(0,9)){
            $imageUrl = 'https://picsum.photos/seed/'. fake()->uuid() .'/1280/960';
        }
        return [
            'title' => fake()->sentence(),
            'body' => fake()->paragraphs(6, true),
            'image_path' => $imageUrl,
            'created_at' => $created,
            'updated_at' => $updated,
        ];
    }
}
