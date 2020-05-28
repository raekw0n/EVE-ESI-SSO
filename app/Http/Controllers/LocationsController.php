<?php

namespace Mesa\Http\Controllers;

use Mesa\{Regions, Constellations, Systems, Stargates, Stations};

class LocationsController extends Controller
{
    protected static $mappings = [
        'regions'        => Regions::class,
        'constellations' => Constellations::class,
        'systems'        => Systems::class,
        'stations'       => Stations::class,
    ];

    public function get($type, $id = null)
    {
        if (isset(static::$mappings[$type])) {
            if ($id) {
                return response()->json(static::$mappings[$type]::where($type.'_id', $id));
            }

            return response()->json(static::$mappings[$type]::all());
        }

        return response()->json('Invalid type ' . $type . ' selected.', 500);
    }
}
