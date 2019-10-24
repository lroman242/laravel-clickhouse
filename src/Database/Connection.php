<?php

declare(strict_types=1);

namespace Libern\LaravelClickHouse\Database;

use Tinderbox\ClickhouseBuilder\Query\Grammar;
use Libern\LaravelClickHouse\Database\Query\Builder;

class Connection extends \Tinderbox\ClickhouseBuilder\Integrations\Laravel\Connection
{
    public function __construct(array $config)
    {
        parent::__construct($config);

        $this->queryGrammar = $this->getDefaultQueryGrammar();
    }

    /**
     * Get the default query grammar instance.
     *
     * @return \Tinderbox\ClickhouseBuilder\Query\Grammar
     */
    protected function getDefaultQueryGrammar()
    {
        return new Grammar();
    }
    
    public function query()
    {
        return new Builder($this, new Grammar());
    }
}
