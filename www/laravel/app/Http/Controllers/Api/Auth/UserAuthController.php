<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Api\Auth\AuthResource;
use App\Services\interfaces\Auth\UserAuthServiceInterface;
use Illuminate\Http\JsonResponse;

final class UserAuthController extends Controller
{
    /**
     * @param UserAuthServiceInterface $userAuthService
     */
    public function __construct(
        protected UserAuthServiceInterface $userAuthService
    )
    {}

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
