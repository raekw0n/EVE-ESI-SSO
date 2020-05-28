<?php

namespace Mesa\Http\Api;

class EsiCorporations extends EsiClient
{
    protected $type;

    public function getCorporation($id)
    {
        return  $this->fetch('/latest/corporations/' . $id);
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
