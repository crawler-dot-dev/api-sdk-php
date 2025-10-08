<?php

namespace CrawlerDev\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CrawlerDev Not Found Exception';
}
