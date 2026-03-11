<?php

namespace Itsmattch\Library\Controllers\Book;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Itsmattch\Library\Models\Book;
use Itsmattch\Library\Requests\Book\BookCreateRequest;

class BookCreateController extends Controller
{
    public function __invoke(BookCreateRequest $request): JsonResource
    {
        $book = Book::create($request->validated());

        return $book->load('author')->toResource();
    }
}
