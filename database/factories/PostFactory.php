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
            //
            'content' => $this->faker->text,
            'title' => $this->faker->sentence,
            'is_published' => $this->faker->boolean,
            'published_at' => $this->faker->dateTime,
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
