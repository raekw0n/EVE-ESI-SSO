<?php

namespace Mesa\Http\Controllers;

use Illuminate\Http\Request;
use Mesa\Http\Api\EsiAuthClient;

class SsoController extends Controller
{
    protected $esi;

    /**
     * SsoController constructor.
     */
    public function __construct()
    {
        $this->esi = new EsiAuthClient();
    }

    /**
     * Perform SSO login.
     *
     * @return mixed
     */
    public function login()
    {
        return $this->esi->authorize();
    }

    /**
     * Receive token from ESI via callback.
     *
     *
     */
    public function callback(Request $request)
    {
        $user = $this->esi->callback($request);
        if (isset($user->access_token)) {

        }
    }
}
