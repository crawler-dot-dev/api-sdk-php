<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Extract;

use APICrawlerDevSDKs\Core\Attributes\Optional;
use APICrawlerDevSDKs\Core\Attributes\Required;
use APICrawlerDevSDKs\Core\Concerns\SdkModel;
use APICrawlerDevSDKs\Core\Concerns\SdkParams;
use APICrawlerDevSDKs\Core\Contracts\BaseModel;
use APICrawlerDevSDKs\Core\FileParam;
use APICrawlerDevSDKs\Extract\ExtractFromFileParams\Format;

/**
 * Upload a file and extract text content from it. Supports PDF, DOC, DOCX, TXT and other text-extractable document formats.
 *
 * @see APICrawlerDevSDKs\Services\ExtractService::fromFile()
 *
 * @phpstan-import-type MaxTimeoutVariants from \APICrawlerDevSDKs\Extract\ExtractFromFileParams\MaxTimeout
 * @phpstan-import-type MaxTimeoutShape from \APICrawlerDevSDKs\Extract\ExtractFromFileParams\MaxTimeout
 *
 * @phpstan-type ExtractFromFileParamsShape = array{
 *   file: string|FileParam,
 *   cleanText?: bool|null,
 *   formats?: list<Format|value-of<Format>>|null,
 *   maxTimeout?: MaxTimeoutShape|null,
 * }
 */
final class ExtractFromFileParams implements BaseModel
{
    /** @use SdkModel<ExtractFromFileParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The file to upload.
     */
    #[Required]
    public string $file;

    /**
     * Whether to clean and normalize the extracted text. When enabled (true):
     * - For HTML content: Removes script, style, and other non-text elements before extraction
     * - Normalizes whitespace (collapses multiple spaces/tabs, normalizes newlines)
     * - Removes empty lines and trims leading/trailing whitespace
     * - Normalizes Unicode characters (NFC)
     * - For JSON content: Only minimal cleaning to preserve structure
     * When disabled (false): Returns raw extracted text without any processing.
     */
    #[Optional]
    public ?bool $cleanText;

    /**
     * Array of output formats to include in the response. Options: 'text', 'markdown'.
     * - 'text': Extracted plain text (always available)
     * - 'markdown': Markdown representation (only available for HTML content, empty string otherwise)
     * Defaults to ['text'] if not specified.
     *
     * @var list<value-of<Format>>|null $formats
     */
    #[Optional(list: Format::class)]
    public ?array $formats;

    /**
     * Maximum time before the file extraction gives up. Accepts either:
     * - Integer: milliseconds (e.g., 30000 for 30 seconds)
     * - String: time format with unit (e.g., "1s", "5h", "3m", "4.4h")
     * Supported units: s (seconds), m (minutes), h (hours), d (days), ms (milliseconds)
     * Must be between 5 seconds and 2 minutes. Defaults to "30s" (30 seconds) if not specified.
     * This controls the timeout for Tika extraction operations on uploaded files.
     *
     * @var MaxTimeoutVariants|null $maxTimeout
     */
    #[Optional]
    public int|string|null $maxTimeout;

    /**
     * `new ExtractFromFileParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExtractFromFileParams::with(file: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExtractFromFileParams)->withFile(...)
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
     *
     * @param list<Format|value-of<Format>>|null $formats
     * @param MaxTimeoutShape|null $maxTimeout
     */
    public static function with(
        string|FileParam $file,
        ?bool $cleanText = null,
        ?array $formats = null,
        int|string|null $maxTimeout = null,
    ): self {
        $self = new self;

        $self['file'] = $file;

        null !== $cleanText && $self['cleanText'] = $cleanText;
        null !== $formats && $self['formats'] = $formats;
        null !== $maxTimeout && $self['maxTimeout'] = $maxTimeout;

        return $self;
    }

    /**
     * The file to upload.
     */
    public function withFile(string|FileParam $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    /**
     * Whether to clean and normalize the extracted text. When enabled (true):
     * - For HTML content: Removes script, style, and other non-text elements before extraction
     * - Normalizes whitespace (collapses multiple spaces/tabs, normalizes newlines)
     * - Removes empty lines and trims leading/trailing whitespace
     * - Normalizes Unicode characters (NFC)
     * - For JSON content: Only minimal cleaning to preserve structure
     * When disabled (false): Returns raw extracted text without any processing.
     */
    public function withCleanText(bool $cleanText): self
    {
        $self = clone $this;
        $self['cleanText'] = $cleanText;

        return $self;
    }

    /**
     * Array of output formats to include in the response. Options: 'text', 'markdown'.
     * - 'text': Extracted plain text (always available)
     * - 'markdown': Markdown representation (only available for HTML content, empty string otherwise)
     * Defaults to ['text'] if not specified.
     *
     * @param list<Format|value-of<Format>> $formats
     */
    public function withFormats(array $formats): self
    {
        $self = clone $this;
        $self['formats'] = $formats;

        return $self;
    }

    /**
     * Maximum time before the file extraction gives up. Accepts either:
     * - Integer: milliseconds (e.g., 30000 for 30 seconds)
     * - String: time format with unit (e.g., "1s", "5h", "3m", "4.4h")
     * Supported units: s (seconds), m (minutes), h (hours), d (days), ms (milliseconds)
     * Must be between 5 seconds and 2 minutes. Defaults to "30s" (30 seconds) if not specified.
     * This controls the timeout for Tika extraction operations on uploaded files.
     *
     * @param MaxTimeoutShape $maxTimeout
     */
    public function withMaxTimeout(int|string $maxTimeout): self
    {
        $self = clone $this;
        $self['maxTimeout'] = $maxTimeout;

        return $self;
    }
}
