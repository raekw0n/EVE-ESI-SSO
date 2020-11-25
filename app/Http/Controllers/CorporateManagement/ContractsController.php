<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Log;
use Mesa\Contract;
use Mesa\System;
use GuzzleHttp\Exception\GuzzleException;

class ContractsController extends EsiController
{
    public function fetchContractsFromDataAccess()
    {
        $contracts = Contract::all();
        foreach($contracts as $contract)
        {
            try {
                $end_system = $this->character->fetch('/latest/universe/stations/' . $contract['end_location_id'])->system_id;
                $start_system = $this->character->fetch('/latest/universe/stations/' . $contract['start_location_id'])->system_id;

                $contract['start_location_id'] = System::where('system_id', $start_system)->first()->name;
                $contract['end_location_id'] = System::where('system_id', $end_system)->first()->name;
            } catch (GuzzleException $e) {
                Log::error($e->getMessage());
            }
        }

        dd($contracts);
        return response()->json($contracts);
    }

    public function updateContractsFromEsi()
    {
        $contracts = $this->character->updateCourierContracts();
        return response()->json($contracts);
    }
}
