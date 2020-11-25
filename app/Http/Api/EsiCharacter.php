<?php

namespace Mesa\Http\Api;

use Log;
use Mesa\Contract;
use Mesa\Http\Api\Clients\EsiAuthClient;

/**
 * ESI Character Management.
 */
class EsiCharacter extends EsiAuthClient
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
     * EsiCharacter constructor.
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
     * Fetch corporate courier contracts
     */
    public function updateCourierContracts()
    {
        $contracts = $this->fetch('/latest/corporations/' . config('eve.esi.corporation') . '/contracts');
        $count = 0;
        $total = count($contracts);
        $errors = 0;
        foreach ($contracts as $contract)
        {
            if (Contract::where('esi_contract_id', $contract->contract_id)->first() === null) {
                $model = new Contract;
                $model->esi_contract_id = $contract->contract_id;
                $model->volume = $contract->volume;

                $model->date_issued = date('Y-m-d H:i:s', strtotime($contract->date_issued));
                $model->date_accepted = date('Y-m-d H:i:s', strtotime($contract->date_accepted));
                $model->date_completed = date('Y-m-d H:i:s', strtotime($contract->date_completed));

                $model->start_location_id = $contract->start_location_id;
                $model->end_location_id = $contract->end_location_id;
                $model->status = $contract->status;

                if ($model->save()) {
                    ++$count;
                } else {
                    ++$errors;
                    Log::error('Failed to import contract: ' . $contract->contract_id);
                }

            } else {
                --$total;
            }
        }

        return [
            'imported' => $count,
            'total' => $total,
            'errors' => $errors
        ];
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
