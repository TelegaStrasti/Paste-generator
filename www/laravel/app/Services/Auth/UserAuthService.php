<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class UserAuthService
{
    /**
     * Авторизация пользователя
     *
     * @param $data
     * @return string|null
     */
    public function login($data):?string
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
     * @param $data
     * @return void
     */
    public function register($data):void{

        $data['password'] = Hash::make($data['password']);

        User::create($data);
    }
}
