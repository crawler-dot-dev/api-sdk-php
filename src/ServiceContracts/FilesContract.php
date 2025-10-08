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
     * @param bool $cleanText Whether to clean the extracted text
     * @param bool $stripBoilerplate Whether to remove boilerplate text
     *
     * @throws APIException
     */
    public function extractText(
        $file,
        $cleanText = omit,
        $stripBoilerplate = omit,
        ?RequestOptions $requestOptions = null,
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
