<?php

declare(strict_types=1);

namespace Itsmattch\Library\Controllers\Book;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Itsmattch\Library\Models\Book;
use Itsmattch\Library\Requests\Book\BookUpdateRequest;

class BookUpdateController extends Controller
{
    public function __invoke(Book $book, BookUpdateRequest $request): JsonResource
    {
        $book->fill($request->validated());
        $book->save();

        return $book->refresh()->load('author')->toResource();
    }
}
