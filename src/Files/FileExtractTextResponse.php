<?php

declare(strict_types=1);

namespace CrawlerDev\Files;

use CrawlerDev\Core\Attributes\Api;
use CrawlerDev\Core\Concerns\SdkModel;
use CrawlerDev\Core\Concerns\SdkResponse;
use CrawlerDev\Core\Contracts\BaseModel;
use CrawlerDev\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type file_extract_text_response = array{
 *   contentType?: string,
 *   extractedText?: string,
 *   filename?: string,
 *   sizeBytes?: int,
 *   success?: bool,
 *   textLength?: int,
 * }
 */
final class FileExtractTextResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<file_extract_text_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?string $contentType;

    #[Api(optional: true)]
    public ?string $extractedText;

    #[Api(optional: true)]
    public ?string $filename;

    #[Api(optional: true)]
    public ?int $sizeBytes;

    #[Api(optional: true)]
    public ?bool $success;

    #[Api(optional: true)]
    public ?int $textLength;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $contentType = null,
        ?string $extractedText = null,
        ?string $filename = null,
        ?int $sizeBytes = null,
        ?bool $success = null,
        ?int $textLength = null,
    ): self {
        $obj = new self;

        null !== $contentType && $obj->contentType = $contentType;
        null !== $extractedText && $obj->extractedText = $extractedText;
        null !== $filename && $obj->filename = $filename;
        null !== $sizeBytes && $obj->sizeBytes = $sizeBytes;
        null !== $success && $obj->success = $success;
        null !== $textLength && $obj->textLength = $textLength;

        return $obj;
    }

    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj->contentType = $contentType;

        return $obj;
    }

    public function withExtractedText(string $extractedText): self
    {
        $obj = clone $this;
        $obj->extractedText = $extractedText;

        return $obj;
    }

    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }

    public function withSizeBytes(int $sizeBytes): self
    {
        $obj = clone $this;
        $obj->sizeBytes = $sizeBytes;

        return $obj;
    }

    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj->success = $success;

        return $obj;
    }

    public function withTextLength(int $textLength): self
    {
        $obj = clone $this;
        $obj->textLength = $textLength;

        return $obj;
    }
}
