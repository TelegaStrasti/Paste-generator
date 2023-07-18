<?php

namespace App\Http\Controllers;

use App\Http\Requests\Paste\ComplaintsRequest;
use App\Services\ComplaintService;
use Illuminate\Http\RedirectResponse;

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
     * @return RedirectResponse
     */
    public function makeComplaint(ComplaintsRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->complaintService->makeComplaint($data);

        return redirect()->back();
    }
}
