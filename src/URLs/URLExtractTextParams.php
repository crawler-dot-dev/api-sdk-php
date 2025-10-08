<?php

declare(strict_types=1);

namespace CrawlerDev\URLs;

use CrawlerDev\Core\Attributes\Api;
use CrawlerDev\Core\Concerns\SdkModel;
use CrawlerDev\Core\Concerns\SdkParams;
use CrawlerDev\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new URLExtractTextParams); // set properties as needed
 * $client->urls->extractText(...$params->toArray());
 * ```
 * Extract text content from a webpage or document accessible via URL. Supports HTML, PDF, and other web-accessible content types.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->urls->extractText(...$params->toArray());`
 *
 * @see CrawlerDev\URLs->extractText
 *
 * @phpstan-type url_extract_text_params = array{
 *   url: string, cleanText?: bool, renderJs?: bool, stripBoilerplate?: bool
 * }
 */
final class URLExtractTextParams implements BaseModel
{
    /** @use SdkModel<url_extract_text_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL to extract text from.
     */
    #[Api]
    public string $url;

    /**
     * Whether to clean extracted text.
     */
    #[Api('clean_text', optional: true)]
    public ?bool $cleanText;

    /**
     * Whether to render JavaScript for HTML content. This parameter is ignored for binary content types (PDF, DOC, etc.) since they are not HTML.
     */
    #[Api('render_js', optional: true)]
    public ?bool $renderJs;

    /**
     * Whether to remove boilerplate text.
     */
    #[Api('strip_boilerplate', optional: true)]
    public ?bool $stripBoilerplate;

    /**
     * `new URLExtractTextParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * URLExtractTextParams::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new URLExtractTextParams)->withURL(...)
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
    public static function with(
        string $url,
        ?bool $cleanText = null,
        ?bool $renderJs = null,
        ?bool $stripBoilerplate = null,
    ): self {
        $obj = new self;

        $obj->url = $url;

        null !== $cleanText && $obj->cleanText = $cleanText;
        null !== $renderJs && $obj->renderJs = $renderJs;
        null !== $stripBoilerplate && $obj->stripBoilerplate = $stripBoilerplate;

        return $obj;
    }

    /**
     * The URL to extract text from.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * Whether to clean extracted text.
     */
    public function withCleanText(bool $cleanText): self
    {
        $obj = clone $this;
        $obj->cleanText = $cleanText;

        return $obj;
    }

    /**
     * Whether to render JavaScript for HTML content. This parameter is ignored for binary content types (PDF, DOC, etc.) since they are not HTML.
     */
    public function withRenderJs(bool $renderJs): self
    {
        $obj = clone $this;
        $obj->renderJs = $renderJs;

        return $obj;
    }

    /**
     * Whether to remove boilerplate text.
     */
    public function withStripBoilerplate(bool $stripBoilerplate): self
    {
        $obj = clone $this;
        $obj->stripBoilerplate = $stripBoilerplate;

        return $obj;
    }
}
