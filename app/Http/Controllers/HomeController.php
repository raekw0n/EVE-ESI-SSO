<?php

namespace Mesa\Http\Controllers;

use Mesa\Contract;

class HomeController extends Controller
{
    public function index()
    {
        $contracts = Contract::count();
        return view('home', compact('contracts'));
    }
}
