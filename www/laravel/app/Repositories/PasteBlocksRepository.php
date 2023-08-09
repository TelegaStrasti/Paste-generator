<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Repositories\Interfaces\PasteBlocksRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PasteBlocksRepository implements PasteBlocksRepositoryInterface
{

    /**
     * Получить последние пасты
     *
     * @return Collection
     */
    public function getLatestPastes(): Collection
    {
        return Paste::query()
            ->latest()
            ->active()
            ->take(10)
            ->get();
    }

    /**
     * Получить последние текущего пасты юзера
     *
     * @param int|null $userId
     * @return Collection
     */
    public function getLatestUserPastes(null|int $userId): Collection
    {
        return Paste::query()
            ->latest()
            ->active()
            ->where('user_id', $userId)
            ->take(10)
            ->get();
    }
}
