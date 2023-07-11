<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Contracts\View\View;

final class UserController extends Controller
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Получает список паст пользователя.
     *
     * @return View
     */
    public function index(): View
    {
        $userPastes = $this->userRepository->index();
        return view('user.user_pastes', compact('userPastes'));
    }
}
