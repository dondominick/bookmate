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
        'action',
        'historical',
        'children',
        'non-fiction',
        'horror',
        'history',
        'literary',
        'sci-fi'
    ];

    protected $bookTitles = [
        "To Kill a Mockingbird",
        "1984",
        "The Great Gatsby",
        "The Catcher in the Rye",
        "Pride and Prejudice",
        "Moby-Dick",
        "The Lord of the Rings",
        "Harry Potter and the Sorcerer's Stone",
        "The Hobbit",
        "The Da Vinci Code",
        "The Alchemist",
        "The Book Thief",
        "To Kill a Mockingbird",
        "1984",
        "The Great Gatsby",
        "The Catcher in the Rye",
        "Pride and Prejudice",
        "Moby-Dick",
        "The Lord of the Rings",
        "Harry Potter and the Sorcerer's Stone",
        "The Hobbit",
        "The Da Vinci Code",
        "The Alchemist",
        "The Book Thief",
        "War and Peace",
        "The Chronicles of Narnia",
        "The Kite Runner",
        "Brave New World",
        "Crime and Punishment",
        "The Adventures of Huckleberry Finn",
        "The Fault in Our Stars",
        "Jane Eyre",
        "Wuthering Heights",
        "The Girl with the Dragon Tattoo",
        "Animal Farm",
        "The Shining",
        "Gone Girl",
        "A Game of Thrones",
        "The Handmaid's Tale",
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "book_title" => Arr::random($this->bookTitles),
            "author" => fake()->name(),
            "genre" => Arr::random($this->genres),
            "description" => fake()->text(),
            "availability" => fake()->randomDigit(),
            "published_date" => fake()->date(),
        ];
    }
}
