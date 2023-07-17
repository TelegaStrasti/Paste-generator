<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Api\Auth\AuthResource;
use App\Services\Auth\UserAuthService;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
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
     * Логика авторизации
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request):JsonResponse
    {
        $data = $request->validated();

        $result = $this->userAuthService->login($data);

        return response()->json($result);
    }

    /**
     * логика регистрации
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $result = $this->userAuthService->register($data);

        return response()->json(AuthResource::make($result));
    }
}
