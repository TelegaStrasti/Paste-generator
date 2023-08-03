<?php

namespace App\Services\interfaces;

use App\DTO\ComplaintDTO;
use App\Models\Complaint;

interface ComplaintServiceInterface
{
    /**
     * Создает жалобу.
     *
     * @param ComplaintDTO $complaintDTO
     * @param int $userId
     * @return Complaint
     */
    public function makeComplaint(ComplaintDTO $complaintDTO, int $userId): Complaint;

}
