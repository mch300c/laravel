<?php

declare(strict_types=1);

use Itsmattch\Library\Controllers\Book\BookDeleteController;
use Itsmattch\Library\Models\Book;

covers(BookDeleteController::class);

it('deletes a book', function () {
    /** @var Book $book */
    $book = Book::factory()->create();

    $response = $this->deleteJson('/api/books/'.$book->id);
    $response->assertNoContent();
    $this->assertDatabaseMissing('books', ['id' => $book->id]);
});

it('returns 404 when the book does not exist', function () {
    $this->deleteJson('/api/books/999')->assertNotFound();
});
