<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->unique()->slug(),
            'image' => fake()->imageUrl(640, 480, 'nature'),
            'excerpt' => fake()->paragraph(),
            'content' => fake()->paragraphs(3, true),
            'category_id' => fake()->numberBetween(1, 10), // Assuming you have 10 categories
            'user_id' => 1,
            'is_published' => fake()->boolean(),
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),    
        ];
    }
}
