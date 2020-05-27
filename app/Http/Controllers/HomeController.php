<?php

namespace Mesa\Http\Controllers;

use Illuminate\Http\Request;
use Mesa\Http\Api\EsiClient;
use Mesa\Http\Api\EsiLocations;

class HomeController extends Controller
{
    public function index()
    {
        $esi = new EsiLocations();
        $regionIds = $esi->getData('stations', '60012526');

        dd($regionIds);
    }
}
