<?php

namespace App\Http\Controllers\Auth;

use App\DTO\Auth\AuthDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\interfaces\Auth\UserAuthServiceInterface;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;

final class UserAuthController extends Controller
{
    /**
     * @param UserAuthServiceInterface  $userAuthService
     */
    public function __construct(
        protected UserAuthServiceInterface $userAuthService
    )
    {}

    /**
     * Возвращает форму авторизации
     *
     * @return View
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Логика авторизации
     *
     * @param LoginRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function login(LoginRequest $request): Application|Redirector|RedirectResponse
    {
        $data = $request->validated();

        $loginDTO = new AuthDTO(
            ...$data
        );

        $this->userAuthService->login($loginDTO);

        return redirect('/');
    }

    /**
     * Возвращает форму регистрации
     *
     * @return View
     */
    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    /**
     * логика регистрации
     *
     * @param RegisterRequest $request
     * @return RedirectResponse|Application|Redirector
     */
    public function register(RegisterRequest $request): RedirectResponse|Application|Redirector
    {
        $data = $request->validated();

        $authDTO = new AuthDTO(
            ...$data
        );

        $this->userAuthService->register($authDTO);

        return redirect('/')->with('success', 'Вы успешно зарегистрировались!');
    }
}
