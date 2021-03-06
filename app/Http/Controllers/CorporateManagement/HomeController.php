<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Mesa\Application;
use Mesa\Contract;
use Mesa\Http\Api\EsiCorporateManagement;

class HomeController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View
     */
    public function index()
    {
        $contracts = Contract::where('type','courier')
            ->where('status', '!=', 'deleted')
            ->get();

        $finances['ledger'] = $this->esi->buildCorporateLedger();
        $finances['total'] = 0;

        foreach ($finances['ledger'] as $division)
        {
            $finances['total'] += $division->balance;
        }

        $applications = Application::all();

        return view('management.home', compact('contracts', 'finances', 'applications'));
    }
}
