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
        return Paste::latest()
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
        return Paste::latest()
            ->where('user_id', $user)
            ->take(10)
            ->get();
    }
}
