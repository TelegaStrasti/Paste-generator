<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

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
}
