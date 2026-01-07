<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Core\Conversion;

use APICrawlerDevSDKs\Core\Conversion\Concerns\ArrayOf;
use APICrawlerDevSDKs\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    // @phpstan-ignore-next-line missingType.iterableValue
    private function empty(): array|object
    {
        return [];
    }
}
