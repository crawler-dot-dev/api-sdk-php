<?php

declare(strict_types=1);

namespace CrawlerDev\Core\Conversion\Contracts;

/**
 * @internal
 */
interface ConverterSource
{
    public static function converter(): Converter;
}
