<?php

namespace Mesa\Http\Controllers;

use Illuminate\Http\Request;
use Mesa\Http\Api\EsiAuthClient;

class SsoController extends Controller
{
    /** @var EsiAuthClient  */
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
     * @param Request $request
     * @return mixed
     */
    public function callback(Request $request)
    {
        $auth = $this->esi->callback($request);
        if (isset($auth->access_token)) {
            session()->put('access_token', $auth->access_token);
            session()->put('refresh_token', $auth->refresh_token);

            return $this->verify();
        }

        return response()->json(['error' => 'Could not retrieve access token.'], 500);
    }

    /**
     * Verify login and return character information.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function verify()
    {
        $character = $this->esi->verify();
        if (isset($character->CharacterID)) {
            session()->put('character', $character);
        }

        return response()->json(['error' => null]);
    }
}
