<?php

namespace Mesa\Http\Api;

class EsiLocations extends EsiClient
{
    protected $endpoint = '/latest/universe/';

    public function getData(string $type, int $id = null)
    {
        $this->endpoint .= $type;
        if (!is_null($id)) {
            $this->endpoint .= '/' . $id;
        }

        return $this->fetch($this->endpoint);
    }

    public function mapToModel(string $type, $data, $attributes)
    {

    }
}
