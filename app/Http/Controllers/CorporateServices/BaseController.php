<?php

namespace Mesa\Http\Controllers\CorporateServices ;

use Mesa\Http\Api\EsiCorporateServices;
use Mesa\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected EsiCorporateServices $esi;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if(session()->exists('character')) {
                $this->esi = new EsiCorporateServices(session('character'));
                return $next($request);
            }

            return redirect(route('esi.sso.login'));
        });
    }
}
