<?php

namespace App\Orchid\Layouts\Complaints;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ComplaintsListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'complaints';

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            TD::make('user_name', __('Пользователь'))
                ->sort()
                ->cantHide(),

            TD::make('paste_title', __('Паста'))
                ->sort()
                ->cantHide(),

            TD::make('text', __('Текст жалобы'))
                ->sort()
                ->cantHide(),

            TD::make('created_at', __('Created')),
        ];
    }
}
