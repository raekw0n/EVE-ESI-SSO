<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Illuminate\Http\Request;
use Mesa\Contract;
use Illuminate\Http\JsonResponse;

class ContractsController extends BaseController
{

    public function index()
    {
        $contracts = Contract::where('type', 'courier')->get();

        return view('management.contracts', compact('contracts'));
    }

    /**
     * Update contracts from the ESI.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function updateContractsFromEsi(Request $request)
    {
        $contracts = $this->esi->updateDataAccessContracts();
        if ($contracts['errors'] > 0)
        {
            $request->session()->flash('error', 'Could not fetch contracts from the ESI, please check the logs.');
        } else {
            $request->session()->flash('success', $contracts['total'] . ' contracts successfully updated');
        }

        return redirect()->back();
    }
}
