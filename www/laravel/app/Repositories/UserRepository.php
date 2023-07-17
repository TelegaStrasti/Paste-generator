<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Models\User;
use App\Orchid\Layouts\User\UserFiltersLayout;
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
    public function getUserPastes(): Paginator
    {
        return Paste::active()
            ->where('user_id', Auth::id())
            ->paginate(10);
    }

    /**
     * Получить пагинируемый список юзеров.
     *
     * @return Paginator|null
     */
    public function index(): ?Paginator
    {
        return \Orchid\Platform\Models\User::with('roles')
            ->filters(UserFiltersLayout::class)
            ->defaultSort('id', 'desc')
            ->where('is_baned', 0)
            ->paginate();
    }

    /** Получить юзера по id.
     *
     * @param int $id
     * @return User|null
     */
    public function getUser($id): ?User
    {
        return User::findOrFail($id);
    }
}
