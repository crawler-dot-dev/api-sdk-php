<?php

namespace CrawlerDev\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CrawlerDev Permission Denied Exception';
}
