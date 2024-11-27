<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{

    protected $genres = [
        'Action',
        'Comedy',
        'Drama',
        'Horror',
        'Romance',
        'Sci-Fi',
        'Thriller',
        'Fantasy'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "book_title" => fake()->company(),
            "author" => fake()->name(),
            "genre" => Arr::random($this->genres),
            "description" => fake()->text(),
            "availability" => fake()->randomDigit(),
            "published_date" => fake()->date(),
        ];
    }
}
