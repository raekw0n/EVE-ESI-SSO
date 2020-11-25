<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Mesa\Http\Api\EsiCorporateManagement;
use Mesa\Http\Controllers\Controller;

class EsiController extends Controller
{
    protected EsiCorporateManagement $character;

    /**
     * EsiController constructor.
     */
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if(session()->exists('character')) {
                $this->character = new EsiCorporateManagement(session('character'));
                return $next($request);
            }

            return redirect(route('esi.sso.login'));
        });
    }
}
