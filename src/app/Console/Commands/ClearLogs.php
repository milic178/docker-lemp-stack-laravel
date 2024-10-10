<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear the Laravel log files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        file_put_contents(storage_path('logs/laravel.log'), '');
        $this->info('Logs have been cleared.');
    }
}
