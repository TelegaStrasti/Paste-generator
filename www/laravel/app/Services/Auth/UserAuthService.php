<?php

namespace App\Services\Auth;

use App\DTO\Auth\AuthDTO;
use App\Models\User;
use App\Services\interfaces\Auth\UserAuthServiceInterface;
use Illuminate\Support\Facades\Hash;

final class UserAuthService implements UserAuthServiceInterface
{
    /**
     * Авторизация пользователя
     *
     * @param AuthDTO $authDTO
     * @return string|null
     */
    public function login(AuthDTO $authDTO):?string
    {
        $accessToken = null;
        if (auth()->attempt(['name' => $authDTO->getName(), 'password' => $authDTO->getPassword()])) {
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
        }
        return $accessToken;
    }

    /**
     * Регистрация пользователя
     *
     * @param AuthDTO $authDTO
     * @return User
     */
    public function register(AuthDTO $authDTO): User
    {
        $data = [
            'name' => $authDTO->getName(),
            'password' => Hash::make($authDTO->getPassword()),
        ];

        return User::create($data);
    }
}
