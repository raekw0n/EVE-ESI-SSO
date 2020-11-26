<?php

namespace Mesa\Http\Controllers;

use Mesa\Contract;
use Illuminate\Routing\Controller;

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
