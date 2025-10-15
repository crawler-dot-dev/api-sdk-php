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
     * @param bool $cleanText Whether to clean extracted text
     * @param array<string,
     * string,> $headers Custom HTTP headers to send with the request (case-insensitive)
     * @param Proxy $proxy Proxy configuration for the request
     *
     * @throws APIException
     */
    public function extractText(
        $url,
        $cleanText = omit,
        $headers = omit,
        $proxy = omit,
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
