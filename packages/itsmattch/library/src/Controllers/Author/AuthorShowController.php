<?php

namespace Itsmattch\Library\Controllers\Author;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Itsmattch\Library\Models\Author;

class AuthorShowController extends Controller
{
    public function __invoke(Author $author): JsonResource
    {
        return $author->toResource();
    }
}
