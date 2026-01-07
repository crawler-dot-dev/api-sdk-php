<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Core\Conversion;

use APICrawlerDevSDKs\Core\Conversion\Concerns\ArrayOf;
use APICrawlerDevSDKs\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
