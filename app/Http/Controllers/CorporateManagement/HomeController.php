<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Mesa\Contract;

class HomeController extends BaseController
{
    public function index()
    {
        $contracts = Contract::where('type', 'courier')->get();

        $finances['divisions'] = $this->esi->mapFinanceDivisions(
            $this->esi->fetchCorporateBalances(),
            $this->esi->fetchCorporateDivisions('wallet')
        );

        $finances['total'] = 0;
        foreach($finances['divisions'] as $idx => $finance)
        {
            $finances['total'] += $finance->balance;
        }

        return view('management.home', compact('contracts', 'finances'));
    }
}
