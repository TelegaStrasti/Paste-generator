<?php

namespace App\Services\interfaces\Auth;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

interface GoogleAuthServiceInterface
{
    /**
     * Логика аутентификации.
     *
     * @param $user
     * @param $findUser
     * @return Application|RedirectResponse|Redirector|null
     */

    public function handleGoogleCallback($user, $findUser): Application|RedirectResponse|Redirector|null;

}
