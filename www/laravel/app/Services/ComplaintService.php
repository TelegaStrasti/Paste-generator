<?php

namespace App\Services;

use App\Models\Complaint;

final class ComplaintService
{
    /**
     * Создает жалобу.
     *
     * @param array $data
     * @return Complaint
     */
    public function makeComplaint(array $data): Complaint
    {
        return Complaint::create([
            'user_id' => auth()->id(),
            'paste_id' => $data['paste_id'],
            'text' => $data['text'],
        ]);
    }
}
