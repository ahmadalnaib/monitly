<?php

namespace App\Observers;

use App\Models\Endpoint;
use Illuminate\Support\Arr;

class EndpointObserver
{
    //
    public function creating(Endpoint $endpoint)
    {
        $pared = parse_url($endpoint->site->url() . '/' . $endpoint->location);
        $endpoint->location= '/' . trim(trim(Arr::get($pared, 'path'), '/') . '?' . Arr::get($pared, 'query'),'?');
        $endpoint->next_check = now()->addSecond($endpoint->frequency);
    }
}
