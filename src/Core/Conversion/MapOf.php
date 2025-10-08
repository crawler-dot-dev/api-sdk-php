<?php

declare(strict_types=1);

namespace CrawlerDev\Core\Conversion;

use CrawlerDev\Core\Conversion\Concerns\ArrayOf;
use CrawlerDev\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
