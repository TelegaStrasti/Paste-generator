<?php

namespace App\Orchid\Layouts\Paste;

use App\Models\Paste;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PastesListLayout extends Table
{
    public $target = 'pastes';

    public function columns(): array
    {
        return [
            TD::make('user_name', __('Пользователь'))
                ->sort()
                ->cantHide(),

            TD::make('title', __('Название'))
                ->sort()
                ->cantHide(),

            TD::make('text', __('Текст'))
                ->sort()
                ->cantHide(),

            TD::make('created_at', __('Created')),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Paste $paste) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                        Button::make(__('Удалить'))
                            ->icon('user')
                            ->confirm(__('паста будет удалена'))
                            ->method('destroy', [
                                'url' => $paste->url,
                            ]),
                    ])),
        ];
    }
}
