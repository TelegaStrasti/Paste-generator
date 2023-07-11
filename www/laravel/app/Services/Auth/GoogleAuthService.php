<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

final class GoogleAuthService
{
    /**
     * Логика аутентификации.
     *
     * @return Application|RedirectResponse|Redirector|null
     */
    public function handleGoogleCallback($findUser, $user): Application|RedirectResponse|Redirector|null
    {
        $user = Socialite::driver('google')->user();
        $findUser = User::where('google_id', $user->id)->first();

        if ($findUser) {
            Auth::login($findUser);
            return redirect('/');
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => encrypt('123456dummy')
            ]);
            Auth::login($newUser);
            return redirect('/');
        }
    }
}
