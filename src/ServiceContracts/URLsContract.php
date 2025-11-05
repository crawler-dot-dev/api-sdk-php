<?php

declare(strict_types=1);

namespace CrawlerDev\ServiceContracts;

use CrawlerDev\Core\Exceptions\APIException;
use CrawlerDev\RequestOptions;
use CrawlerDev\URLs\URLExtractTextParams\Proxy;
use CrawlerDev\URLs\URLExtractTextResponse;

use const CrawlerDev\Core\OMIT as omit;

interface URLsContract
{
    /**
     * @api
     *
     * @param string $url the URL to extract text from
     * @param int $cacheAge Maximum cache time in milliseconds for the webpage. Must be between 0 (no caching) and 259200000 (3 days). Defaults to 172800000 (2 days) if not specified.
     * @param bool $cleanText Whether to clean extracted text
     * @param array<string,
     * string,> $headers Custom HTTP headers to send with the request (case-insensitive)
     * @param int $maxRedirects Maximum number of redirects to follow when fetching the URL. Must be between 0 (no redirects) and 20. Defaults to 5 if not specified.
     * @param int $maxSize Maximum content length in bytes for the URL response. Must be between 1024 (1KB) and 52428800 (50MB). Defaults to 10485760 (10MB) if not specified.
     * @param int $maxTimeout Maximum time in milliseconds before the crawler gives up on loading a URL. Must be between 1000 (1 second) and 30000 (30 seconds). Defaults to 10000 (10 seconds) if not specified.
     * @param Proxy $proxy Proxy configuration for the request
     * @param bool $stealthMode When enabled, we use a proxy for the request. If set to true, and the 'proxy' option is set, it will be ignored. Defaults to false if not specified.
     * Note: Enabling stealth_mode consumes an additional credit/quota point (2 credits total instead of 1) for this request.
     *
     * @throws APIException
     */
    public function extractText(
        $url,
        $cacheAge = omit,
        $cleanText = omit,
        $headers = omit,
        $maxRedirects = omit,
        $maxSize = omit,
        $maxTimeout = omit,
        $proxy = omit,
        $stealthMode = omit,
        ?RequestOptions $requestOptions = null,
    ): URLExtractTextResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function extractTextRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): URLExtractTextResponse;
}
