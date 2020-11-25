<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Mesa\Contract;

class ContractsController extends BaseController
{
    public function fetchContractsFromDataAccess()
    {
        $contracts = Contract::all();

        return response()->json($contracts);
    }

    public function updateContractsFromEsi()
    {
        $contracts = $this->esi->updateContracts();

        return response()->json($contracts);
    }
}
