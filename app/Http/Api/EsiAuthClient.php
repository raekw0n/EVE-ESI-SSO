<?php

namespace Mesa\Http\Api;

use Mesa\Auth\Scopes;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * ESI auth client.
 */
class EsiAuthClient extends AbstractClient
{
    /** @var string $server */
    protected $server = 'tranquility';

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

    /**
     * EsiAuthClient constructor.
     *
     * @param string|null $server
     */
    public function __construct(string $server = null)
    {
        $this->clientId = config('eve.esi.client_id');
        $this->secretKey = config('eve.esi.secret_key');

        $this->client = new Client([
            'base_uri' => $this->base
        ]);

        $server = $server ?? config('eve.esi.server');
        $this->server = '?datasource=' . $server;
    }

    /**
     * Fetch data from endpoints that require authentication.
     *
     * @param string $endpoint
     * @param string $method
     * @return bool|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetch(string $endpoint = '', string $method = 'GET')
    {
        $endpoint .= $this->server;
        $response = $this->client->request($method, $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . session()->get('character.access_token')
            ]
        ]);
        if ($response && $response->getStatusCode() === 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
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
            ]
        ]);

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
