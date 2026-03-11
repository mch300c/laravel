<?php

declare(strict_types=1);

namespace Itsmattch\Library\Models;

use Illuminate\Database\Eloquent\Attributes\UseResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Itsmattch\Library\Database\Factories\BookFactory;
use Itsmattch\Library\Resources\BookResource;

/**
 * @property int $id
 * @property string $name
 * @property int $author_id
 * @property Author $author
 */
#[UseResource(BookResource::class)]
class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'author_id'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    protected static function newFactory(): BookFactory
    {
        return BookFactory::new();
    }
}
