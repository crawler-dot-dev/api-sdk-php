<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\ServiceContracts;

use APICrawlerDevSDKs\Core\Contracts\BaseResponse;
use APICrawlerDevSDKs\Core\Exceptions\APIException;
use APICrawlerDevSDKs\Extract\ExtractFromFileParams;
use APICrawlerDevSDKs\Extract\ExtractFromFileResponse;
use APICrawlerDevSDKs\Extract\ExtractFromURLParams;
use APICrawlerDevSDKs\Extract\ExtractFromURLResponse;
use APICrawlerDevSDKs\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \APICrawlerDevSDKs\RequestOptions
 */
interface ExtractRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ExtractFromFileParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExtractFromFileResponse>
     *
     * @throws APIException
     */
    public function fromFile(
        array|ExtractFromFileParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ExtractFromURLParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExtractFromURLResponse>
     *
     * @throws APIException
     */
    public function fromURL(
        array|ExtractFromURLParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
