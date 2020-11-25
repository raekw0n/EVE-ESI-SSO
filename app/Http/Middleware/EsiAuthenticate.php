<?php

namespace Mesa\Http\Middleware;

use Closure;
use Mesa\Http\Api\EsiCharacter;

class EsiAuthenticate
{
    public function handle($request, Closure $next)
    {
        if (!session()->exists('character')) {
            return redirect(route('esi.sso.login'));
        }

        app()->instance(EsiCharacter::class, session('character'));

        return $next($request);
    }
}
