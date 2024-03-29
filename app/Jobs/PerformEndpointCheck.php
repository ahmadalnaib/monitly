<?php

namespace App\Jobs;

use Exception;
use App\Models\Endpoint;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class PerformEndpointCheck
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Endpoint $endpoint)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        try{
            $response=Http::get($this->endpoint->url());
           dd($response->successful());

        } catch(Exception $e){


        }
        // Perform the check
        $this->endpoint->update([
            'next_check' => now()->addSeconds($this->endpoint->frequency),
        ]);
    }
}
