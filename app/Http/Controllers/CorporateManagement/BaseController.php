<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Carbon\Carbon;
use Mesa\Http\Api\Clients\EsiAuthClient;
use Mesa\Http\Api\EsiCorporateManagement;
use Mesa\Http\Controllers\Controller;

class BaseController extends Controller
{
    /** @var EsiCorporateManagement $esi */
    protected EsiCorporateManagement $esi;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (session()->exists('character'))
            {
                $this->esi = new EsiCorporateManagement(session('character'));
                if (Carbon::parse(session('character')['expires_on'])->isPast())
                {
                    (new EsiAuthClient())->refreshAccessToken();
                }

                return $next($request);
            }

            return redirect(route('corporate.login'));
        });
    }
}
