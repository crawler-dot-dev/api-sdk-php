<?php

declare(strict_types=1);

namespace CrawlerDev\Services;

use CrawlerDev\Client;
use CrawlerDev\Core\Exceptions\APIException;
use CrawlerDev\Files\FileExtractTextParams;
use CrawlerDev\Files\FileExtractTextResponse;
use CrawlerDev\RequestOptions;
use CrawlerDev\ServiceContracts\FilesContract;

use const CrawlerDev\Core\OMIT as omit;

final class FilesService implements FilesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     *
     * @throws APIException
     */
    public function extractText(
        $file,
        $cleanText = omit,
        ?RequestOptions $requestOptions = null
    ): FileExtractTextResponse {
        $params = ['file' => $file, 'cleanText' => $cleanText];

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
    ): FileExtractTextResponse {
        [$parsed, $options] = FileExtractTextParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v1/files/text',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: FileExtractTextResponse::class,
        );
    }
}
