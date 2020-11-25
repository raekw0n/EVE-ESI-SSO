<?php

namespace Mesa\Http\Api;

use Mesa\Http\Api\Clients\EsiClient;

class EsiCorporations extends EsiClient
{
    protected $type;

    public function getCorporation($id)
    {
        return  $this->fetch('/latest/corporations/' . $id);
    }

    /**
     * @param mixed $type
     * @return EsiCorporations
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}
