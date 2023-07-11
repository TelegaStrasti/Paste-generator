<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class PasteRepository implements PasteRepositoryInterface
{
    /**
     * Получить пасту по уникальной ссылку.
     *
     * @param string $url
     * @return Paste
     */
    public function getPaste(string|Paste $url): Paste
    {
        return Paste::where('url', $url)
            ->active()
            ->firstOrFail();
    }

    /**
     * Получить пагинируемый список паст.
     *
     * @return LengthAwarePaginator
     */
    public function getPaginatedPastes(): LengthAwarePaginator
    {
        return Paste::active()
            ->paginate(10);
    }
}
