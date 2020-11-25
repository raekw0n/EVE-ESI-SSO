<?php

namespace Mesa\Http\Controllers\CorporateApplicants;

use Mesa\Http\Api\EsiCorporateApplicant;
use Mesa\Http\Controllers\Controller;

class EsiController extends Controller
{
    protected EsiCorporateApplicant $applicant;

    /**
     * EsiController constructor.
     */
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (session()->exists('character')) {
                $this->applicant = new EsiCorporateApplicant(session('character'));

                return $next($request);
            }

            return redirect(route('esi.sso.login'));
        });
    }
}
