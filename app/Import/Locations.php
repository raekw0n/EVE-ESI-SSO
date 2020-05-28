<?php

namespace Mesa\Import;

use Exception;
use Mesa\Http\Api\EsiLocations;
use Mesa\{Regions, Constellations, Systems, Stargates, Stations};

/**
 * Locations Importer
 */
class Locations extends AbstractImporter
{
    /** @var EsiLocations $esi; */
    private $esi;

    /**
     * Locations constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->esi = new EsiLocations();
    }

    /**
     * Import regions.
     *
     * @return array
     */
    public function regions() {

        $this->esi->setType('regions');

        $regions = $this->esi->getData();
        $count = count($regions);
        if ($count > 0) {
            $counter = 0;
            foreach ($regions as $id) {
                $data = $this->esi->getData($id);

                $region = new Regions();
                $region->region_id = $data->region_id;
                $region->name = $data->name;
                $region->description = $data->description ?? '';

                if ($region->save()) {
                    ++$counter;
                }
            }
        }

        return ['regions' => $count, 'imported' => $counter];
    }

    /**
     * Import constellations.
     *
     * @return array
     */
    public function constellations() {
        $this->esi->setType('constellations');

        $constellations = $this->esi->getData();
        $count = count($constellations);
        if ($count > 0) {
            $counter = 0;
            foreach ($constellations as $id) {
                $data = $this->esi->getData($id);

                $constellation = new Constellations();
                $constellation->region_id = $data->region_id;
                $constellation->constellation_id = $data->constellation_id;
                $constellation->name = $data->name;

                if ($constellation->save()) {
                    ++$counter;
                }
            }
        }

        return ['constellations' => $count, 'imported' => $counter];
    }

    /**
     * Import systems.
     *
     * @return array
     */
    public function systems() {
        $this->esi->setType('systems');

        $systems = $this->esi->getData();
        $count = count($systems);
        if ($count > 0) {
            $counter = 0;
            foreach ($systems as $id) {
                $data = $this->esi->getData($id);

                $system = new Systems();
                $system->constellation_id = $data->constellation_id;
                $system->system_id = $data->system_id;
                $system->name = $data->name;
                $system->security_class = $data->security_class ?? '';
                $system->security_status = $data->security_status ?? '';

                if ($system->save()) {
                    ++$counter;
                }
            }
        }

        return ['systems' => $count, 'imported' => $counter];
    }

    /**
     * Import stargates.
     *
     */
    public function stargates() {}

    /**
     * Import stations.
     *
     */
    public function stations() {}
}
