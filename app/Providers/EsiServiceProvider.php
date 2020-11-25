<?php

namespace Mesa\Providers;

use Illuminate\Support\ServiceProvider;
use Mesa\Http\Api\EsiCharacter;

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
        $this->app->singleton(EsiCharacter::class, function ($app) {
            return new EsiCharacter(session()->get('character'));
        });
    }
}
