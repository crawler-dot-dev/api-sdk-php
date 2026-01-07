<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Extract\ExtractFromURLParams;

use APICrawlerDevSDKs\Core\Concerns\SdkUnion;
use APICrawlerDevSDKs\Core\Conversion\Contracts\Converter;
use APICrawlerDevSDKs\Core\Conversion\Contracts\ConverterSource;

/**
 * Maximum time before the crawler gives up on loading a URL. Accepts either:
 * - Integer: milliseconds (e.g., 15000 for 15 seconds)
 * - String: time format with unit (e.g., "1s", "5h", "3m", "4.4h")
 * Supported units: s (seconds), m (minutes), h (hours), d (days), ms (milliseconds)
 * Must be between 1 second and 30 seconds. Defaults to "10s" (10 seconds) if not specified.
 *
 * @phpstan-type MaxTimeoutVariants = int|string
 * @phpstan-type MaxTimeoutShape = MaxTimeoutVariants
 */
final class MaxTimeout implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['int', 'string'];
    }
}
