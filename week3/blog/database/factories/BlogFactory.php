<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $slug = null;
        $title = null;
        $post = '';
        $words = '';
        $name = null;

        $title = $this->faker->sentence(3);

        $slug = str_replace(" ", "-", strtolower($title));
        $matched_regex = [];
        preg_match('/[.]/', $slug, $matched_regex);
        $slug = str_replace($matched_regex, '', $slug);

        foreach ($this->faker->paragraphs() as $para) {
            $post = $post . $para . "\n";
        }

        $temp = null;
        $counter = 0;
        do {
            $temp = $this->faker->words();

            foreach ($temp as $word) {
                if (str_contains($post, $word)) {
                    $words = $words . $word . '; ';
                    ++$counter;
                }
            }
        } while ($counter < 3);

        $name = $this->faker->userName();

        return [
            'slug' => $slug,
            'title' => $title,
            'post' => $post,
            'key_words' => $words,
            'author' => $name,
        ];
    }
}
