<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Mesa\Contract;
use Illuminate\Http\JsonResponse;

class ContractsController extends BaseController
{
    /**
     * Fetch contracts from data access.
     *
     * @return JsonResponse
     */
    public function fetchContractsFromDataAccess()
    {
        $contracts = Contract::all();

        return response()->json($contracts);
    }

    /**
     * Update contracts from the ESI.
     *
     * @return JsonResponse
     */
    public function updateContractsFromEsi()
    {
        $contracts = $this->esi->updateContracts();

        return response()->json($contracts);
    }
}
