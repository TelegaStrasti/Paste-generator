<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class UserAuthService
{
    public function login($data)
    {
        if (auth()->attempt(['name' => $data['name'], 'password' => $data['password']])) {
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            return redirect('/')->with('success', 'Вход выполнен успешно!')->with('accessToken', $accessToken);
        }
        return redirect('/login')->with('error', 'Ошибка аутентификации');
    }

    public function register($data){

        $data['password'] = Hash::make($data['password']);

        User::create($data);
    }

}
