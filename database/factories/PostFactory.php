<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            'title' => fake()->name(),
            'description' => fake()->paragraph(),
            'image' => fake()->randomElement(['https://images.pexels.com/photos/31002445/pexels-photo-31002445/free-photo-of-elegant-grey-heron-by-hiroshima-water-s-edge.jpeg?auto=compress&cs=tinysrgb&w=260&h=750&dpr=2','https://images.pexels.com/photos/16130179/pexels-photo-16130179/free-photo-of-close-up-of-head-of-a-heron-on-the-background-of-water.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2','https://images.pexels.com/photos/29446295/pexels-photo-29446295/free-photo-of-majestic-heron-in-northern-ireland-wetlands.jpeg?auto=compress&cs=tinysrgb&w=260&h=750&dpr=2','https://images.pexels.com/photos/29934040/pexels-photo-29934040/free-photo-of-yoga-practice-in-lotus-field-near-h-i-an-vietnam.jpeg?auto=compress&cs=tinysrgb&w=260&h=750&dpr=2']),
            'user_id' => User::factory(),
            'status' => fake()->randomElement([0, 1]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
