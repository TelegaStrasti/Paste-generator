<?php

namespace App\Services;

use App\DTO\PasteDTO;
use App\Models\Paste;
use App\Services\interfaces\PasteServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

final class PasteService implements PasteServiceInterface
{
    /**
     * Создание новой пасты.
     *
     * @param PasteDTO $pasteDTO
     * @param int|null $userId
     * @return Paste
     */
    public function store(PasteDTO $pasteDTO, null|int $userId): Paste
    {
        $expiresAt = null;

        if ($pasteDTO->getExpires() !== "none") {
            $expiresAt = Carbon::now()->{$pasteDTO->getExpires()}();
        }

        $newPasteData = [
            'title' => $pasteDTO->getTitle(),
            'text' => $pasteDTO->getText(),
            'url' => Str::random(12),
            'access' => $pasteDTO->getAccess(),
            'expires_at' => $expiresAt,
            'user_id' => $userId,
            'language' => $pasteDTO->getLanguage(),
        ];

        return Paste::create($newPasteData);
    }

    /**
     * Удаление пасты
     *
     * @param Paste $paste
     * @return void
     */
    public function destroy(Paste $paste): void
    {
        $paste->delete();
    }
}
