<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
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
            'body' => fake()->sentence(),
            'created_at' => $created,
            'updated_at' => $updated,
        ];
    }
}
