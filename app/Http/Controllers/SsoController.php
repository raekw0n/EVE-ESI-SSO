<?php

namespace Mesa\Http\Controllers;

use Illuminate\Http\Request;
use Mesa\Http\Api\Clients\EsiAuthClient;
use GuzzleHttp\Exception\GuzzleException;

class SsoController extends Controller
{
    /** @var EsiAuthClient $esi */
    protected EsiAuthClient $esi;

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
     * perform corporate SSO login.
     *
     * @return mixed
     */
    public function corporateLogin()
    {
        $scopes = [
            'esi-characters.read_contacts.v1',
            'esi-skills.read_skills.v1',
            'esi-characterstats.read.v1',
            'esi-corporations.read_structures.v1',
            'esi-corporations.read_standings.v1',
            'esi-corporations.read_divisions.v1',
            'esi-corporations.read_corporation_membership.v1',
            'esi-corporations.track_members.v1',
            'esi-corporations.read_facilities.v1',
            'esi-killmails.read_corporation_killmails.v1',
            'esi-contracts.read_corporation_contracts.v1',
            'esi-wallet.read_corporation_wallets.v1',
            'esi-planets.read_customs_offices.v1',
            'esi-markets.read_corporation_orders.v1',
            'esi-markets.read_corporation_orders.v1',
            'esi-industry.read_corporation_jobs.v1',
            'esi-killmails.read_corporation_killmails.v1',
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
        session()->put('character.scopes', explode(" ", $character->Scopes));
        session()->put('character.portrait', 'https://images.evetech.net/characters/'.
            $character->CharacterID.'/portrait?tenant=tranquility&size=128');


        return redirect(route('home'))->with('logged_in', true);
    }
}
