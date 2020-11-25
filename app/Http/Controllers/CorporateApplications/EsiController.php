<?php

namespace Mesa\Http\Controllers\CorporateApplications;

use Mesa\Http\Api\EsiApplication;
use Mesa\Http\Controllers\Controller;

class EsiController extends Controller
{
    protected EsiApplication $applicant;

    /**
     * EsiController constructor.
     */
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if(session()->exists('character')) {
                $this->applicant = new EsiApplication(session()->get('character'));

                return $next($request);
            }

            return redirect(route('esi.sso.login'));
        });
    }
}
