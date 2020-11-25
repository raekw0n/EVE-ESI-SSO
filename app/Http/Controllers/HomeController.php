<?php

namespace Mesa\Http\Controllers;

use Mesa\Contract;

class HomeController extends Controller
{
    /**
     * Render the homepage.
     *
     * @return mixed
     */
    public function index()
    {
        $contracts = Contract::count();
        return view('home', compact('contracts'));
    }
}
