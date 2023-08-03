<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\Paste\PastesListLayout;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Services\interfaces\PasteServiceInterface;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class PastesScreen extends Screen
{
    /**
     * @param PasteRepositoryInterface $pasteRepository
     * @param PasteServiceInterface $pasteService
     */
    public function __construct(
        protected PasteRepositoryInterface $pasteRepository,
        protected PasteServiceInterface $pasteService
    )
    {}

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'pastes' => $this->pasteRepository->getPaginatedPastes()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Пасты';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            PastesListLayout::class,
        ];
    }

    /**
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request): void
    {
        $paste = $this->pasteRepository->getPaste($request->get('url'));

        $this->pasteService->destroy($paste);

        Toast::info(__('Паста была удалена'));
    }
}
