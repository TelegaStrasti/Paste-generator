<?php

namespace App\Repositories\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface ComplaintsRepositoryInterface
{
    /**
     * Получить пагинируемый список жалоб
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator ;
}

