<?php

namespace App\Repositories\Interfaces;

use App\Models\Paste;

interface PasteRepositoryInterface
{
    /**
     * Получить пагинируемый список паст.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginatedPastes();

    /**
     * Палучить пасту.
     *
     * @param Paste $paste
     * @return Paste
     */
    public function getPaste(Paste $paste);
}
