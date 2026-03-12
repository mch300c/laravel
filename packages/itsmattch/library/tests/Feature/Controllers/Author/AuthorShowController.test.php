<?php

declare(strict_types=1);

use Itsmattch\Library\Controllers\Author\AuthorShowController;
use Itsmattch\Library\Models\Author;

covers(AuthorShowController::class);

it('returns a specific book resource', function () {
    /** @var Author $author */
    $author = Author::factory()->create();

    $response = $this->getJson('/api/authors/'.$author->id);
    $response->assertOk();
});

it('returns 404 when the book does not exist', function () {
    $response = $this->getJson('/api/authors/999');
    $response->assertNotFound();
});
