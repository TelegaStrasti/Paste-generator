<?php

namespace App\Services;

use App\Models\Paste;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

final class PasteService
{
    /**
     * Создание новой пасты.
     *
     * @param array $data
     * @return void
     */
    public function store(array $data): void
    {
        $expiresAt = null;

        if ($data['expires'] !== "none") {
            $expiresAt = Carbon::now()->{$data['expires']}();
        }

        $newPasteData = [
            'title' => $data['title'],
            'text' => $data['text'],
            'url' => Str::random(12),
            'access' => $data['access'],
            'expires_at' => $expiresAt,
            'user_id' => Auth::id(),
            'language' => $data['language'],
        ];

        Paste::create($newPasteData);
    }
    public function show($paste){
        if (!$paste->hasAccess($paste->url)) {
            abort(403, 'У вас нет доступа к этой пасте');
        }
    }
}
