<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Mesa\Contract;

class HomeController extends BaseController
{
    public function index()
    {
        $contracts = Contract::where('type', 'courier')->get();

        $balances = $this->esi->fetchCorporateBalances();
        $divisions = $this->esi->fetchCorporateDivisions('wallet');

        unset($divisions[0], $balances[0]); // Unset unused Master division.
        foreach ($balances as $balance) {
            foreach ($divisions as $idx => $division) {
                if ($balance->division === $division->division) {
                    $divisions[$idx]->balance = $balance->balance;
                }
            }
        }
        $finances['divisions'] = $divisions;

        $finances['total'] = 0;
        foreach($finances['divisions'] as $idx => $finance)
        {
            $finances['total'] += $finance->balance;
        }

        return view('management.home', compact('contracts', 'finances'));
    }
}
