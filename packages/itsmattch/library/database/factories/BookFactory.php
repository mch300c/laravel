<?php

namespace Itsmattch\Library\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Itsmattch\Library\Models\Author;
use Itsmattch\Library\Models\Book;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'author_id' => Author::factory(),
        ];
    }
}
