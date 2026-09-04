<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Extract;

use APICrawlerDevSDKs\Core\Attributes\Optional;
use APICrawlerDevSDKs\Core\Concerns\SdkModel;
use APICrawlerDevSDKs\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExtractFromFileResponseShape = array{
 *   contentType?: string|null,
 *   filename?: string|null,
 *   markdown?: string|null,
 *   size?: int|null,
 *   text?: string|null,
 * }
 */
final class ExtractFromFileResponse implements BaseModel
{
    /** @use SdkModel<ExtractFromFileResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $contentType;

    #[Optional]
    public ?string $filename;

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

    /**
     * Extracted plain text (included when 'text' is in formats array).
     */
    #[Optional]
    public ?string $text;

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
        ?string $filename = null,
        ?string $markdown = null,
        ?int $size = null,
        ?string $text = null,
    ): self {
        $self = new self;

        null !== $contentType && $self['contentType'] = $contentType;
        null !== $filename && $self['filename'] = $filename;
        null !== $markdown && $self['markdown'] = $markdown;
        null !== $size && $self['size'] = $size;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

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

    /**
     * Extracted plain text (included when 'text' is in formats array).
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
