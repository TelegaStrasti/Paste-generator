<?php

namespace App\Services;

use App\Models\Complaint;

final class ComplaintService
{
    /**
     * Создает жалобу.
     *
     * @param array $data
     * @return void
     */
    public function makeComplaint(array $data): void
    {
        Complaint::create([
            'user_id' => auth()->id(),
            'paste_id' => $data['paste_id'],
            'text' => $data['text'],
        ]);
    }
}
