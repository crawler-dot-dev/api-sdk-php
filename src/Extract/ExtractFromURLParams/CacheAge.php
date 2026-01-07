<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Extract\ExtractFromURLParams;

use APICrawlerDevSDKs\Core\Concerns\SdkUnion;
use APICrawlerDevSDKs\Core\Conversion\Contracts\Converter;
use APICrawlerDevSDKs\Core\Conversion\Contracts\ConverterSource;

/**
 * Maximum acceptable age of cached content. This parameter controls how fresh cached data must be to be used.
 * - If a cached item exists and is younger than this value, it will be used (cache hit)
 * - If a cached item exists but is older than this value, it will be ignored and fresh data will be fetched (cache miss)
 * - If set to 0, caching is disabled for this request (always fetches fresh data)
 * - When fresh data is fetched, it will be cached with this value as the TTL for future requests
 * Accepts either:
 * - Integer: milliseconds (e.g., 86400000 for 1 day)
 * - String: time format with unit (e.g., "1s", "5h", "3m", "4.4h", "2d")
 * Supported units: s (seconds), m (minutes), h (hours), d (days), ms (milliseconds)
 * Must be between 0 (no caching) and 3 days. Defaults to "2d" (2 days) if not specified.
 * Examples:
 * - "1s": Only use cached items less than 1 second old; fetch fresh data if cache is older
 * - "1h": Only use cached items less than 1 hour old; fetch fresh data if cache is older
 * - 0: Disable caching entirely; always fetch fresh data.
 *
 * @phpstan-type CacheAgeVariants = int|string
 * @phpstan-type CacheAgeShape = CacheAgeVariants
 */
final class CacheAge implements ConverterSource
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
