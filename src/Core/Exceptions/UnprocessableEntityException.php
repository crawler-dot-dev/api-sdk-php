<?php

namespace CrawlerDev\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'CrawlerDev Unprocessable Entity Exception';
}
