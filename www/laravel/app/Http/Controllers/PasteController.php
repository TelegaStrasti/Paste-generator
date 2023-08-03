<?php

namespace App\Http\Controllers;

use App\DTO\PasteDTO;
use App\Http\Requests\Paste\PasteCreateRequest;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Services\interfaces\PasteServiceInterface;
use Illuminate\Contracts\View\View;

final class PasteController extends Controller
{
    /**
     *
     * @param PasteServiceInterface $pasteService
     * @param PasteRepositoryInterface $pasteRepository
     */
    public function __construct(
        protected PasteServiceInterface $pasteService,
        protected PasteRepositoryInterface $pasteRepository
    )
    {}

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

        $pasteDTO = new PasteDTO(
            ...$data
        );

        $this->pasteService->store($pasteDTO, auth()->id());

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
