<?php

namespace Mesa\Http\Api;

class EsiLocations extends EsiClient
{

    protected $type;

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
