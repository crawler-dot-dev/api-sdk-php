<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Extract\ExtractFromFileParams;

use APICrawlerDevSDKs\Core\Concerns\SdkUnion;
use APICrawlerDevSDKs\Core\Conversion\Contracts\Converter;
use APICrawlerDevSDKs\Core\Conversion\Contracts\ConverterSource;

/**
 * Maximum time before the file extraction gives up. Accepts either:
 * - Integer: milliseconds (e.g., 30000 for 30 seconds)
 * - String: time format with unit (e.g., "1s", "5h", "3m", "4.4h")
 * Supported units: s (seconds), m (minutes), h (hours), d (days), ms (milliseconds)
 * Must be between 5 seconds and 2 minutes. Defaults to "30s" (30 seconds) if not specified.
 * This controls the timeout for Tika extraction operations on uploaded files.
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
