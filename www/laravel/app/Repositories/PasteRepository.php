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
     * @param string|Paste $url
     * @return Paste
     */
    public function getPaste(string|Paste $url): Paste
    {
        return Paste::query()
            ->where('url', $url)
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
        return Paste::query()
            ->with('user')
            ->active()
            ->join('users', 'users.id', '=', 'pastes.user_id')
            ->select(['pastes.url', 'pastes.text', 'pastes.title', 'users.name as user_name', 'pastes.created_at', 'pastes.updated_at'])
            ->paginate(10);
    }
}
