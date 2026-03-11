<?php

declare(strict_types=1);

use Itsmattch\Library\Models\Author;
use Itsmattch\Library\Models\Book;

covers(Author::class);

it('has many books', function () {
    /** @var Author $author */
    $author = Author::factory()->has(Book::factory()->count(3))->create();

    expect($author->books)->toHaveCount(3);
});
