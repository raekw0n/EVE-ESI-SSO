<?php

namespace Mesa\Http\Api\Import;

use Mesa\Http\Api\Clients\EsiClient;

class EsiLocations extends EsiClient
{
    protected string $type;

    public function getData(int $id = null)
    {
        $endpoint = '/latest/universe/' . $this->type;
        if (!is_null($id)) {
            $endpoint .= '/' . $id;
        }

        return $this->fetch($endpoint);
    }

    /**
     * @param mixed $type
     * @return EsiLocations
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}
