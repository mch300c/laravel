<?php

use Itsmattch\Library\Controllers\Book\BookCreateController;
use Itsmattch\Library\Models\Author;

covers(BookCreateController::class);

it('creates a book with a valid author', function () {
    /** @var Author $author */
    $author = Author::factory()->create();

    $data = [
        'name' => 'The Martian',
        'author_id' => $author->id,
    ];

    $this->postJson('/api/books', $data)
        ->assertCreated()
        ->assertJsonPath('data.name', 'The Martian')
        ->assertJsonPath('data.author.id', $author->id);

    $this->assertDatabaseHas('books', $data);
});

it('fails to create a book when the author does not exist', function () {
    $data = [
        'name' => 'Invalid Book',
        'author_id' => 999,
    ];

    $this->postJson('/api/books', $data)
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['author_id']);

    $this->assertDatabaseEmpty('books');
});
