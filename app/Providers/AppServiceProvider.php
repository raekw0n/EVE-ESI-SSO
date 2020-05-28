<?php

namespace Mesa\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('esiauth', function () {
            if(session()->exists('character')) {
                return true;
            }

            return false;
        });

        // create a @verified() directive for verified users
        Blade::if('esiguest', function () {
            if(!session()->exists('character')) {
                return true;
            }

            return false;
        });
    }
}
