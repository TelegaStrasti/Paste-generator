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
     * Получить пасту по url.
     *
     * @param string $url
     * @return Paste
     */
    public function getPaste(string $url): Paste;
}
