<?php

declare(strict_types=1);

use Itsmattch\Library\Controllers\Book\BookUpdateController;
use Itsmattch\Library\Models\Author;
use Itsmattch\Library\Models\Book;

covers(BookUpdateController::class);

beforeEach(function () {
    /** @var Author $author */
    $author = Author::factory()->create();
    $this->author = $author;
});

it('updates a book successfully', function () {
    /** @var Book $book */
    $book = Book::factory()->create();
    $newData = [
        'name' => 'Updated Title',
        'author_id' => $this->author->id,
    ];

    $this->putJson('/api/books/'.$book->id, $newData)
        ->assertOk()
        ->assertJsonPath('data.name', 'Updated Title')
        ->assertJsonPath('data.author.id', $this->author->id);

    $this->assertDatabaseHas('books', array_merge(['id' => $book->id], $newData));
});

it('fails to update when the author id is invalid', function () {
    /** @var Book $book */
    $book = Book::factory()->create();
    $badData = [
        'name' => 'New Name',
        'author_id' => 999,
    ];

    $this->putJson('/api/books/'.$book->id, $badData)
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['author_id']);
});

it('returns 404 when the book does not exist', function () {
    $this->putJson('/api/books/999', [
        'name' => 'Doesn’t matter',
        'author_id' => $this->author->id,
    ])->assertNotFound();
});
