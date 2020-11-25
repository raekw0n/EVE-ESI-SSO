<?php

namespace Mesa\Http\Controllers;

class StaticPageController extends Controller
{
    public function haulage()
    {
        return view('haulage');
    }

    public function reprocessing()
    {
        return view('reprocessing');
    }

    public function manufacturing()
    {
        return view('manufacturing');
    }
}
