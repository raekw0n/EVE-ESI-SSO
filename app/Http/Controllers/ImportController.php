<?php

namespace Mesa\Http\Controllers;

/**
 * Import Controller.
 */
class ImportController extends Controller
{
    /** @var string */
    protected $namespace = '\\Mesa\\Import\\';

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
