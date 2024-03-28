<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Endpoint;

class EndpointPolicy
{
    /**
     * Determine if the given endpoint can be deleted by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Endpoint  $endpoint
     * @return bool
     */

     public function update(User $user, Endpoint $endpoint)
    {
        return $user->id === $endpoint->site->user_id;  
    }
    
    public function destroy(User $user, Endpoint $endpoint)
    {
        return $user->id === $endpoint->site->user_id;
    }
}
