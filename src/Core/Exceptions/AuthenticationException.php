<?php

namespace CrawlerDev\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CrawlerDev Authentication Exception';
}
