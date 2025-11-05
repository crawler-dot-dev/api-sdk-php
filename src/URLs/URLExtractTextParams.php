<?php

declare(strict_types=1);

namespace CrawlerDev\URLs;

use CrawlerDev\Core\Attributes\Api;
use CrawlerDev\Core\Concerns\SdkModel;
use CrawlerDev\Core\Concerns\SdkParams;
use CrawlerDev\Core\Contracts\BaseModel;
use CrawlerDev\URLs\URLExtractTextParams\Proxy;

/**
 * Extract text content from a webpage or document accessible via URL. Supports HTML, PDF, and other web-accessible content types.
 *
 * @see CrawlerDev\URLs->extractText
 *
 * @phpstan-type URLExtractTextParamsShape = array{
 *   url: string,
 *   cacheAge?: int,
 *   cleanText?: bool,
 *   headers?: array<string, string>,
 *   maxRedirects?: int,
 *   maxSize?: int,
 *   maxTimeout?: int,
 *   proxy?: Proxy,
 *   stealthMode?: bool,
 * }
 */
final class URLExtractTextParams implements BaseModel
{
    /** @use SdkModel<URLExtractTextParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL to extract text from.
     */
    #[Api]
    public string $url;

    /**
     * Maximum cache time in milliseconds for the webpage. Must be between 0 (no caching) and 259200000 (3 days). Defaults to 172800000 (2 days) if not specified.
     */
    #[Api('cache_age', optional: true)]
    public ?int $cacheAge;

    /**
     * Whether to clean extracted text.
     */
    #[Api('clean_text', optional: true)]
    public ?bool $cleanText;

    /**
     * Custom HTTP headers to send with the request (case-insensitive).
     *
     * @var array<string, string>|null $headers
     */
    #[Api(map: 'string', optional: true)]
    public ?array $headers;

    /**
     * Maximum number of redirects to follow when fetching the URL. Must be between 0 (no redirects) and 20. Defaults to 5 if not specified.
     */
    #[Api('max_redirects', optional: true)]
    public ?int $maxRedirects;

    /**
     * Maximum content length in bytes for the URL response. Must be between 1024 (1KB) and 52428800 (50MB). Defaults to 10485760 (10MB) if not specified.
     */
    #[Api('max_size', optional: true)]
    public ?int $maxSize;

    /**
     * Maximum time in milliseconds before the crawler gives up on loading a URL. Must be between 1000 (1 second) and 30000 (30 seconds). Defaults to 10000 (10 seconds) if not specified.
     */
    #[Api('max_timeout', optional: true)]
    public ?int $maxTimeout;

    /**
     * Proxy configuration for the request.
     */
    #[Api(optional: true)]
    public ?Proxy $proxy;

    /**
     * When enabled, we use a proxy for the request. If set to true, and the 'proxy' option is set, it will be ignored. Defaults to false if not specified.
     * Note: Enabling stealth_mode consumes an additional credit/quota point (2 credits total instead of 1) for this request.
     */
    #[Api('stealth_mode', optional: true)]
    public ?bool $stealthMode;

    /**
     * `new URLExtractTextParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * URLExtractTextParams::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new URLExtractTextParams)->withURL(...)
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
     * @param array<string, string> $headers
     */
    public static function with(
        string $url,
        ?int $cacheAge = null,
        ?bool $cleanText = null,
        ?array $headers = null,
        ?int $maxRedirects = null,
        ?int $maxSize = null,
        ?int $maxTimeout = null,
        ?Proxy $proxy = null,
        ?bool $stealthMode = null,
    ): self {
        $obj = new self;

        $obj->url = $url;

        null !== $cacheAge && $obj->cacheAge = $cacheAge;
        null !== $cleanText && $obj->cleanText = $cleanText;
        null !== $headers && $obj->headers = $headers;
        null !== $maxRedirects && $obj->maxRedirects = $maxRedirects;
        null !== $maxSize && $obj->maxSize = $maxSize;
        null !== $maxTimeout && $obj->maxTimeout = $maxTimeout;
        null !== $proxy && $obj->proxy = $proxy;
        null !== $stealthMode && $obj->stealthMode = $stealthMode;

        return $obj;
    }

    /**
     * The URL to extract text from.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * Maximum cache time in milliseconds for the webpage. Must be between 0 (no caching) and 259200000 (3 days). Defaults to 172800000 (2 days) if not specified.
     */
    public function withCacheAge(int $cacheAge): self
    {
        $obj = clone $this;
        $obj->cacheAge = $cacheAge;

        return $obj;
    }

    /**
     * Whether to clean extracted text.
     */
    public function withCleanText(bool $cleanText): self
    {
        $obj = clone $this;
        $obj->cleanText = $cleanText;

        return $obj;
    }

    /**
     * Custom HTTP headers to send with the request (case-insensitive).
     *
     * @param array<string, string> $headers
     */
    public function withHeaders(array $headers): self
    {
        $obj = clone $this;
        $obj->headers = $headers;

        return $obj;
    }

    /**
     * Maximum number of redirects to follow when fetching the URL. Must be between 0 (no redirects) and 20. Defaults to 5 if not specified.
     */
    public function withMaxRedirects(int $maxRedirects): self
    {
        $obj = clone $this;
        $obj->maxRedirects = $maxRedirects;

        return $obj;
    }

    /**
     * Maximum content length in bytes for the URL response. Must be between 1024 (1KB) and 52428800 (50MB). Defaults to 10485760 (10MB) if not specified.
     */
    public function withMaxSize(int $maxSize): self
    {
        $obj = clone $this;
        $obj->maxSize = $maxSize;

        return $obj;
    }

    /**
     * Maximum time in milliseconds before the crawler gives up on loading a URL. Must be between 1000 (1 second) and 30000 (30 seconds). Defaults to 10000 (10 seconds) if not specified.
     */
    public function withMaxTimeout(int $maxTimeout): self
    {
        $obj = clone $this;
        $obj->maxTimeout = $maxTimeout;

        return $obj;
    }

    /**
     * Proxy configuration for the request.
     */
    public function withProxy(Proxy $proxy): self
    {
        $obj = clone $this;
        $obj->proxy = $proxy;

        return $obj;
    }

    /**
     * When enabled, we use a proxy for the request. If set to true, and the 'proxy' option is set, it will be ignored. Defaults to false if not specified.
     * Note: Enabling stealth_mode consumes an additional credit/quota point (2 credits total instead of 1) for this request.
     */
    public function withStealthMode(bool $stealthMode): self
    {
        $obj = clone $this;
        $obj->stealthMode = $stealthMode;

        return $obj;
    }
}
