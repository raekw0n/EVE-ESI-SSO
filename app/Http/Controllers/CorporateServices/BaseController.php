<?php

namespace Mesa\Http\Controllers\CorporateServices ;

use Carbon\Carbon;
use Mesa\Http\Api\Clients\EsiAuthClient;
use Mesa\Http\Api\EsiCorporateServices;
use Mesa\Http\Controllers\Controller;

class BaseController extends Controller
{
    /** @var EsiCorporateServices $esi */
    protected EsiCorporateServices $esi;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (session()->exists('character'))
            {
                $this->esi = new EsiCorporateServices(session('character'));
                if (Carbon::parse(session('character')['expires_on'])->isPast())
                {
                    (new EsiAuthClient())->refreshAccessToken();
                }

                return $next($request);
            }

            return redirect(route('esi.sso.login'));
        });
    }
}
