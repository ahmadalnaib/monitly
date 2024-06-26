<?php

namespace App\Console\Commands;

use App\Models\Endpoint;
use Illuminate\Console\Command;
use App\Jobs\PerformEndpointCheck;

class PerformChecks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checks:perform';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perform checks on the application.';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $endpoints = Endpoint::where('next_check', '<=', now())->each(function ($endpoint) {
            //jobs
            PerformEndpointCheck::dispatch($endpoint);
        });

        return Command::SUCCESS;
    }
}
