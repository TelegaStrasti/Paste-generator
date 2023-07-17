<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * App\Models\Complaint
 *
 * @property int $id
 * @property string $text
 * @property int $user_id
 * @property int $paste_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Paste $paste
 * @property-read \App\Models\User $user
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
     * Получить автора жалобы.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Получить пасту по жалобе.
     */
    public function paste()
    {
        return $this->belongsTo(Paste::class);
    }
}
