<?php

use Itsmattch\Library\Controllers\Author\AuthorIndexController;
use Itsmattch\Library\Models\Author;

covers(AuthorIndexController::class);

it('returns all authors', function () {
    Author::factory()->count(10)->create();

    $this->getJson('/api/authors')
        ->assertOk()
        ->assertJsonCount(10, 'data')
        ->assertExactJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'books' => ['*' => ['id', 'name']]]
            ],
            'links',
            'meta'
        ]);
});

it('paginates results', function () {
    Author::factory()->count(100)->create();

    $this->getJson('/api/authors')
        ->assertJsonCount(15, 'data');
});
