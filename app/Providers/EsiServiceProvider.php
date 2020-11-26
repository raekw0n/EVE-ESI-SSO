<?php

namespace Mesa\Providers;

use Blade;
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

        Blade::if('esiauth', function ()
        {
            if (session('character'))
            {
                return true;
            }

            return false;
        });

        Blade::if('esicorporate', function ()
        {
            if (session('character.corporate_member'))
            {
                return true;
            }

            return false;
        });
    }
}
