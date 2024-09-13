<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan; // Add this line

class ClearCaches extends Command
{
    protected $signature = 'caches:clear';
    protected $description = 'Clear all application caches';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Clearing application cache...');
        Artisan::call('cache:clear'); // Use Artisan here

        $this->info('Clearing route cache...');
        Artisan::call('route:clear'); // Use Artisan here

        $this->info('Clearing configuration cache...');
        Artisan::call('config:clear'); // Use Artisan here

        $this->info('Caches cleared successfully!');
    }
}
