<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

final class UserRepository implements UserRepositoryInterface
{
    /**
     * Получает список паст пользователя.
     *
     * @return Paginator
     */
    public function index(): Paginator
    {
        return Paste::active()
            ->where('user_id', Auth::id())
            ->paginate(10);
    }
}
