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
     * @return Paste
     */
    public function store(array $data): Paste
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

        return Paste::create($newPasteData);
    }

    /**
     * Удаление пасты
     *
     * @param Paste $paste
     * @return void
     */
    public function destroy(Paste $paste)
    {
        $paste->delete();
    }
}
