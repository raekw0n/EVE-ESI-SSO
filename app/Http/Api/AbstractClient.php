<?php

namespace Mesa\Http\Api;

/**
 * Class AbstractClient
 */
abstract class AbstractClient
{
    /** @var array $mappings */
    protected static $mappings = [];

    /** @var string $query */
    protected $query;

    /**
     * Construct the query
     *
     * @param mixed $param
     * @return $this
     */
    public function query($param)
    {
        $this->query .= (substr($this->query, 0, strlen($this->query)) === '&')
            ? static::$mappings[debug_backtrace()[1]['function']].urlencode($param)
            : '&'.static::$mappings[debug_backtrace()[1]['function']].urlencode($param);

        return $this;
    }
}
