<?php

declare(strict_types=1);

namespace CrawlerDev\URLs;

use CrawlerDev\Core\Attributes\Api;
use CrawlerDev\Core\Concerns\SdkModel;
use CrawlerDev\Core\Concerns\SdkParams;
use CrawlerDev\Core\Contracts\BaseModel;
use CrawlerDev\URLs\URLExtractTextParams\Proxy;

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
 *   url: string, cleanText?: bool, headers?: array<string, string>, proxy?: Proxy
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
     * Custom HTTP headers to send with the request (case-insensitive).
     *
     * @var array<string, string>|null $headers
     */
    #[Api(map: 'string', optional: true)]
    public ?array $headers;

    /**
     * Proxy configuration for the request.
     */
    #[Api(optional: true)]
    public ?Proxy $proxy;

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
     *
     * @param array<string, string> $headers
     */
    public static function with(
        string $url,
        ?bool $cleanText = null,
        ?array $headers = null,
        ?Proxy $proxy = null,
    ): self {
        $obj = new self;

        $obj->url = $url;

        null !== $cleanText && $obj->cleanText = $cleanText;
        null !== $headers && $obj->headers = $headers;
        null !== $proxy && $obj->proxy = $proxy;

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
     * Custom HTTP headers to send with the request (case-insensitive).
     *
     * @param array<string, string> $headers
     */
    public function withHeaders(array $headers): self
    {
        $obj = clone $this;
        $obj->headers = $headers;

        return $obj;
    }

    /**
     * Proxy configuration for the request.
     */
    public function withProxy(Proxy $proxy): self
    {
        $obj = clone $this;
        $obj->proxy = $proxy;

        return $obj;
    }
}
