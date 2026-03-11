<?php

use Itsmattch\Library\Models\Book;

covers(Book::class);

it('has an author', function () {
    $book = Book::factory()->create();

    expect($book->author)->not->toBeNull();
});
