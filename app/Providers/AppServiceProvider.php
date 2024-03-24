<?php

namespace App\Providers;

use App\Models\Endpoint;
use App\Models\Site;
use App\Observers\SiteOberver;
use Illuminate\Support\ServiceProvider;
use App\Observers\EndpointObserver;
use App\Policies\SitePolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
       
        Site::observe(SiteOberver::class);
        Endpoint::observe(EndpointObserver::class);
    }
}
