<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Extract;

use APICrawlerDevSDKs\Core\Attributes\Optional;
use APICrawlerDevSDKs\Core\Concerns\SdkModel;
use APICrawlerDevSDKs\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExtractFromURLResponseShape = array{
 *   contentType?: string|null,
 *   finalURL?: string|null,
 *   markdown?: string|null,
 *   size?: int|null,
 *   statusCode?: int|null,
 *   text?: string|null,
 *   url?: string|null,
 * }
 */
final class ExtractFromURLResponse implements BaseModel
{
    /** @use SdkModel<ExtractFromURLResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $contentType;

    #[Optional('finalUrl')]
    public ?string $finalURL;

    /**
     * Markdown representation (included when 'markdown' is in formats array, empty string for non-HTML content).
     */
    #[Optional]
    public ?string $markdown;

    /**
     * The size of the entity in bytes.
     */
    #[Optional]
    public ?int $size;

    #[Optional]
    public ?int $statusCode;

    /**
     * Extracted plain text (included when 'text' is in formats array).
     */
    #[Optional]
    public ?string $text;

    #[Optional]
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
        ?string $finalURL = null,
        ?string $markdown = null,
        ?int $size = null,
        ?int $statusCode = null,
        ?string $text = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $contentType && $self['contentType'] = $contentType;
        null !== $finalURL && $self['finalURL'] = $finalURL;
        null !== $markdown && $self['markdown'] = $markdown;
        null !== $size && $self['size'] = $size;
        null !== $statusCode && $self['statusCode'] = $statusCode;
        null !== $text && $self['text'] = $text;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    public function withFinalURL(string $finalURL): self
    {
        $self = clone $this;
        $self['finalURL'] = $finalURL;

        return $self;
    }

    /**
     * Markdown representation (included when 'markdown' is in formats array, empty string for non-HTML content).
     */
    public function withMarkdown(string $markdown): self
    {
        $self = clone $this;
        $self['markdown'] = $markdown;

        return $self;
    }

    /**
     * The size of the entity in bytes.
     */
    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    public function withStatusCode(int $statusCode): self
    {
        $self = clone $this;
        $self['statusCode'] = $statusCode;

        return $self;
    }

    /**
     * Extracted plain text (included when 'text' is in formats array).
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
