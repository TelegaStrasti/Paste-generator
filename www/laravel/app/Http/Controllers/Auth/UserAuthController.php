<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\UserAuthService;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

final class UserAuthController extends Controller
{
    /**
     * @var UserAuthService
     */
    protected UserAuthService $userAuthService;

    /**
     * @param UserAuthService $userAuthService
     */
    public function __construct(UserAuthService $userAuthService)
    {
        $this->userAuthService = $userAuthService;
    }

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
     * @return RedirectResponse|Application|Redirector
     */
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        return $this->userAuthService->login($data);
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

        $this->userAuthService->register($data);

        return redirect('/')->with('success', 'Вы успешно зарегистрировались!');
    }
}
