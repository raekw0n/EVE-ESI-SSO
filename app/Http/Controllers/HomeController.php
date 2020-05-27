<?php

namespace Mesa\Http\Controllers;

use Mesa\Http\Api\EsiLocations;
use Mesa\Regions;

class HomeController extends Controller
{
    public function index()
    {
        $this->test();
        return view('home');
    }
}
