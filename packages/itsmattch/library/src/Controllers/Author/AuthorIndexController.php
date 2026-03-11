<?php

declare(strict_types=1);

namespace Itsmattch\Library\Controllers\Author;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;
use Itsmattch\Library\Models\Author;
use Throwable;

class AuthorIndexController extends Controller
{
    /** @throws Throwable */
    public function __invoke(): ResourceCollection
    {
        return Author::with('books')->paginate(15)->toResourceCollection();
    }
}
