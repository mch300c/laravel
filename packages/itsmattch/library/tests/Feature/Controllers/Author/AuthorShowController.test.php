<?php

use Itsmattch\Library\Controllers\Author\AuthorShowController;
use Itsmattch\Library\Models\Author;

covers(AuthorShowController::class);

it('returns a specific book resource', function () {
    /** @var Author $author */
    $author = Author::factory()->create();

    $this->getJson('/api/authors/' . $author->id)->assertOk();
});

it('returns 404 when the book does not exist', function () {
    $this->getJson('/api/authors/999')->assertNotFound();
});
