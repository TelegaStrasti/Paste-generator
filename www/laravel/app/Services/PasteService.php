<?php

namespace App\Services;

use App\Models\Paste;
use Illuminate\Support\Carbon;
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

        Paste::create([
            'title' => $data['title'],
            'text' => $data['text'],
            'url' => Str::random(12),
            'access' => $data['access'],
            'expires_at' => $expiresAt,
            'user_id' => 1,
            'language' => $data['language'],
        ]);
    }
}
