<?php

declare(strict_types=1);

namespace Itsmattch\Library\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Itsmattch\Library\Models\Book;

class UpdateAuthorLastBookTitle implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Book $book
    ) {}

    public function handle(): void
    {
        $this->book->author->update([
            'last_book_title' => $this->book->name,
        ]);
    }
}
