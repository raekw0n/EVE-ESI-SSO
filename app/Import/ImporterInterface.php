<?php

namespace Mesa\Import;

/**
 * Importer Interface
 */
interface ImporterInterface
{
    /**
     * All importer classes should implement this to provide
     * a common method for importing data.
     */
    public function import(string $type);
}
