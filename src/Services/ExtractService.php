<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Services;

use APICrawlerDevSDKs\Client;
use APICrawlerDevSDKs\Core\Exceptions\APIException;
use APICrawlerDevSDKs\Core\Util;
use APICrawlerDevSDKs\Extract\ExtractFromFileParams\Format;
use APICrawlerDevSDKs\Extract\ExtractFromFileResponse;
use APICrawlerDevSDKs\Extract\ExtractFromURLParams\Proxy;
use APICrawlerDevSDKs\Extract\ExtractFromURLResponse;
use APICrawlerDevSDKs\RequestOptions;
use APICrawlerDevSDKs\ServiceContracts\ExtractContract;

/**
 * @phpstan-import-type MaxTimeoutShape from \APICrawlerDevSDKs\Extract\ExtractFromFileParams\MaxTimeout
 * @phpstan-import-type CacheAgeShape from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\CacheAge
 * @phpstan-import-type MaxSizeShape from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\MaxSize
 * @phpstan-import-type MaxTimeoutShape from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\MaxTimeout as MaxTimeoutShape1
 * @phpstan-import-type ProxyShape from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\Proxy
 * @phpstan-import-type RequestOpts from \APICrawlerDevSDKs\RequestOptions
 */
final class ExtractService implements ExtractContract
{
    /**
     * @api
     */
    public ExtractRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExtractRawService($client);
    }

    /**
     * @api
     *
     * Upload a file and extract text content from it. Supports PDF, DOC, DOCX, TXT and other text-extractable document formats.
     *
     * @param string $file the file to upload
     * @param bool $cleanText Whether to clean and normalize the extracted text. When enabled (true):
     * - For HTML content: Removes script, style, and other non-text elements before extraction
     * - Normalizes whitespace (collapses multiple spaces/tabs, normalizes newlines)
     * - Removes empty lines and trims leading/trailing whitespace
     * - Normalizes Unicode characters (NFC)
     * - For JSON content: Only minimal cleaning to preserve structure
     * When disabled (false): Returns raw extracted text without any processing.
     * @param list<Format|value-of<Format>> $formats Array of output formats to include in the response. Options: 'text', 'markdown'.
     * - 'text': Extracted plain text (always available)
     * - 'markdown': Markdown representation (only available for HTML content, empty string otherwise)
     * Defaults to ['text'] if not specified.
     * @param MaxTimeoutShape $maxTimeout Maximum time before the file extraction gives up. Accepts either:
     * - Integer: milliseconds (e.g., 30000 for 30 seconds)
     * - String: time format with unit (e.g., "1s", "5h", "3m", "4.4h")
     * Supported units: s (seconds), m (minutes), h (hours), d (days), ms (milliseconds)
     * Must be between 5 seconds and 2 minutes. Defaults to "30s" (30 seconds) if not specified.
     * This controls the timeout for Tika extraction operations on uploaded files.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function fromFile(
        string $file,
        bool $cleanText = true,
        array $formats = ['text'],
        int|string|null $maxTimeout = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExtractFromFileResponse {
        $params = Util::removeNulls(
            [
                'file' => $file,
                'cleanText' => $cleanText,
                'formats' => $formats,
                'maxTimeout' => $maxTimeout,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->fromFile(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Extract text content from a webpage or document accessible via URL. Supports HTML, PDF, and other web-accessible content types.
     *
     * @param string $url the URL to extract text from
     * @param CacheAgeShape $cacheAge Maximum acceptable age of cached content. This parameter controls how fresh cached data must be to be used.
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
     * - 0: Disable caching entirely; always fetch fresh data
     * @param bool $cleanText Whether to clean extracted text
     * @param list<\APICrawlerDevSDKs\Extract\ExtractFromURLParams\Format|value-of<\APICrawlerDevSDKs\Extract\ExtractFromURLParams\Format>> $formats Array of output formats to include in the response. Options: 'text', 'markdown'.
     * - 'text': Extracted plain text (always available)
     * - 'markdown': Markdown representation (only available for HTML content, empty string otherwise)
     * Defaults to ['text'] if not specified.
     * @param array<string,string> $headers Custom HTTP headers to send with the request (case-insensitive)
     * @param int $maxRedirects Maximum number of redirects to follow when fetching the URL. Must be between 0 (no redirects) and 20. Defaults to 5 if not specified.
     * @param MaxSizeShape $maxSize Maximum content length for the URL response. Accepts either:
     * - Integer: bytes (e.g., 8388608 for 8MB)
     * - String: size format with unit (e.g., "1kb", "55mb", "1.2gb")
     * Supported units: b (bytes), kb (kilobytes), mb (megabytes), gb (gigabytes), tb (terabytes)
     * Must be between 1KB and 8MB. Defaults to "8mb" (8MB) if not specified.
     * @param MaxTimeoutShape1 $maxTimeout Maximum time before the crawler gives up on loading a URL. Accepts either:
     * - Integer: milliseconds (e.g., 15000 for 15 seconds)
     * - String: time format with unit (e.g., "1s", "5h", "3m", "4.4h")
     * Supported units: s (seconds), m (minutes), h (hours), d (days), ms (milliseconds)
     * Must be between 1 second and 30 seconds. Defaults to "10s" (10 seconds) if not specified.
     * @param Proxy|ProxyShape $proxy Proxy configuration for the request
     * @param bool $stealthMode When enabled, we use a proxy for the request. If set to true, and the 'proxy' option is set, it will be ignored. Defaults to false if not specified.
     * Note: Enabling stealthMode consumes an additional credit/quota point (2 credits total instead of 1) for this request.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function fromURL(
        string $url,
        int|string|null $cacheAge = null,
        bool $cleanText = true,
        array $formats = ['text'],
        ?array $headers = null,
        ?int $maxRedirects = null,
        int|string|null $maxSize = null,
        int|string|null $maxTimeout = null,
        Proxy|array|null $proxy = null,
        bool $stealthMode = false,
        RequestOptions|array|null $requestOptions = null,
    ): ExtractFromURLResponse {
        $params = Util::removeNulls(
            [
                'url' => $url,
                'cacheAge' => $cacheAge,
                'cleanText' => $cleanText,
                'formats' => $formats,
                'headers' => $headers,
                'maxRedirects' => $maxRedirects,
                'maxSize' => $maxSize,
                'maxTimeout' => $maxTimeout,
                'proxy' => $proxy,
                'stealthMode' => $stealthMode,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->fromURL(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
