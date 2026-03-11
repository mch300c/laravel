<?php

declare(strict_types=1);

use Itsmattch\Library\Models\Book;

covers(Book::class);

it('has an author', function () {
    $book = Book::factory()->create();

    expect($book->author)->not->toBeNull();
});
