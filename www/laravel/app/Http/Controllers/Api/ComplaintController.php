<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Paste\ComplaintsRequest;
use App\Http\Resources\Api\ComplaintsResource;
use App\Services\ComplaintService;
use Illuminate\Http\JsonResponse;

final class ComplaintController extends Controller
{
    protected ComplaintService $complaintService;

    public function __construct(ComplaintService $complaintService)
    {
        $this->complaintService = $complaintService;
    }

    /**
     * Обрабатывает формы жалобы.
     *
     * @param ComplaintsRequest $request
     * @return JsonResponse
     */
    public function makeComplaint(ComplaintsRequest $request): JsonResponse
    {
        $data = $request->validated();

        $result = $this->complaintService->makeComplaint($data);

        return response()->json(ComplaintsResource::make($result));
    }
}
