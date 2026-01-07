<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Extract\ExtractFromURLParams;

use APICrawlerDevSDKs\Core\Concerns\SdkUnion;
use APICrawlerDevSDKs\Core\Conversion\Contracts\Converter;
use APICrawlerDevSDKs\Core\Conversion\Contracts\ConverterSource;

/**
 * Maximum content length for the URL response. Accepts either:
 * - Integer: bytes (e.g., 8388608 for 8MB)
 * - String: size format with unit (e.g., "1kb", "55mb", "1.2gb")
 * Supported units: b (bytes), kb (kilobytes), mb (megabytes), gb (gigabytes), tb (terabytes)
 * Must be between 1KB and 8MB. Defaults to "8mb" (8MB) if not specified.
 *
 * @phpstan-type MaxSizeVariants = int|string
 * @phpstan-type MaxSizeShape = MaxSizeVariants
 */
final class MaxSize implements ConverterSource
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
