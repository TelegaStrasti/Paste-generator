<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Contracts\View\View;

final class UserController extends Controller
{

    public function __construct(
        protected UserRepositoryInterface $userRepository
    )
    {}

    /**
     * Получает список паст пользователя.
     *
     * @return View
     */
    public function index(): View
    {
        $userPastes = $this->userRepository->getUserPastes();
        return view('user.user_pastes', compact('userPastes'));
    }
}
