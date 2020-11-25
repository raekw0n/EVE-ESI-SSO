<?php

namespace Mesa\Providers;

use Illuminate\Support\ServiceProvider;
use Mesa\Http\Api\EsiCorporateManagement;

class EsiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(EsiCorporateManagement::class, function ($app) {
            return new EsiCorporateManagement(session()->get('character'));
        });
    }
}
