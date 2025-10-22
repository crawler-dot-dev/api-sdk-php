<?php

declare(strict_types=1);

namespace CrawlerDev\Files;

use CrawlerDev\Core\Attributes\Api;
use CrawlerDev\Core\Concerns\SdkModel;
use CrawlerDev\Core\Concerns\SdkParams;
use CrawlerDev\Core\Contracts\BaseModel;

/**
 * Upload a file and extract text content from it. Supports PDF, DOC, DOCX, TXT and other text-extractable document formats.
 *
 * @see CrawlerDev\Files->extractText
 *
 * @phpstan-type file_extract_text_params = array{file: string, cleanText?: bool}
 */
final class FileExtractTextParams implements BaseModel
{
    /** @use SdkModel<file_extract_text_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The file to upload.
     */
    #[Api]
    public string $file;

    /**
     * Whether to clean the extracted text.
     */
    #[Api('clean_text', optional: true)]
    public ?bool $cleanText;

    /**
     * `new FileExtractTextParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FileExtractTextParams::with(file: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FileExtractTextParams)->withFile(...)
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
     */
    public static function with(string $file, ?bool $cleanText = null): self
    {
        $obj = new self;

        $obj->file = $file;

        null !== $cleanText && $obj->cleanText = $cleanText;

        return $obj;
    }

    /**
     * The file to upload.
     */
    public function withFile(string $file): self
    {
        $obj = clone $this;
        $obj->file = $file;

        return $obj;
    }

    /**
     * Whether to clean the extracted text.
     */
    public function withCleanText(bool $cleanText): self
    {
        $obj = clone $this;
        $obj->cleanText = $cleanText;

        return $obj;
    }
}
