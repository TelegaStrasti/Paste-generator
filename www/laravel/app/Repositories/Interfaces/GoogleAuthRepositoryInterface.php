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
     * @return Builder|Model
     */
    public function findUser(object $user): Builder|Model;

    /**
     * Получить аутентифицированного пользователя Google.
     *
     * @return object|null
     */
    public function getGoogleUser(): ?object;
}
