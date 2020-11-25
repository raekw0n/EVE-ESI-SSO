<?php

namespace Mesa\Http\Controllers\CorporateServices;

use Mesa\Http\Controllers\CorporateManagement\BaseController;
use Mesa\System;

class RoutePlanningController extends BaseController
{
    public function index()
    {
        $systems = System::all(['system_id', 'name'])->sortBy('name');

        return view('route.planner', compact('systems'));
    }

    public function planRoute($origin, $destination)
    {
        $route = $this->esi->planCourierRoute($origin, $destination);
        if ($route)
        {
            dd($route);
        } else {
            dd($route);
        }
    }
}
