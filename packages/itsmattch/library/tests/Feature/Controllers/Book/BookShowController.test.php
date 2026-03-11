<?php

declare(strict_types=1);

use Itsmattch\Library\Controllers\Book\BookShowController;
use Itsmattch\Library\Models\Book;

covers(BookShowController::class);

it('returns a specific book resource', function () {
    /** @var Book $book */
    $book = Book::factory()->create();

    $this->getJson('/api/books/'.$book->id)->assertOk();
});

it('returns 404 when the book does not exist', function () {
    $this->getJson('/api/books/999')->assertNotFound();
});
