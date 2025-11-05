<?php

declare(strict_types=1);

namespace CrawlerDev\ServiceContracts;

use CrawlerDev\Core\Exceptions\APIException;
use CrawlerDev\Files\FileExtractTextResponse;
use CrawlerDev\RequestOptions;

use const CrawlerDev\Core\OMIT as omit;

interface FilesContract
{
    /**
     * @api
     *
     * @param string $file the file to upload
     * @param bool $cleanText Whether to clean and normalize the extracted text. When enabled (true):
     * - For HTML content: Removes script, style, and other non-text elements before extraction
     * - Normalizes whitespace (collapses multiple spaces/tabs, normalizes newlines)
     * - Removes empty lines and trims leading/trailing whitespace
     * - Normalizes Unicode characters (NFC)
     * - For JSON content: Only minimal cleaning to preserve structure
     * When disabled (false): Returns raw extracted text without any processing.
     *
     * @throws APIException
     */
    public function extractText(
        $file,
        $cleanText = omit,
        ?RequestOptions $requestOptions = null
    ): FileExtractTextResponse;

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
    ): FileExtractTextResponse;
}
