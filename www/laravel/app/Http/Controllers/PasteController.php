<?php

namespace App\Http\Controllers;

use App\Http\Requests\Paste\PasteCreateRequest;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Services\PasteService;
use Illuminate\Contracts\View\View;

final class PasteController extends Controller
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
     * @return View
     */
    public function store(PasteCreateRequest $request): View
    {
        $data = $request->validated();

        $this->pasteService->store($data);

        return view('paste.create');
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

        $paste->hasAccess($paste->url);

        return view('paste.show', compact('paste'));
    }
}
