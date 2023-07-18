<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Orchid\Screen\AsSource;

/**
 * App\Models\Complaint
 *
 * @property int $id
 * @property string $text
 * @property int $user_id
 * @property int $paste_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Paste $paste
 * @property-read User $user
 */

class Complaint extends Model
{
    use HasFactory;
    use asSource;

    protected $fillable = [
        'text',
        'user_id',
        'paste_id'
    ];

    /**
     * Получить пользователя
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Получить пасту по жалобе.
     */
    public function paste(): BelongsTo
    {
        return $this->belongsTo(Paste::class);
    }
}
