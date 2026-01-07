<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Services;

use APICrawlerDevSDKs\Client;
use APICrawlerDevSDKs\Core\Contracts\BaseResponse;
use APICrawlerDevSDKs\Core\Exceptions\APIException;
use APICrawlerDevSDKs\Extract\ExtractFromFileParams;
use APICrawlerDevSDKs\Extract\ExtractFromFileParams\Format;
use APICrawlerDevSDKs\Extract\ExtractFromFileResponse;
use APICrawlerDevSDKs\Extract\ExtractFromURLParams;
use APICrawlerDevSDKs\Extract\ExtractFromURLParams\Proxy;
use APICrawlerDevSDKs\Extract\ExtractFromURLResponse;
use APICrawlerDevSDKs\RequestOptions;
use APICrawlerDevSDKs\ServiceContracts\ExtractRawContract;

/**
 * @phpstan-import-type MaxTimeoutShape from \APICrawlerDevSDKs\Extract\ExtractFromFileParams\MaxTimeout
 * @phpstan-import-type CacheAgeShape from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\CacheAge
 * @phpstan-import-type MaxSizeShape from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\MaxSize
 * @phpstan-import-type MaxTimeoutShape from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\MaxTimeout as MaxTimeoutShape1
 * @phpstan-import-type ProxyShape from \APICrawlerDevSDKs\Extract\ExtractFromURLParams\Proxy
 * @phpstan-import-type RequestOpts from \APICrawlerDevSDKs\RequestOptions
 */
final class ExtractRawService implements ExtractRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Upload a file and extract text content from it. Supports PDF, DOC, DOCX, TXT and other text-extractable document formats.
     *
     * @param array{
     *   file: string,
     *   cleanText?: bool,
     *   formats?: list<Format|value-of<Format>>,
     *   maxTimeout?: MaxTimeoutShape,
     * }|ExtractFromFileParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExtractFromFileResponse>
     *
     * @throws APIException
     */
    public function fromFile(
        array|ExtractFromFileParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExtractFromFileParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v1/extract/file',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: ExtractFromFileResponse::class,
        );
    }

    /**
     * @api
     *
     * Extract text content from a webpage or document accessible via URL. Supports HTML, PDF, and other web-accessible content types.
     *
     * @param array{
     *   url: string,
     *   cacheAge?: CacheAgeShape,
     *   cleanText?: bool,
     *   formats?: list<ExtractFromURLParams\Format|value-of<ExtractFromURLParams\Format>>,
     *   headers?: array<string,string>,
     *   maxRedirects?: int,
     *   maxSize?: MaxSizeShape,
     *   maxTimeout?: MaxTimeoutShape1,
     *   proxy?: Proxy|ProxyShape,
     *   stealthMode?: bool,
     * }|ExtractFromURLParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExtractFromURLResponse>
     *
     * @throws APIException
     */
    public function fromURL(
        array|ExtractFromURLParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExtractFromURLParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v1/extract/url',
            body: (object) $parsed,
            options: $options,
            convert: ExtractFromURLResponse::class,
        );
    }
}
