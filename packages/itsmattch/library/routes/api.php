<?php

use Illuminate\Support\Facades\Route;
use Itsmattch\Library\Controllers\Author\AuthorIndexController;
use Itsmattch\Library\Controllers\Author\AuthorShowController;
use Itsmattch\Library\Controllers\Book\BookCreateController;
use Itsmattch\Library\Controllers\Book\BookDeleteController;
use Itsmattch\Library\Controllers\Book\BookShowController;
use Itsmattch\Library\Controllers\Book\BookIndexController;
use Itsmattch\Library\Controllers\Book\BookUpdateController;
use Itsmattch\Library\Models\Author;
use Itsmattch\Library\Models\Book;

Route::middleware('api')->prefix('api')->group(function () {

    // Books
    Route::get('books', BookIndexController::class)->can('viewAny', Book::class);
    Route::get('books/{book}', BookShowController::class)->can('show', Book::class);
    Route::post('books', BookCreateController::class)->can('create', Book::class);
    Route::put('books/{book}', BookUpdateController::class)->can('update', Book::class);
    Route::delete('books/{book}', BookDeleteController::class)->can('delete', Book::class);

    // Authors
    Route::get('authors', AuthorIndexController::class)->can('viewAny', Author::class);
    Route::get('authors/{author}', AuthorShowController::class)->can('viewAny', Author::class);
});
