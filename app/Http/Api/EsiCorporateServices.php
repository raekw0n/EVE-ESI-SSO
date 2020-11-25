<?php

namespace Mesa\Http\Api;

use Log;
use Cache;
use Mesa\Station;
use Mesa\Contract;
use Mesa\Http\Api\Clients\EsiAuthClient;

/**
 * ESI Corporate Services.
 */
class EsiCorporateServices extends EsiAuthClient
{
    private $token;

    public $id;

    private $name;

    protected string $base = 'https://esi.evetech.net';

    protected array $data = [];

    public function __construct(array $character)
    {
        $this->token = $character['access_token'];
        $this->id = $character['id'];

        $this->name = $character['name'];

        parent::__construct();
    }

    public function planJourneyRoute($origin, $destination)
    {
        return $this->fetch('/latest/route' . $origin, $destination);
    }
}
