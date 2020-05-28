<?php

namespace Mesa\Http\Controllers;

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
        $scopes = [
            'esi-characters.read_contacts.v1',
            'esi-skills.read_skills.v1',
            'esi-characterstats.read.v1'
        ];

        return $this->esi->authorize($scopes);
    }

    /**
     * Receive token from ESI via callback.
     *
     * @param Request $request
     * @return mixed
     * @throws GuzzleException
     */
    public function callback(Request $request)
    {
        $auth = $this->esi->callback($request);
        session()->put('character.access_token', $auth->access_token);
        session()->put('character.refresh_token', $auth->refresh_token);

        return $this->verify();
    }

    /**
     * Verify login and return character information.
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function verify()
    {
        $character = $this->esi->verify();
        session()->put('character.id', $character->CharacterID);
        session()->put('character.name', $character->CharacterName);


        return redirect(route('home'))->with('logged_in', true);
    }
}
