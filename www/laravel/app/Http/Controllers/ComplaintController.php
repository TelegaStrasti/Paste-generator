<?php

namespace App\Http\Controllers;

use App\DTO\ComplaintDTO;
use App\Http\Requests\Paste\ComplaintsRequest;
use App\Services\interfaces\ComplaintServiceInterface;
use Illuminate\Http\RedirectResponse;

final class ComplaintController extends Controller
{
    /**
     * @param ComplaintServiceInterface $complaintService
     */
    public function __construct(
       protected ComplaintServiceInterface $complaintService
    )
    {}

    /**
     * Обрабатывает формы жалобы.
     *
     * @param ComplaintsRequest $request
     * @return RedirectResponse
     */
    public function makeComplaint(ComplaintsRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $complaintDTO = new ComplaintDTO(
            ...$data
        );

        $this->complaintService->makeComplaint($complaintDTO, auth()->id());

        return redirect()->back();
    }
}
