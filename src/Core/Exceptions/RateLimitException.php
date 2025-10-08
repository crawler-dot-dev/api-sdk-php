<?php

namespace CrawlerDev\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CrawlerDev Rate Limit Exception';
}
