<?php

namespace Mesa\Http\Controllers;

use Mesa\Http\Api\EsiCharacter;

class CharacterController extends Controller
{
    private $character;

    /**
     * CharacterController constructor.
     */
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            $this->character = new EsiCharacter(session()->get('character'));
            return $next($request);
        });
    }

    public function getInfoRequiredForApplication()
    {
        $data = $this->character->getInfoRequiredForApplication();

        dd($data);
    }
}
