<?php

declare(strict_types=1);

namespace Itsmattch\Library\Controllers\Author;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;
use Itsmattch\Library\Models\Author;
use Itsmattch\Library\Requests\Author\AuthorIndexRequest;
use Throwable;

class AuthorIndexController extends Controller
{
    /** @throws Throwable */
    public function __invoke(AuthorIndexRequest $request): ResourceCollection
    {
        return Author::with('books')
            ->bookTitle($request->validated('search'))
            ->paginate(15)
            ->toResourceCollection();
    }
}
