<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Orchid\Platform\Dashboard;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

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
        $name = $this->ask('Enter name:');
        $email = $this->ask('Enter email:');
        $password = Hash::make($this->secret('Enter password:'));

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        $role = Dashboard::getModelsRole()->where('slug', 'admin')->first();

        $user->roles()->sync([$role->id]);

        $this->info('Admin created successfully.');
    }
}
