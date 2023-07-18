<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Repositories\Interfaces\PasteBlocksRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

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
     * Получить последние пасты текущего пользователя
     *
     * @return Collection
     */
    public function getLatestUserPastes(): Collection
    {
        $user = Auth::id();
        return Paste::query()
            ->latest()
            ->active()
            ->where('user_id', $user)
            ->take(10)
            ->get();
    }
}
