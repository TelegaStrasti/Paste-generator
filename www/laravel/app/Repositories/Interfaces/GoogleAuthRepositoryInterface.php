<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface GoogleAuthRepositoryInterface
{
    /**
     * Найти пользователя по данным Google.
     *
     * @param object $user
     * @return User|null
     */
    public function findUser(object $user): ?User;

    /**
     * Получить аутентифицированного пользователя Google.
     *
     * @return object|null
     */
    public function getGoogleUser(): ?object;
}
