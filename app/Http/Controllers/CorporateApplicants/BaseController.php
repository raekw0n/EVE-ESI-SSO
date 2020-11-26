<?php

namespace Mesa\Http\Controllers\CorporateApplicants;

use Carbon\Carbon;
use Mesa\Http\Api\Clients\EsiAuthClient;
use Mesa\Http\Api\EsiCorporateApplicant;
use Mesa\Http\Controllers\Controller;

class BaseController extends Controller
{
    /** @var EsiCorporateApplicant $aplicant */
    protected EsiCorporateApplicant $esi;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (session()->exists('character'))
            {
                $this->esi = new EsiCorporateApplicant(session('character'));
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
