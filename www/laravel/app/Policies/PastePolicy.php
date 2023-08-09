<?php

namespace App\Policies;

use App\Enums\PasteAccesses;
use App\Models\Paste;
use Illuminate\Support\Facades\Auth;

class PastePolicy
{
    /**
     * Определяет, имеет ли пользователь доступ к пасте.
     *
     * @param string|null $url
     * @param Paste $paste
     * @return bool
     */
    public function view(string $url = null, Paste $paste): bool
    {
        $user = Auth::id();
        $access = $paste->access;

        return $access === PasteAccesses::PUBLIC->value
            || ($user && $access === PasteAccesses::PRIVATE->value && $paste->user_id === $user)
            || ($access === PasteAccesses::UNLISTED->value && $paste->url === $url);
    }
}
