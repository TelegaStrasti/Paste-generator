<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface GoogleAuthRepositoryInterface
{
    /**
     * Найти пользователя по данным Google.
     *
     * @param object $user
     * @return Builder|Model|null
     */
    public function findUser(object $user): Builder|Model|null;

    /**
     * Получить аутентифицированного пользователя Google.
     *
     * @return object|null
     */
    public function getGoogleUser(): ?object;
}
