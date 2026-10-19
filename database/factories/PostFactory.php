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

        return [
            'title' => fake()->sentence(),
            'body' => fake()->paragraphs(6, true),
            'created_at' => $created,
            'updated_at' => $updated,
        ];
    }
}
