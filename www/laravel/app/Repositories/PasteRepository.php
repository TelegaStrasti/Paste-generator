<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

class PasteRepository implements PasteRepositoryInterface
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
            ->where('expires_at', '>', Carbon::now())
            ->firstOrFail();
    }

    /**
     * Получить пагинируемый список паст.
     *
     * @return LengthAwarePaginator
     */
    public function getPaginatedPastes(): LengthAwarePaginator
    {
        return Paste::where('expires_at', '>', Carbon::now())
            ->paginate(10);
    }
}
