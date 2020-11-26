<?php

namespace Mesa\Providers;

use Illuminate\Support\ServiceProvider;

use Mesa\Http\Api\Clients\EsiAuthClient;
use Mesa\Http\Api\Clients\EsiClientInterface;

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
        $this->app->bind(
            EsiClientInterface::class,
            EsiAuthClient::class
        );
    }
}
