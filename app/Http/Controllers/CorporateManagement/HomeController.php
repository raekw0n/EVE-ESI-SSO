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
        $balances = $this->esi->fetchCorporateBalances();
        $divisions = $this->esi->fetchCorporateDivisions('wallet');

        $finances['ledger'] = [];
        $finances['total'] = 0;
        if ($balances && $divisions)
        {
            $finances['ledger'] = $this->esi->buildCorporateLedger($divisions, $balances);
            foreach ($finances['ledger'] as $idx => $division)
            {
                $finances['total'] += $division->balance;
            }
        }

        return view('management.home', compact('contracts', 'finances'));
    }
}
