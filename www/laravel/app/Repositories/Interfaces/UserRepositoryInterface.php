<?php
namespace App\Repositories\Interfaces;

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
    public function index(): ?object;
}
