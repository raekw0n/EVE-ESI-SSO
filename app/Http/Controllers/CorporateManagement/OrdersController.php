<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Mesa\OrderHistory;
use Illuminate\Http\Request;

class OrdersController extends BaseController
{
    public function index()
    {
        $finances['orders'] = OrderHistory::with('division')->get();
        $finances['ledger'] = $this->esi->buildCorporateLedger();
        $finances['total'] = 0;

        foreach ($finances['ledger'] as $idx => $division)
        {
            $finances['total'] += $division->balance;
        }

        return view('management.order-history', compact('finances'));
    }

    public function updateOrderHistoryFromEsi(Request $request)
    {
        $orders = $this->esi->updateDataAccessOrderHistory();

        if ($orders['errors'] > 0)
        {
            $request->session()->flash('error', 'Could not update order history from the ESI, please check the logs.');
        } else {
            $request->session()->flash('success', $orders['total'] . ' orders successfully updated');
        }

        return redirect()->back();
    }
}
