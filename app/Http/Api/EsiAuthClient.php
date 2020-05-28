<?php

namespace Mesa\Http\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EsiAuthClient extends AbstractClient
{
    /** @var EsiClient $client */
    protected $client;

    protected $base = 'https://login.eveonline.com';

    protected $clientId;
    protected $secretKey;

    protected $code;
    protected $state;

    public function __construct()
    {
        $this->clientId = config('eve.esi.client_id');
        $this->secretKey = config('eve.esi.secret_key');

        $this->client = new Client([
            'base_uri' => $this->base
        ]);
    }

    /**
     * Redirect to login to obtain an authorization token.
     *
     * return mixed
     */
    public function authorize()
    {
        return redirect($this->base.'/v2/oauth/authorize?response_type=code&redirect_uri='.
            urlencode('http://mesa-orbital.local/eveauth/callback').
            '&client_id='.$this->clientId.
            '&state='.Str::random(16)
        );
    }

    /**
     * Callback method to receive the authorization code from EVE SSO
     *
     * @param Request $request
     */
    public function callback(Request $request)
    {
        $this->code = $request->get('code');
        return $this->login();
    }

    /**
     * Post login to receive access and refresh tokens.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function login()
    {
        $response = $this->client->request('POST', '/v2/oauth/token', [
            'auth' => [
                $this->clientId,
                $this->secretKey
            ],
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $this->code,
            ]
        ]);

        $user = json_decode($response);

        // TODO WIP modify users table to store tokens
    }
}
