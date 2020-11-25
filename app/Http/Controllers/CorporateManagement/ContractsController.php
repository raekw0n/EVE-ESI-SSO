<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Log;
use Mesa\Contract;

class ContractsController extends EsiController
{
    public function fetchContractsFromDataAccess()
    {
        $contracts = Contract::all();
        return response()->json($contracts);
    }

    public function updateContractsFromEsi()
    {
        $contracts = $this->character->updateCourierContracts();
        return response()->json($contracts);
    }
}
