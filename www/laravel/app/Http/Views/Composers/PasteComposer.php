<?php

namespace App\Http\Views\Composers;

use App\Repositories\Interfaces\PasteBlocksRepositoryInterface;
use Illuminate\View\View;

final class PasteComposer
{
    protected PasteBlocksRepositoryInterface $pasteBlocksRepository;

    public function __construct(PasteBlocksRepositoryInterface $pasteBlocksRepository)
    {
        $this->pasteBlocksRepository = $pasteBlocksRepository;
    }

    /**
     * Возвращает данные для блоков с пастами.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view):void
    {
        $latestPastes = $this->pasteBlocksRepository->getLatestPastes();

        $userPastes = $this->pasteBlocksRepository->getLatestUserPastes();

        $view->with('latestPastes', $latestPastes)
            ->with('userPastes', $userPastes);
    }
}
