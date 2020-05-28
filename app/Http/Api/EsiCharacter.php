<?php

namespace Mesa\Http\Api;

class EsiCharacter extends EsiAuthClient
{
    private $token;

    private $id;

    private $character;

    protected $base = 'https://esi.evetech.net';

    protected $data = [];

    public function __construct($character)
    {
        $this->token = $character['access_token'];
        $this->id = $character['id'];

        $this->character = $character;

        parent::__construct();
    }

    public function getInfoRequiredForApplication()
    {
        $this->data[$this->id] = [
            'character' => $this->character['info']->CharacterName,
            'portrait' => $this->getPortrait(),
            'standings' => $this->getStandings(),
        ];

        $corpHistory = $this->getCorporationHistory();
        foreach ($corpHistory as $corp) {
            $info = $this->fetch('/latest/corporations/' . $corp->corporation_id);
            $this->data[$this->id]['corporation_history'][$info->name] = ['since' => $corp->start_date];
        }

        return $this->data;
    }

    /**
     * Get character portrait
     *
     * @scope none
     * @return bool|mixed
     */
    private function getPortrait()
    {
        return $this->fetch('/latest/characters/'.$this->id.'/portrait/');
    }


    /**
     * Get character corporation history.
     *
     * @scope none
     * @return bool|mixed
     */
    private function getCorporationHistory()
    {
        return $this->fetch('/latest/characters/'.$this->id.'/corporationhistory/');
    }

    /**
     * Get character standings.
     *
     * @scope esi-characters.read_standings.v1
     * @return bool|mixed
     */
    private function getStandings()
    {
        return $this->fetch('/latest/characters/'.$this->id.'/standings/');
    }

    /**
     * Get character mail.
     *
     * @scope esi-mail.read_mail.v1
     * @return bool|mixed
     */
    private function getMail()
    {
        return $this->fetch('/latest/characters/'.$this->id.'/mail/');
    }
}
