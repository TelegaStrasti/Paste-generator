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
     * @return Collection
     */
    public function getLatestUserPastes():Collection;
}
