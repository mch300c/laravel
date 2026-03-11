<?php

namespace Itsmattch\Library\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Itsmattch\Library\Database\Factories\BookFactory;

class Book extends Model
{
    use HasFactory;

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    protected static function newFactory(): BookFactory
    {
        return BookFactory::new();
    }
}
