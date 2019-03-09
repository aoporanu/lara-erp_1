<?php

namespace App\Providers;

use App\LaraERP\LaraERP;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class laraERPServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('laraerp', function() {
            return new LaraERP();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
