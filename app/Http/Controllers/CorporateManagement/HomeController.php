<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Mesa\Contract;

class HomeController extends BaseController
{
    /**
     * Render the management homepage.
     *
     * @return mixed
     */
    public function index()
    {
        $contracts = Contract::where('type', 'courier')->get();

        $finances['ledger'] = $this->esi->buildCorporateLedger();
        $finances['total'] = 0;

        foreach ($finances['ledger'] as $idx => $division)
        {
            $finances['total'] += $division->balance;
        }

        return view('management.home', compact('contracts', 'finances'));
    }
}
