<?php

declare(strict_types=1);

namespace Itsmattch\Library\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string',
            'author_id' => 'int|exists:authors,id',
        ];
    }
}
