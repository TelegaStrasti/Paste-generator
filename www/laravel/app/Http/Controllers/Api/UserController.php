<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserPastesResource;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;

final class UserController extends Controller
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    )
    {}

    /**
     * Возвращает пагинируемый список паст пользователя
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $userPastes = $this->userRepository->getUserPastes();
        return response()->json(UserPastesResource::collection($userPastes));
    }
}
