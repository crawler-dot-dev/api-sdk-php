<?php

namespace CrawlerDev\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CrawlerDev Internal Server Exception';
}
