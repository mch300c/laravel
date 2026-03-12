<?php

declare(strict_types=1);

namespace Itsmattch\Library\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class AuthorIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => 'nullable|string',
        ];
    }
}
