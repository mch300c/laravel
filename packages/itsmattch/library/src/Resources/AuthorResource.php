<?php

namespace Itsmattch\Library\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Itsmattch\Library\Models\Author;
use Itsmattch\Library\Models\Book;

/**
 * @mixin Author
 */
class AuthorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'books' => BookResource::collection($this->whenLoaded('books')),
        ];
    }
}
