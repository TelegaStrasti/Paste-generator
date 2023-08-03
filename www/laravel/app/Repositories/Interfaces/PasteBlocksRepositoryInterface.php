<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface PasteBlocksRepositoryInterface
{
    /**
     * Получить последние пасты
     *
     * @return Collection
     */
    public function getLatestPastes():Collection;

    /**
     * Получить последние текущего пасты юзера
     *
     * @param int $userId
     * @return Collection
     */
    public function getLatestUserPastes(int $userId):Collection;
}
