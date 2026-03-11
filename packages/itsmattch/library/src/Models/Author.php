<?php

namespace Itsmattch\Library\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Itsmattch\Library\Database\Factories\AuthorFactory;

class Author extends Model
{
    use HasFactory;

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    protected static function newFactory(): AuthorFactory
    {
        return AuthorFactory::new();
    }
}
