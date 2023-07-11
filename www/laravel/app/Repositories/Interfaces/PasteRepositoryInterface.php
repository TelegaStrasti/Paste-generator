<?php

namespace App\Repositories\Interfaces;

use App\Models\Paste;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PasteRepositoryInterface
{
    /**
     * Получить пагинируемый список паст.
     *
     * @return LengthAwarePaginator
     */
    public function getPaginatedPastes(): LengthAwarePaginator;

    /**
     * Получить пасту.
     *
     * @param Paste $paste
     * @return Paste
     */
    public function getPaste(Paste $paste): Paste;
}
