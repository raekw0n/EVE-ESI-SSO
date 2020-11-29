<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Mesa\OrderHistory;
use Mesa\WalletJournal;
use Illuminate\Http\Request;

class FinanceController extends BaseController
{
    public function index()
    {
        $finances['ledger'] = $this->esi->buildCorporateLedger();
        $finances['journal'] = WalletJournal::with('division')->get();
        $finances['total'] = 0;

        foreach ($finances['ledger'] as $idx => $division)
        {
            $finances['total'] += $division->balance;
        }

        return view('management.finances', compact('finances'));
    }

    public function updateJournalTransactionsFromEsi(Request $request)
    {
        $this->esi->updateDataAccessJournalTransactions();

        $request->session()->flash('success', 'Financial journals and transactions successfully updated.');

        return redirect()->back();
    }
}
