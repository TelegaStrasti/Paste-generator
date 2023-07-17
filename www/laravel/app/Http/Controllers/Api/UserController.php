<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserPastesResource;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UserController extends Controller
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


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
