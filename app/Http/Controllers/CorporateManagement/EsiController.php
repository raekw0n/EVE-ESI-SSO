<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Mesa\Http\Api\EsiCharacter;
use Mesa\Http\Controllers\Controller;

class EsiController extends Controller
{
    protected EsiCharacter $character;

    /**
     * EsiController constructor.
     */
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if(session()->exists('character')) {
                $this->character = new EsiCharacter(session()->get('character'));
                return $next($request);
            }

            return redirect(route('esi.sso.login'));
        });
    }
}
