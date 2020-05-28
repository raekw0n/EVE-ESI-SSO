<?php

namespace Mesa\Http\Controllers;

use Illuminate\Http\Request;
use Mesa\Application;
use Mesa\Http\Api\EsiCharacter;

/**
 * Application Constructor.
 */
class ApplicationController extends Controller
{
    /** @var mixed $character */
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

    /**
     * Render application page.
     *
     * @return mixed
     */
    public function index()
    {
        return view('apply.form');
    }

    /**
     * Submit application.
     */
    public function submit(Request $request)
    {
        $information = $this->character->getInfoRequiredForApplication();

        if(Application::where('character_name', $information['name'])->first()) {
            return view('apply.confirmation', [
                'character' => $information['name'],
                'message' => 'We have already received an application for ' . $information['name'] . ', please contact Solomon Kaldari in-game for assistance.'
            ]);
        }

        $application = new Application();

        $application->character_name = $information['name'];
        $application->character_corporation = $information['current_corporation'];

        $application->length_playing = $request->get('length_playing');
        $application->favourite_activities = $request->get('favourite_activities');
        $application->reason_joining = $request->get('reason_joining');
        $application->real_life = $request->get('real_life');
        $application->haiku = $request->get('haiku');

        if (!$application->save()) {
            return response()->json(['error' => 'There was an error with your application, please try again.']);
        }

        return view('apply.confirmation', [
            'character' => $information['name'],
            'message' => 'Success! your application has been received. Please keep an eye on your EVEmail, we\'ll send you an invite or an update shortly.'
        ]);
    }
}
