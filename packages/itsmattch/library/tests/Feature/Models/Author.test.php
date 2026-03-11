<?php

use Itsmattch\Library\Models\Author;
use Itsmattch\Library\Models\Book;

covers(Author::class);

it('has many books', function () {
    $author = Author::factory()->has(Book::factory()->count(3))->create();

    expect($author->books)->toHaveCount(3);
});
