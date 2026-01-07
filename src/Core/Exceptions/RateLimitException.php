<?php

namespace APICrawlerDevSDKs\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'APICrawlerDevSDKs Rate Limit Exception';
}
