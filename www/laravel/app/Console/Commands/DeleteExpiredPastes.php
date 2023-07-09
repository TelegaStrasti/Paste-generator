<?php

namespace App\Console\Commands;

use App\Models\Paste;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class DeleteExpiredPastes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-pastes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Paste::where('expiry_at', '<', Carbon::now())
            ->delete();
    }
}
