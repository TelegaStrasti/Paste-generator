<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\GoogleAuthRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laravel\Socialite\Facades\Socialite;

final class GoogleAuthRepository implements GoogleAuthRepositoryInterface
{
    /**
     * Получить юзера по Google ID.
     *
     * @param object $user
     * @return Builder|Model|null
     */
    public function findUser(object $user): Builder|Model|null
    {
        return User::query()
            ->where('google_id', $user->id)
            ->first();
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
