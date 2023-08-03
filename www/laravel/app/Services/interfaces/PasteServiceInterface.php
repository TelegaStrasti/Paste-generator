<?php

namespace App\Services\interfaces;

use App\DTO\PasteDTO;
use App\Models\Paste;

interface PasteServiceInterface
{
    /**
     * Создание новой пасты.
     *
     * @param PasteDTO $pasteDTO
     * @param int $userId
     * @return Paste
     */
    public function store(PasteDTO $pasteDTO, int $userId): Paste;

    /**
     * Удаление пасты
     *
     * @param Paste $paste
     * @return void
     */
    public function destroy(Paste $paste): void;
}
