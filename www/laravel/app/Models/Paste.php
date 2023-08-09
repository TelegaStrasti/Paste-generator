<?php

namespace App\Models;

use App\Enums\PasteAccesses;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\AsSource;

/**
 * App\Models\Paste
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $url
 * @property string $access
 * @property string $language
 * @property Carbon|null $expires_at
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Paste extends Model
{
    use HasFactory;
    use asSource;

    protected $fillable = [
        'title',
        'text',
        'url',
        'access',
        'language',
        'expires_at',
        'user_id'
    ];

    /**
     * Получить юзера по пасте.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Получить жалобы на пасту.
     */
    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class);
    }

    /**
     * Возвращает только те запросы, срок жизни которых не истек.
     *
     * @param Builder<Paste> $query
     * @return Builder<Paste>
     * @phpstan-ignore-next-line
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('expires_at', '>', Carbon::now())
            ->orWhereNull('expires_at');
    }
}
