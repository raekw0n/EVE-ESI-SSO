<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Mesa\Http\Api\Clients\EsiClientInterface;
use Mesa\Http\Api\EsiCorporateManagement;

class BaseController extends Controller
{
    /** @var EsiCorporateManagement $esi */
    protected EsiCorporateManagement $esi;

    /** @var EsiClientInterface $auth */
    protected EsiClientInterface $auth;

    /**
     * BaseController constructor.
     *
     * @param EsiClientInterface $auth
     */
    public function __construct(EsiClientInterface $auth)
    {
        $this->auth = $auth;

        $this->middleware(function($request, $next) {
            if (session()->exists('character'))
            {
                $this->esi = new EsiCorporateManagement(session('character'));
                if (Carbon::parse(session('character')['expires_on'])->isPast())
                {
                    $this->auth->refreshAccessToken();
                }

                return $next($request);
            }

            return redirect(route('corporate.login'));
        });
    }
}
