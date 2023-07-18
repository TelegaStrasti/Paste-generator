<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class UserAuthService
{
    /**
     * Авторизация пользователя
     *
     * @param object $data
     * @return string|null
     */
    public function login(object $data):?string
    {
        $accessToken = null;
        if (auth()->attempt(['name' => $data['name'], 'password' => $data['password']])) {
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
        }
        return $accessToken;
    }

    /**
     * Регистрация пользователя
     *
     * @param object $data
     * @return User
     */
    public function register(object $data):User{

        $data['password'] = Hash::make($data['password']);

        return User::create($data);

    }
}
