<?php

declare(strict_types=1);

use Itsmattch\Library\Controllers\Book\BookDeleteController;
use Itsmattch\Library\Models\Book;

covers(BookDeleteController::class);

it('deletes a book', function () {
    /** @var Book $book */
    $book = Book::factory()->create();
    $id = $book->id;

    $this->deleteJson('/api/books/'.$id)
        ->assertNoContent();

    $this->assertDatabaseMissing('books', compact('id'));
});

it('returns 404 when the book does not exist', function () {
    $this->deleteJson('/api/books/999')->assertNotFound();
});
