<?php
namespace App\Repositories\Interfaces;

use App\Models\User;

/**
 * Интерфейс репозитория пользователей.
 */
interface UserRepositoryInterface
{
    /**
     * Получает список паст пользователя.
     *
     * @return object|null Список паст пользователя.
     */
    public function getUserPastes(): ?object;

    public function index(): ?object;

    /** Получить юзера по id.
     *
     * @param int $id
     * @return User|null
     */
    public function getUser(int $id): ?User;

}
