<?php

declare(strict_types=1);

use Itsmattch\Library\Controllers\Author\AuthorIndexController;
use Itsmattch\Library\Models\Author;

covers(AuthorIndexController::class);

it('returns all authors', function () {
    Author::factory()->count(10)->create();

    $response = $this->getJson('/api/authors');
    $response->assertOk();
    $response->assertJsonCount(10, 'data');
    $response->assertExactJsonStructure([
        'data' => [
            '*' => ['id', 'name', 'books' => ['*' => ['id', 'name']]],
        ],
        'links',
        'meta',
    ]);
});

it('paginates results', function () {
    Author::factory()->count(100)->create();

    $response = $this->getJson('/api/authors');
    $response->assertJsonCount(15, 'data');
});

it('filters authors by book title', function () {
    $match = Author::factory()->hasBooks(1, ['name' => 'The Great Gatsby'])->create();
    Author::factory()->hasBooks(1, ['name' => '1984'])->create();
    Author::factory()->hasBooks(1, ['name' => 'Tarzan'])->create();

    $response = $this->getJson('/api/authors?search=Gatsby');
    $response->assertOk();
    $response->assertJsonCount(1, 'data');
    $response->assertJsonPath('data.0.id', $match->id);
});
