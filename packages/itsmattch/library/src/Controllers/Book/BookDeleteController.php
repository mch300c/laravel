<?php

namespace Itsmattch\Library\Controllers\Book;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Itsmattch\Library\Models\Book;

class BookDeleteController extends Controller
{
    public function __invoke(Book $book): Response
    {
        $book->delete();
        return response()->noContent();
    }
}
