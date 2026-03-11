<?php

namespace Itsmattch\Library\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'author_id' => 'required|int|exists:authors,id',
        ];
    }
}
