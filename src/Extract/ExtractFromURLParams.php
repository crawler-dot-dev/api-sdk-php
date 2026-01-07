<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Extract;

use APICrawlerDevSDKs\Core\Attributes\Optional;
use APICrawlerDevSDKs\Core\Attributes\Required;
use APICrawlerDevSDKs\Core\Concerns\SdkModel;
use APICrawlerDevSDKs\Core\Concerns\SdkParams;
use APICrawlerDevSDKs\Core\Contracts\BaseModel;
use APICrawlerDevSDKs\Extract\ExtractFromURLParams\Format;
use APICrawlerDevSDKs\Extract\ExtractFromURLParams\Proxy;

/**
 * Extract text content from a webpage or document accessible via URL. Supports HTML, PDF, and other web-accessible content types.
 *
 * @see APICrawlerDevSDKs\Services\ExtractService::fromURL()
 *
 * @phpstan-import-type CacheAgeVariants from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\CacheAge
 * @phpstan-import-type MaxSizeVariants from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\MaxSize
 * @phpstan-import-type MaxTimeoutVariants from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\MaxTimeout
 * @phpstan-import-type CacheAgeShape from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\CacheAge
 * @phpstan-import-type MaxSizeShape from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\MaxSize
 * @phpstan-import-type MaxTimeoutShape from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\MaxTimeout
 * @phpstan-import-type ProxyShape from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\Proxy
 *
 * @phpstan-type ExtractFromURLParamsShape = array{
 *   url: string,
 *   cacheAge?: CacheAgeShape|null,
 *   cleanText?: bool|null,
 *   formats?: list<Format|value-of<Format>>|null,
 *   headers?: array<string,string>|null,
 *   maxRedirects?: int|null,
 *   maxSize?: MaxSizeShape|null,
 *   maxTimeout?: MaxTimeoutShape|null,
 *   proxy?: null|Proxy|ProxyShape,
 *   stealthMode?: bool|null,
 * }
 */
final class ExtractFromURLParams implements BaseModel
{
    /** @use SdkModel<ExtractFromURLParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL to extract text from.
     */
    #[Required]
    public string $url;

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
     * @var CacheAgeVariants|null $cacheAge
     */
    #[Optional]
    public int|string|null $cacheAge;

    /**
     * Whether to clean extracted text.
     */
    #[Optional]
    public ?bool $cleanText;

    /**
     * Array of output formats to include in the response. Options: 'text', 'markdown'.
     * - 'text': Extracted plain text (always available)
     * - 'markdown': Markdown representation (only available for HTML content, empty string otherwise)
     * Defaults to ['text'] if not specified.
     *
     * @var list<value-of<Format>>|null $formats
     */
    #[Optional(list: Format::class)]
    public ?array $formats;

    /**
     * Custom HTTP headers to send with the request (case-insensitive).
     *
     * @var array<string,string>|null $headers
     */
    #[Optional(map: 'string')]
    public ?array $headers;

    /**
     * Maximum number of redirects to follow when fetching the URL. Must be between 0 (no redirects) and 20. Defaults to 5 if not specified.
     */
    #[Optional]
    public ?int $maxRedirects;

    /**
     * Maximum content length for the URL response. Accepts either:
     * - Integer: bytes (e.g., 8388608 for 8MB)
     * - String: size format with unit (e.g., "1kb", "55mb", "1.2gb")
     * Supported units: b (bytes), kb (kilobytes), mb (megabytes), gb (gigabytes), tb (terabytes)
     * Must be between 1KB and 8MB. Defaults to "8mb" (8MB) if not specified.
     *
     * @var MaxSizeVariants|null $maxSize
     */
    #[Optional]
    public int|string|null $maxSize;

    /**
     * Maximum time before the crawler gives up on loading a URL. Accepts either:
     * - Integer: milliseconds (e.g., 15000 for 15 seconds)
     * - String: time format with unit (e.g., "1s", "5h", "3m", "4.4h")
     * Supported units: s (seconds), m (minutes), h (hours), d (days), ms (milliseconds)
     * Must be between 1 second and 30 seconds. Defaults to "10s" (10 seconds) if not specified.
     *
     * @var MaxTimeoutVariants|null $maxTimeout
     */
    #[Optional]
    public int|string|null $maxTimeout;

    /**
     * Proxy configuration for the request.
     */
    #[Optional]
    public ?Proxy $proxy;

    /**
     * When enabled, we use a proxy for the request. If set to true, and the 'proxy' option is set, it will be ignored. Defaults to false if not specified.
     * Note: Enabling stealthMode consumes an additional credit/quota point (2 credits total instead of 1) for this request.
     */
    #[Optional]
    public ?bool $stealthMode;

    /**
     * `new ExtractFromURLParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExtractFromURLParams::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExtractFromURLParams)->withURL(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CacheAgeShape|null $cacheAge
     * @param list<Format|value-of<Format>>|null $formats
     * @param array<string,string>|null $headers
     * @param MaxSizeShape|null $maxSize
     * @param MaxTimeoutShape|null $maxTimeout
     * @param Proxy|ProxyShape|null $proxy
     */
    public static function with(
        string $url,
        int|string|null $cacheAge = null,
        ?bool $cleanText = null,
        ?array $formats = null,
        ?array $headers = null,
        ?int $maxRedirects = null,
        int|string|null $maxSize = null,
        int|string|null $maxTimeout = null,
        Proxy|array|null $proxy = null,
        ?bool $stealthMode = null,
    ): self {
        $self = new self;

        $self['url'] = $url;

        null !== $cacheAge && $self['cacheAge'] = $cacheAge;
        null !== $cleanText && $self['cleanText'] = $cleanText;
        null !== $formats && $self['formats'] = $formats;
        null !== $headers && $self['headers'] = $headers;
        null !== $maxRedirects && $self['maxRedirects'] = $maxRedirects;
        null !== $maxSize && $self['maxSize'] = $maxSize;
        null !== $maxTimeout && $self['maxTimeout'] = $maxTimeout;
        null !== $proxy && $self['proxy'] = $proxy;
        null !== $stealthMode && $self['stealthMode'] = $stealthMode;

        return $self;
    }

    /**
     * The URL to extract text from.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

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
     * @param CacheAgeShape $cacheAge
     */
    public function withCacheAge(int|string $cacheAge): self
    {
        $self = clone $this;
        $self['cacheAge'] = $cacheAge;

        return $self;
    }

    /**
     * Whether to clean extracted text.
     */
    public function withCleanText(bool $cleanText): self
    {
        $self = clone $this;
        $self['cleanText'] = $cleanText;

        return $self;
    }

    /**
     * Array of output formats to include in the response. Options: 'text', 'markdown'.
     * - 'text': Extracted plain text (always available)
     * - 'markdown': Markdown representation (only available for HTML content, empty string otherwise)
     * Defaults to ['text'] if not specified.
     *
     * @param list<Format|value-of<Format>> $formats
     */
    public function withFormats(array $formats): self
    {
        $self = clone $this;
        $self['formats'] = $formats;

        return $self;
    }

    /**
     * Custom HTTP headers to send with the request (case-insensitive).
     *
     * @param array<string,string> $headers
     */
    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self['headers'] = $headers;

        return $self;
    }

    /**
     * Maximum number of redirects to follow when fetching the URL. Must be between 0 (no redirects) and 20. Defaults to 5 if not specified.
     */
    public function withMaxRedirects(int $maxRedirects): self
    {
        $self = clone $this;
        $self['maxRedirects'] = $maxRedirects;

        return $self;
    }

    /**
     * Maximum content length for the URL response. Accepts either:
     * - Integer: bytes (e.g., 8388608 for 8MB)
     * - String: size format with unit (e.g., "1kb", "55mb", "1.2gb")
     * Supported units: b (bytes), kb (kilobytes), mb (megabytes), gb (gigabytes), tb (terabytes)
     * Must be between 1KB and 8MB. Defaults to "8mb" (8MB) if not specified.
     *
     * @param MaxSizeShape $maxSize
     */
    public function withMaxSize(int|string $maxSize): self
    {
        $self = clone $this;
        $self['maxSize'] = $maxSize;

        return $self;
    }

    /**
     * Maximum time before the crawler gives up on loading a URL. Accepts either:
     * - Integer: milliseconds (e.g., 15000 for 15 seconds)
     * - String: time format with unit (e.g., "1s", "5h", "3m", "4.4h")
     * Supported units: s (seconds), m (minutes), h (hours), d (days), ms (milliseconds)
     * Must be between 1 second and 30 seconds. Defaults to "10s" (10 seconds) if not specified.
     *
     * @param MaxTimeoutShape $maxTimeout
     */
    public function withMaxTimeout(int|string $maxTimeout): self
    {
        $self = clone $this;
        $self['maxTimeout'] = $maxTimeout;

        return $self;
    }

    /**
     * Proxy configuration for the request.
     *
     * @param Proxy|ProxyShape $proxy
     */
    public function withProxy(Proxy|array $proxy): self
    {
        $self = clone $this;
        $self['proxy'] = $proxy;

        return $self;
    }

    /**
     * When enabled, we use a proxy for the request. If set to true, and the 'proxy' option is set, it will be ignored. Defaults to false if not specified.
     * Note: Enabling stealthMode consumes an additional credit/quota point (2 credits total instead of 1) for this request.
     */
    public function withStealthMode(bool $stealthMode): self
    {
        $self = clone $this;
        $self['stealthMode'] = $stealthMode;

        return $self;
    }
}
