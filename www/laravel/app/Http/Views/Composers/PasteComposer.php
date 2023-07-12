<?php

namespace App\Http\Views\Composers;

use App\Models\Paste;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

final class PasteComposer
{
    /**
     * Возвращает данные для блоков с пастами.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view):void
    {
        $user = Auth::id();

        $latestPastes = Paste::latest()->take(10)->get();

        $userPastes = Paste::latest()->where('user_id', $user)->take(10)->get();

        $view->with('latestPastes', $latestPastes)
            ->with('userPastes', $userPastes);
    }
}
