<?php

namespace App\Http\Controllers;

use App\Http\Requests\Paste\ComplaintsRequest;
use App\Services\ComplaintService;

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function makeComplaint(ComplaintsRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        $this->complaintService->makeComplaint($data);

        return redirect()->back();
    }
}
