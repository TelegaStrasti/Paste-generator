<?php

namespace App\Services;

use App\Models\User;

final class UserService
{
    public function banUser(User $user): void
    {
        $user->is_baned = true;
        $user->save();
    }
}
