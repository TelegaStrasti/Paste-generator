<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Paste\PasteCreateRequest;
use App\Http\Resources\Api\PasteResource;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Services\interfaces\PasteServiceInterface;
use Illuminate\Http\JsonResponse;

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
     * Создание пасты
     *
     * @param PasteCreateRequest $request
     * @return JsonResponse
     */
    public function store(PasteCreateRequest $request):JsonResponse
    {
        $data = $request->validated();

        $result = $this->pasteService->store($data, auth()->id());

        return response()->json(PasteResource::make($result));
    }

    /**
     * Детальная страница пасты.
     *
     * @param string $url
     * @return JsonResponse
     */
    public function show(string $url):JsonResponse
    {
        $paste = $this->pasteRepository->getPaste($url);

        $paste->hasAccess($paste->url);

        return response()->json(PasteResource::make($paste));
    }
}
