<?php

namespace Mesa\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        dd(session()->all());
        return view('home');
    }
}
