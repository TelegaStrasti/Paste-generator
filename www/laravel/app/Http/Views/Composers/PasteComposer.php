<?php

namespace App\Http\Views\Composers;

use App\Models\Paste;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PasteComposer
{
    public function compose(View $view)
    {
        $user = Auth::id();

        $latestPastes = Paste::latest()->take(10)->get();

        $userPastes = Paste::latest()->where('user_id', $user)->take(10)->get();

        $view->with('latestPastes', $latestPastes)
            ->with('userPastes', $userPastes);
    }
}
