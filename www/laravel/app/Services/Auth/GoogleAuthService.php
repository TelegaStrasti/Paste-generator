<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\interfaces\Auth\GoogleAuthServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

final class GoogleAuthService implements  GoogleAuthServiceInterface
{
    /**
     * Логика аутентификации.
     *
     * @param $user
     * @param $findUser
     * @return Application|RedirectResponse|Redirector|null
     */
    public function handleGoogleCallback($user, $findUser): Application|RedirectResponse|Redirector|null
    {
        if ($findUser) {
            Auth::login($findUser);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => encrypt('123456dummy')
            ]);
            Auth::login($newUser);
        }
        return redirect('/');
    }
}
