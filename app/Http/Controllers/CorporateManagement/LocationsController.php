<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Illuminate\Http\JsonResponse;
use Mesa\{Http\Controllers\Controller, Region, Constellation, System, Stargate, Station};

class LocationsController extends Controller
{
    /** @var array|string[] $mappings */
    protected static array $mappings = [
        'regions' => Region::class,
        'constellations' => Constellation::class,
        'systems' => System::class,
        'stations' => Station::class,
    ];

    /**
     * Fetch locations from data access.
     *
     * @param $type
     * @param null $id
     * @return JsonResponse
     */
    public function fetchLocationsFromDataAccess($type, $id = null)
    {
        if (isset(static::$mappings[$type]))
        {
            if ($id)
            {
                return response()->json(static::$mappings[$type]::where($type.'_id', $id));
            }

            return response()->json(static::$mappings[$type]::all());
        }

        return response()->json('Invalid type ' . $type . ' selected.', 500);
    }
}
