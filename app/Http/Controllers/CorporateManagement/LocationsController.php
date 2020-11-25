<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Mesa\{Http\Controllers\Controller, Region, Constellation, System, Stargate, Station};

class LocationsController extends Controller
{
    protected static array $mappings = [
        'regions' => Region::class,
        'constellations' => Constellation::class,
        'systems' => System::class,
        'stations' => Station::class,
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
