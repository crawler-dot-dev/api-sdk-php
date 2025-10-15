<?php

declare(strict_types=1);

namespace CrawlerDev\URLs;

use CrawlerDev\Core\Attributes\Api;
use CrawlerDev\Core\Concerns\SdkModel;
use CrawlerDev\Core\Concerns\SdkResponse;
use CrawlerDev\Core\Contracts\BaseModel;
use CrawlerDev\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type url_extract_text_response = array{
 *   contentType?: string,
 *   extractedText?: string,
 *   finalURL?: string,
 *   sizeBytes?: int,
 *   statusCode?: int,
 *   textLength?: int,
 *   url?: string,
 * }
 */
final class URLExtractTextResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<url_extract_text_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?string $contentType;

    #[Api(optional: true)]
    public ?string $extractedText;

    #[Api('finalUrl', optional: true)]
    public ?string $finalURL;

    #[Api(optional: true)]
    public ?int $sizeBytes;

    #[Api(optional: true)]
    public ?int $statusCode;

    #[Api(optional: true)]
    public ?int $textLength;

    #[Api(optional: true)]
    public ?string $url;

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
        ?string $finalURL = null,
        ?int $sizeBytes = null,
        ?int $statusCode = null,
        ?int $textLength = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $contentType && $obj->contentType = $contentType;
        null !== $extractedText && $obj->extractedText = $extractedText;
        null !== $finalURL && $obj->finalURL = $finalURL;
        null !== $sizeBytes && $obj->sizeBytes = $sizeBytes;
        null !== $statusCode && $obj->statusCode = $statusCode;
        null !== $textLength && $obj->textLength = $textLength;
        null !== $url && $obj->url = $url;

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

    public function withFinalURL(string $finalURL): self
    {
        $obj = clone $this;
        $obj->finalURL = $finalURL;

        return $obj;
    }

    public function withSizeBytes(int $sizeBytes): self
    {
        $obj = clone $this;
        $obj->sizeBytes = $sizeBytes;

        return $obj;
    }

    public function withStatusCode(int $statusCode): self
    {
        $obj = clone $this;
        $obj->statusCode = $statusCode;

        return $obj;
    }

    public function withTextLength(int $textLength): self
    {
        $obj = clone $this;
        $obj->textLength = $textLength;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
