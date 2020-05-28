<?php

namespace Mesa\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Mesa\Http\Api\EsiAuthClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * ESI SSO Controller
 */
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
        try {
            $auth = $this->esi->callback($request);
            session()->put('character.access_token', $auth->access_token);
            session()->put('character.refresh_token', $auth->refresh_token);

            return $this->verify();
        } catch (GuzzleException $e) {
            Log::error($e->getMessage());
        }

        return response()->json(['error' => 'Could not retrieve access token.'], 400);
    }

    /**
     * Verify login and return character information.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify()
    {
        try {
            $character = $this->esi->verify();
            session()->put('character.info', $character);
            session()->put('character.id', $character->CharacterID);

            return response()->json([
                'result' => 'Character successfully verified',
                'data' => session()->get('character')
            ]);

        } catch (GuzzleException $e) {
            Log::error($e->getMessage());
        }

        return response()->json(['error' => 'An unexpected error occurred, please try again.'], 500);
    }
}
