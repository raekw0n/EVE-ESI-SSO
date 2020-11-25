<?php

namespace Mesa\Http\Api;

use Log;
use Cache;
use Mesa\Station;
use Mesa\Contract;
use Mesa\Http\Api\Clients\EsiAuthClient;

/**
 * ESI Character Management.
 */
class EsiCorporateManagement extends EsiAuthClient
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

    public function fetchCorporateDivisions($type = null)
    {
        if (Cache::has('corporate.divisions')) {
            $divisions = Cache::get('corporate.divisions');
        } else {
            $divisions = $this->fetch('/latest/corporations/' . config('eve.esi.corporation') . '/divisions');
            Cache::put('corporate.divisions', $divisions, 3600);
        }

        if (!is_null($type)) {
            return $divisions->{$type};
        }

        return $divisions;
    }

    public function fetchCorporateBalances()
    {
        if (Cache::has('corporate.wallets')) {
            $wallets = Cache::get('corporate.wallets');
        } else {
            $wallets = $this->fetch('/latest/corporations/' . config('eve.esi.corporation') . '/wallets');
            Cache::put('corporate.wallets', $wallets, 3600);
        }

        return $wallets;
    }

    public function updateContracts()
    {
        $contracts = $this->fetch('/latest/corporations/' . config('eve.esi.corporation') . '/contracts');
        $count = 0;
        $total = 0;
        $errors = 0;

        if ($contracts) {
            $total = count($contracts);
            foreach ($contracts as $contract) {
                if (Contract::where('esi_contract_id', $contract->contract_id)->first() === null) {
                    $model = new Contract;
                    $model->esi_contract_id = $contract->contract_id;
                    $model->volume = $contract->volume;
                    $model->type = $contract->type;
                    $model->availability = $contract->availability;
                    $model->days_to_complete = $contract->days_to_complete;
                    $model->issuer_id = $contract->issuer_id;

                    if ($contract->type === "courier") {
                        $model->reward = $contract->reward;
                        $model->collateral = $contract->collateral;
                        $model->start_location_id = $contract->start_location_id;
                        $model->end_location_id = $contract->end_location_id;
                    }

                    $model->date_issued = date('Y-m-d H:i:s', strtotime($contract->date_issued));

                    $model->date_expires = date('Y-m-d H:i:s', strtotime($model->date_issued . '+ '
                        . $model->days_to_complete . ' days'));

                    $model->date_accepted = isset($contract->date_accepted)
                        ? date('Y-m-d H:i:s', strtotime($contract->date_accepted)) : null;

                    $model->date_completed = isset($contract->date_completed)
                        ? date('Y-m-d H:i:s', strtotime($contract->date_completed)) : null;

                    $model->status = $contract->status;

                    if ($model->save()) {
                        $this->updateStationsFromContract($model);
                        ++$count;
                    } else {
                        ++$errors;
                        Log::error('Failed to import contract: ' . $contract->contract_id);
                    }

                } else {
                    --$total;
                }
            }
        } else {
            ++$errors;
        }

        return [
            'imported' => $count,
            'total' => $total,
            'errors' => $errors
        ];
    }

    public function updateStationsFromContract(Contract $contract)
    {
        if ($contract->type === "courier") {
            $start_id = $contract->start_location_id;
            $end_id = $contract->end_location_id;

            $stations = [];
            if (is_32bit_signed_int((int)$start_id)) {
                $stations[] = $this->fetch('/latest/universe/stations/' . $start_id);
            }

            if (is_32bit_signed_int((int)$end_id)) {
                $stations[] = $this->fetch('/latest/universe/stations/' . $end_id);
            }

            foreach ($stations as $station) {
                if ($station) {
                    if (Station::where('station_id', $station->station_id)->first() === null) {
                        $model = new Station();
                        $model->system_id = $station->system_id;
                        $model->station_id = $station->station_id;
                        $model->name = $station->name;
                        $model->max_dock_ship_volume = $station->max_dockable_ship_volume;

                        if (!$model->save()) {
                            Log::error('Failed to import station ' . $station->station_id);
                        }
                    }
                }
            }
        }
    }
}
