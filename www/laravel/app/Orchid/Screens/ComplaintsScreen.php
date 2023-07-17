<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\Complaints\ComplaintsListLayout;
use App\Repositories\Interfaces\ComplaintsRepositoryInterface;
use Orchid\Screen\Screen;

class ComplaintsScreen extends Screen
{
    protected ComplaintsRepositoryInterface $complaintsRepository;

    public function __construct(ComplaintsRepositoryInterface $complaintsRepository)
    {
        $this->complaintsRepository = $complaintsRepository;
    }


    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
           'complaints' => $this->complaintsRepository->index()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Жалобы';
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
            ComplaintsListLayout::class,
        ];
    }
}