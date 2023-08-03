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
     * @return Application|RedirectResponse|Redirector|null
     */

    public function handleGoogleCallback(): Application|RedirectResponse|Redirector|null;

}
