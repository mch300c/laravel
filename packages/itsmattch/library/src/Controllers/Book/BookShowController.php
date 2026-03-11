<?php

namespace Itsmattch\Library\Controllers\Book;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Itsmattch\Library\Models\Book;

class BookShowController extends Controller
{
    public function __invoke(Book $book): JsonResource
    {
        return $book->toResource();
    }
}
