<?php

namespace App\Repositories;

use App\Models\Complaint;
use App\Repositories\Interfaces\ComplaintsRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ComplaintsRepository implements ComplaintsRepositoryInterface
{

    /**
     * Получить пагинируемый список жалоб
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return Complaint::query()
            ->with(['paste', 'user'])
            ->select(['complaints.id', 'complaints.text', 'users.name as user_name', 'pastes.title as paste_title', 'complaints.created_at', 'complaints.updated_at'])
            ->join('users', 'users.id', '=', 'complaints.user_id')
            ->join('pastes', 'pastes.id', '=', 'complaints.paste_id')
            ->paginate(10);
    }
}
