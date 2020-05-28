<?php

namespace Mesa\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('apply');
    }

    /**
     * Receive character information from SSO authentication flow.
     */
    public function callback(Request $request)
    {}

    /**
     * Submit application.
     */
    public function submit(Request $request)
    {
        return $this->runSecurityChecks($request->all());
    }

    public function runSecurityChecks(array $all)
    {

    }
}
