<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Mesa\Http\Api\EsiCorporateManagement;
use Mesa\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected EsiCorporateManagement $esi;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if(session()->exists('character')) {
                $this->esi = new EsiCorporateManagement(session('character'));
                return $next($request);
            }

            return redirect(route('esi.sso.login'));
        });
    }
}
