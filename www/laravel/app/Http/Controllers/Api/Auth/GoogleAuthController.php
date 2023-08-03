<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\GoogleAuthRepositoryInterface;
use App\Services\Auth\GoogleAuthService;
use App\Services\interfaces\Auth\GoogleAuthServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

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
