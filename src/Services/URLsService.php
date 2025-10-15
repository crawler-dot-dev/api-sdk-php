<?php

declare(strict_types=1);

namespace CrawlerDev\Services;

use CrawlerDev\Client;
use CrawlerDev\Core\Exceptions\APIException;
use CrawlerDev\RequestOptions;
use CrawlerDev\ServiceContracts\URLsContract;
use CrawlerDev\URLs\URLExtractTextParams;
use CrawlerDev\URLs\URLExtractTextParams\Proxy;
use CrawlerDev\URLs\URLExtractTextResponse;

use const CrawlerDev\Core\OMIT as omit;

final class URLsService implements URLsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Extract text content from a webpage or document accessible via URL. Supports HTML, PDF, and other web-accessible content types.
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
    ): URLExtractTextResponse {
        $params = [
            'url' => $url,
            'cleanText' => $cleanText,
            'headers' => $headers,
            'proxy' => $proxy,
        ];

        return $this->extractTextRaw($params, $requestOptions);
    }

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
    ): URLExtractTextResponse {
        [$parsed, $options] = URLExtractTextParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v1/urls/text',
            body: (object) $parsed,
            options: $options,
            convert: URLExtractTextResponse::class,
        );
    }
}
