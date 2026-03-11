<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Itsmattch\Library\Controllers\Author\AuthorIndexController;
use Itsmattch\Library\Controllers\Author\AuthorShowController;
use Itsmattch\Library\Controllers\Book\BookCreateController;
use Itsmattch\Library\Controllers\Book\BookDeleteController;
use Itsmattch\Library\Controllers\Book\BookIndexController;
use Itsmattch\Library\Controllers\Book\BookShowController;
use Itsmattch\Library\Controllers\Book\BookUpdateController;
use Itsmattch\Library\Models\Author;
use Itsmattch\Library\Models\Book;

Route::middleware('api')->prefix('api')->group(function () {

    // Books
    Route::get('books', BookIndexController::class);
    Route::get('books/{book}', BookShowController::class);
    Route::post('books', BookCreateController::class)->can('create', Book::class);
    Route::put('books/{book}', BookUpdateController::class);
    Route::delete('books/{book}', BookDeleteController::class);

    // Authors
    Route::get('authors', AuthorIndexController::class);
    Route::get('authors/{author}', AuthorShowController::class);
});
