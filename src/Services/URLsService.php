<?php

declare(strict_types=1);

namespace CrawlerDev\Services;

use CrawlerDev\Client;
use CrawlerDev\Core\Exceptions\APIException;
use CrawlerDev\RequestOptions;
use CrawlerDev\ServiceContracts\URLsContract;
use CrawlerDev\URLs\URLExtractTextParams;
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
     * @param bool $renderJs Whether to render JavaScript for HTML content. This parameter is ignored for binary content types (PDF, DOC, etc.) since they are not HTML.
     * @param bool $stripBoilerplate Whether to remove boilerplate text
     *
     * @throws APIException
     */
    public function extractText(
        $url,
        $cleanText = omit,
        $renderJs = omit,
        $stripBoilerplate = omit,
        ?RequestOptions $requestOptions = null,
    ): URLExtractTextResponse {
        $params = [
            'url' => $url,
            'cleanText' => $cleanText,
            'renderJs' => $renderJs,
            'stripBoilerplate' => $stripBoilerplate,
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
