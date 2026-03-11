<?php

use Itsmattch\Library\Controllers\Book\BookIndexController;
use Itsmattch\Library\Models\Book;

covers(BookIndexController::class);

it('returns all books', function () {
    Book::factory()->count(10)->create();

    $response = $this->getJson('/api/books');
    $response->assertOk();
    $response->assertJsonCount(10, 'data');
    $response->assertExactJsonStructure([
        'data' => [
            '*' => ['id', 'name', 'author' => ['id', 'name']]
        ],
        'links',
        'meta'
    ]);
});

it('paginates results', function () {
    Book::factory()->count(100)->create();

    $response = $this->getJson('/api/books');
    $response->assertJsonCount(15, 'data');
});
