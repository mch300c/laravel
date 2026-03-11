<?php

declare(strict_types=1);

namespace Itsmattch\Library\Controllers\Book;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;
use Itsmattch\Library\Models\Book;
use Throwable;

class BookIndexController extends Controller
{
    /** @throws Throwable */
    public function __invoke(): ResourceCollection
    {
        return Book::with('author')->paginate(15)->toResourceCollection();
    }
}
