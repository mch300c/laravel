<?php

declare(strict_types=1);

namespace Itsmattch\Library\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Itsmattch\Library\Models\Book;

/**
 * @mixin Book
 */
class BookResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'author' => AuthorResource::make($this->whenLoaded('author')),
        ];
    }
}
