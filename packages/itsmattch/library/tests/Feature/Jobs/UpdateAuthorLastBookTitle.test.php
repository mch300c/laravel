<?php

declare(strict_types=1);

use Itsmattch\Library\Jobs\UpdateAuthorLastBookTitle;
use Itsmattch\Library\Models\Book;

covers(UpdateAuthorLastBookTitle::class);

it('updates the author last book title', function () {
    /** @var Book $book */
    $book = Book::factory()->create();

    (new UpdateAuthorLastBookTitle($book))->handle();

    $this->assertDatabaseHas('authors', [
        'id' => $book->author->id,
        'last_book_title' => $book->name,
    ]);
});
