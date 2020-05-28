<?php

namespace Mesa\Http\Api;

use GuzzleHttp\Client;

/**
 * ESI client.
 */
class EsiClient extends AbstractClient
{
    /** @var EsiClient $client */
    protected $client;

    /** @var string $server */
    protected $server;

    /** @var string $query */
    protected $query;

    /** @var string $format */
    protected $format;

    /** @var array $mappings */
    protected static $mappings = [];

    /**
     * EsiClient client constructor.
     *
     * @param string $server
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
        $endpoint .= $this->server . $this->query;
        $response = $this->client->request($method, $endpoint);
        if ($response && $response->getStatusCode() === 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }
}
