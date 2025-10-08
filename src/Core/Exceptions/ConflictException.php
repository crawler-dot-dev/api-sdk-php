<?php

namespace CrawlerDev\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CrawlerDev Conflict Exception';
}
