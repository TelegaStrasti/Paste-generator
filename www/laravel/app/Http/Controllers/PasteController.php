<?php

namespace App\Http\Controllers;

use App\Http\Requests\paste\PasteCreateRequest;
use App\Models\User;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Services\PasteService;
use Illuminate\Contracts\View\View;

class PasteController extends Controller
{
    /**
     * @var PasteService
     */
    protected PasteService $pasteService;

    /**
     * @var PasteRepositoryInterface
     */
    protected PasteRepositoryInterface $pasteRepository;

    /**
     * Конструктор.
     *
     * @param PasteService $pasteService
     * @param PasteRepositoryInterface $pasteRepository
     */
    public function __construct(PasteService $pasteService, PasteRepositoryInterface $pasteRepository)
    {
        $this->pasteService = $pasteService;
        $this->pasteRepository = $pasteRepository;
    }

    /**
     * Форма создания новой пасты.
     *
     * @return View
     */
    public function create(): View
    {
        return view('paste.create');
    }

    /**
     * Создание пасты
     *
     * @param PasteCreateRequest $request
     * @return void
     */
    public function store(PasteCreateRequest $request): void
    {
        $data = $request->validated();

        $this->pasteService->store($data);
    }

    /**
     * Детальная страница пасты.
     *
     * @param string $url
     * @return View
     */
    public function show(string $url): View
    {
        $paste = $this->pasteRepository->getPaste($url);

        return view('paste.show', compact('paste'));
    }

    /**
     *  Список паст юзера.
     *
     * @param User $user
     * @return void
     */
    public function index(User $user): void
    {

    }
}
