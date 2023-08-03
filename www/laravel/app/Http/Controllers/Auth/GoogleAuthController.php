<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\GoogleAuthRepositoryInterface;
use App\Services\interfaces\Auth\GoogleAuthServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;

final class GoogleAuthController extends Controller
{
    /**
     *
     * @param GoogleAuthServiceInterface $googleAuthService
     * @param GoogleAuthRepositoryInterface $googleAuthRepository
     * @return void
     */
    public function __construct(
        protected GoogleAuthServiceInterface $googleAuthService,
        protected GoogleAuthRepositoryInterface $googleAuthRepository
    )
    {}

    /**
     * Редирект на страницу авторизации через гугл.
     *
     * @return RedirectResponse
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Аутентификация через гугл.
     *
     * @return Application|RedirectResponse|Redirector|null
     */
    public function handleGoogleCallback(): Application|RedirectResponse|Redirector|null
    {
        $user = $this->googleAuthRepository->getGoogleUser();

        $findUser = $this->googleAuthRepository->findUser($user);

        return $this->googleAuthService->handleGoogleCallback($user, $findUser);
    }
}
