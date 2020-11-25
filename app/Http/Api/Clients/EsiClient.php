<?php

namespace Mesa\Http\Api\Clients;

use GuzzleHttp\Client;

/**
 * ESI client.
 */
class EsiClient implements ClientInterface
{
    /** @var Client $client */
    protected Client $client;

    /** @var string $server */
    protected string $server;

    /** @var string $query */
    protected string $query;

    /** @var string $format */
    protected string $format;

    /** @var array $mappings */
    protected static array $mappings = [];

    /**
     * EsiClient client constructor.
     *
     * @param string|null $server
     */
    public function __construct(string $server = null)
    {
        $this->client = new Client([
            'base_uri' => config('eve.esi.base_uri')
        ]);

        $server = $server ?? config('eve.esi.server');
        $this->server = '?datasource=' . $server;
    }

    /**
     * fetch data from public endpoints.
     *
     * @param string $endpoint
     * @param string $method
     * @return bool|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetch(string $endpoint = '', string $method = 'GET')
    {
        $endpoint .= $this->server;
        $response = $this->client->request($method, $endpoint);
        if ($response && $response->getStatusCode() === 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }
}
