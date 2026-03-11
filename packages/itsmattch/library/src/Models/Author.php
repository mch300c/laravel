<?php

declare(strict_types=1);

namespace Itsmattch\Library\Models;

use Illuminate\Database\Eloquent\Attributes\UseResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Itsmattch\Library\Database\Factories\AuthorFactory;
use Itsmattch\Library\Resources\AuthorResource;

/**
 * @property int $id
 * @property string $name
 * @property Collection $books
 * @property string $last_book_title
 */
#[UseResource(AuthorResource::class)]
class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'last_book_title'];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    protected static function newFactory(): AuthorFactory
    {
        return AuthorFactory::new();
    }
}
