<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Paste\PasteCreateRequest;
use App\Http\Resources\Api\PasteResource;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Services\PasteService;
use Illuminate\Http\JsonResponse;

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
     * Создание пасты
     *
     * @param PasteCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PasteCreateRequest $request):JsonResponse
    {
        $data = $request->validated();

        $result = $this->pasteService->store($data);

        return response()->json(PasteResource::make($result));
    }

    /**
     * Детальная страница пасты.
     *
     * @param string $url
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $url):JsonResponse
    {
        $paste = $this->pasteRepository->getPaste($url);

        $paste->hasAccess($paste->url);

        return response()->json(PasteResource::make($paste));
    }
}
