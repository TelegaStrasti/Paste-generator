<?php

namespace App\Services;

use App\Models\User;
use App\Services\interfaces\UserServiceInterface;

final class UserService implements UserServiceInterface
{
    /**
     * Бан юзера
     *
     * @param User $user
     * @return void
     */
    public function banUser(User $user): void
    {
        $user->is_baned = true;
        $user->save();
    }
}
