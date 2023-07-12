<?php

namespace App\Models;

use App\Enums\PasteAccesses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Paste
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $url
 * @property string $access
 * @property string $language
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Paste extends Model
{
    use HasFactory;

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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Получить жалобы на пасту.
     */
    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    /**
     * Возвращает только те запросы, срок жизни которых не истек.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('expires_at', '>', Carbon::now())
            ->orWhereNull('expires_at');
    }

    /**
    * Проверяет доступ пользователя к пасте.
    * @param string|null $url
    * @return bool
     */
    public function hasAccess($url = null)
    {
        $user = Auth::user();
        $access = $this->access;

        return $access === PasteAccesses::PUBLIC->value
            || ($user && $access === PasteAccesses::PRIVATE->value && $this->user_id === $user->id)
            || ($access === PasteAccesses::UNLISTED->value && $this->url === $url);
    }
}
