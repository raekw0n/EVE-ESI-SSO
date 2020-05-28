<?php

namespace Mesa\Http\Api;

use Mesa\Auth\Scopes;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EsiAuthClient extends AbstractClient
{
    /** @var EsiClient $client */
    protected $client;

    /** @var string $base */
    protected $base = 'https://login.eveonline.com';

    /** @var mixed $clientId */
    protected $clientId;

    /** @var mixed $secretKey */
    protected $secretKey;

    /** @var string $code */
    protected $code;

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
     * @param array $scopes
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function authorize(array $scopes = [])
    {
        $url = $this->base . '/v2/oauth/authorize?response_type=code';
        $url .= '&redirect_uri=' . urlencode(route('esi.sso.callback'));
        $url .= '&client_id=' . $this->clientId;
        $url .= !empty($scopes) ? $this->buildScopeQueryString($scopes) : '';
        $url .= '&state=' . Str::random();

        return redirect($url);
    }

    /**
     * Callback method to receive the authorization code from EVE SSO
     *
     * @param Request $request
     * @return mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
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

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Verify login and return character information.
     *
     * @return bool|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function verify()
    {
        if (!session()->exists('character.access_token')) {
            return false;
        }

        $response = $this->client->request('GET', '/oauth/verify', [
            'headers' => [
            'Authorization' => 'Bearer ' . session()->get('character.access_token')
        ]]);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Generate query string for ESI scopes.
     *
     * @param array $scopes
     * @return string
     */
    private function buildScopeQueryString(array $scopes)
    {
        $query = '&scope=';
        $count = count($scopes);
        $delim = '%20';
        foreach ($scopes as $name => $key) {
            if (--$count <= 0) $delim = null;
            $query .= $key . $delim;
        }

        return $query;
    }
}
