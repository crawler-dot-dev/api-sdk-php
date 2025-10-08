<?php

declare(strict_types=1);

namespace CrawlerDev\ServiceContracts;

use CrawlerDev\Core\Exceptions\APIException;
use CrawlerDev\RequestOptions;
use CrawlerDev\URLs\URLExtractTextResponse;

use const CrawlerDev\Core\OMIT as omit;

interface URLsContract
{
    /**
     * @api
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
