<?php

namespace Mesa\Import;

interface ImporterInterface
{
    /**
     * All importer classes should implement this to provide
     * a common method for importing data.
     *
     * @param string $type
     */
    public function import(string $type);
}
