<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\GoogleAuthRepositoryInterface;
use Laravel\Socialite\Facades\Socialite;

final class GoogleAuthRepository implements GoogleAuthRepositoryInterface
{
    /**
     * Получить юзера по Google ID.
     *
     * @param object $user
     * @return User|null
     */
    public function findUser($user): ?User
    {
        return User::where('google_id', $user->id)->first();
    }

    /**
     * Получение авторизованного пользователя Google.
     *
     * @return object|null
     */
    public function getGoogleUser(): ?object
    {
        return Socialite::driver('google')->user();
    }
}
