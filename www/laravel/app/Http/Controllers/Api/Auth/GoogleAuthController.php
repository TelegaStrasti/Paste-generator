<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\GoogleAuthRepositoryInterface;
use App\Services\Auth\GoogleAuthService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;

final class GoogleAuthController extends Controller
{
    /**
     *
     * @var GoogleAuthService
     */
    protected GoogleAuthService $googleAuthService;

    /**
     * @var GoogleAuthRepositoryInterface
     */
    protected GoogleAuthRepositoryInterface $googleAuthRepository;

    /**
     *
     * @param GoogleAuthService $googleAuthService
     * @param GoogleAuthRepositoryInterface $googleAuthRepository
     * @return void
     */
    public function __construct(GoogleAuthService $googleAuthService, GoogleAuthRepositoryInterface $googleAuthRepository)
    {
        $this->googleAuthService = $googleAuthService;
        $this->googleAuthRepository = $googleAuthRepository;
    }

    /**
     * Аутентификация через гугл.
     *
     * @return Application|RedirectResponse|Redirector|null
     */
    public function handleGoogleCallback(): Application|RedirectResponse|Redirector|null
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = $this->googleAuthRepository->getGoogleUser($googleUser);

        $findUser = $this->googleAuthRepository->findUser($user);

        return $this->googleAuthService->handleGoogleCallback($user, $findUser);
    }
}
