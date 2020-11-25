<?php

namespace Mesa\Http\Controllers\CorporateManagement;

use Mesa\Http\Controllers\Controller;

class ImportController extends Controller
{
    /** @var string */
    protected string $namespace = '\\Mesa\\Import\\';

    /**
     * Import data from ESI.
     *
     * @param string $type
     * @param string $subtype
     * @return mixed
     */
    public function import(string $type, string $subtype)
    {
        $class  = $this->namespace . ucfirst($type);
        $method = strtolower($subtype);
        $instance = new $class();

        $data = $instance->import($method);

        return response()->json($data);
    }
}
