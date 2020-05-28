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
            if(session()->exists('character')) {
                $this->character = new EsiCharacter(session()->get('character'));
                return $next($request);
            }

            return redirect(route('esi.sso.login'));
        });
    }
}
