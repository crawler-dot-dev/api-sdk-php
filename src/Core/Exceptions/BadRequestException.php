<?php

namespace CrawlerDev\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CrawlerDev Bad Request Exception';
}
