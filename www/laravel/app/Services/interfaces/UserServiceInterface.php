<?php

namespace App\Services\interfaces;

use App\Models\User;

interface UserServiceInterface
{
    /**
     * @param User $user
     * @return void
     */
    public function banUser(User $user): void;

}
