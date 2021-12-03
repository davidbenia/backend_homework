<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Post;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(),
            'post' => $this->faker->realText(600, 4),
            'key_words' => $this->faker->word() . ", " .  $this->faker->word(),
            'vote_up' => $this->faker->randomNumber(3, false),
            'vote_down' => $this->faker->randomNumber(3, false),
        ];
    }
}
