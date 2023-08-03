<?php

namespace App\Services\interfaces\Auth;

use App\DTO\Auth\AuthDTO;
use App\Models\User;

interface UserAuthServiceInterface
{
    /**
     * Авторизация пользователя
     *
     * @param AuthDTO $authDTO
     * @return string|null
     */
    public function login(AuthDTO $authDTO):?string;

    /**
     * Регистрация пользователя
     *
     * @param array $data
     * @return User
     */
    public function register(AuthDTO $authDTO):User;
}
