<?php

namespace Mesa\Http\Controllers;

use Illuminate\Http\Request;
use Mesa\Http\Api\EsiAuthClient;

class SsoController extends Controller
{
    protected $esi;

    public function __construct()
    {
        $this->esi = new EsiAuthClient();
    }

    public function login()
    {
        return $this->esi->authorize();
    }

    public function callback(Request $request)
    {
        $this->esi->callback($request);
    }
}
