<?php

namespace CrawlerDev\Core\Exceptions;

class CrawlerDevException extends \Exception
{
    /** @var string */
    protected const DESC = 'CrawlerDev Error';

    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($this::DESC.PHP_EOL.$message, $code, $previous);
    }
}
