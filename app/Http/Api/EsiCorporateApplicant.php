<?php

namespace Mesa\Http\Api;

use Log;
use Mesa\Contract;
use Mesa\Http\Api\Clients\EsiAuthClient;

/**
 * ESI Character Management.
 */
class EsiCorporateApplicant extends EsiAuthClient
{
    /** @var mixed $token */
    private $token;

    /** @var mixed $id */
    public $id;

    /** @var mixed $name */
    private $name;

    /** @var string $base */
    protected string $base = 'https://esi.evetech.net';

    /** @var array $data */
    protected array $data = [];

    /**
     * EsiCorporateManagement constructor.
     *
     * @param $character
     */
    public function __construct($character)
    {
        $this->token = $character['access_token'];
        $this->id = $character['id'];

        $this->name = $character['name'];

        parent::__construct();
    }

    /**
     * Obtain information required for character applications.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getInfoRequiredForApplication()
    {
        $this->data[$this->id] = ['name' => $this->name];

        $corpHistory = $this->getCorporationHistory();
        foreach ($corpHistory as $corp) {
            $info = $this->fetch('/latest/corporations/' . $corp->corporation_id);
            $this->data[$this->id]['corporation_history'][$info->name] = ['since' => $corp->start_date];
        }

        $this->data[$this->id]['current_corporation'] = key($this->data[$this->id]['corporation_history']);
        $this->data[$this->id]['contacts'] = $this->getContacts();

        return $this->data[$this->id];
    }

    /**
     * Get character corporation history.
     *
     * @scope none
     * @return bool|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function getCorporationHistory()
    {
        return $this->fetch('/latest/characters/'.$this->id.'/corporationhistory/');
    }


    /**
     * Get character contacts.
     *
     * @scope esi-characters.read_contacts.v1
     * @return bool|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function getContacts()
    {
        return $this->fetch('/latest/characters/'.$this->id.'/contacts/');
    }
}
