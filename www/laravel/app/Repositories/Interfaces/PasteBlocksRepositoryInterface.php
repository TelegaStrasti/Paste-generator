<?php

namespace App\Repositories\Interfaces;

use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;

interface PasteBlocksRepositoryInterface
{
    /**
     * Получить последние пасты
     *
     * @return Paste
     */
    public function getLatestPastes():Collection;

    /**
     * Получить последние текущего пасты юзера
     *
     * @return Paste
     */
    public function getLatestUserPastes():Collection;
}
