<?php

namespace App\Services;

use App\DTO\ComplaintDTO;
use App\Models\Complaint;
use App\Services\interfaces\ComplaintServiceInterface;

final class ComplaintService implements ComplaintServiceInterface
{
    /**
     * Создает жалобу.
     *
     * @param ComplaintDTO $complaintDTO
     * @param int $userId
     * @return Complaint
     */
    public function makeComplaint(ComplaintDTO $complaintDTO, int $userId): Complaint
    {
        return Complaint::create([
            'user_id' => $userId,
            'paste_id' => $complaintDTO->getPasteId(),
            'text' => $complaintDTO->getText(),
        ]);
    }
}
