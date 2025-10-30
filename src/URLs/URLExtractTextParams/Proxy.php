<?php

declare(strict_types=1);

namespace CrawlerDev\URLs\URLExtractTextParams;

use CrawlerDev\Core\Attributes\Api;
use CrawlerDev\Core\Concerns\SdkModel;
use CrawlerDev\Core\Contracts\BaseModel;

/**
 * Proxy configuration for the request.
 *
 * @phpstan-type ProxyShape = array{
 *   password?: string, server?: string, username?: string
 * }
 */
final class Proxy implements BaseModel
{
    /** @use SdkModel<ProxyShape> */
    use SdkModel;

    /**
     * Proxy password for authentication.
     */
    #[Api(optional: true)]
    public ?string $password;

    /**
     * Proxy server URL (e.g., http://proxy.example.com:8080 or socks5://proxy.example.com:1080).
     */
    #[Api(optional: true)]
    public ?string $server;

    /**
     * Proxy username for authentication.
     */
    #[Api(optional: true)]
    public ?string $username;

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
        ?string $password = null,
        ?string $server = null,
        ?string $username = null
    ): self {
        $obj = new self;

        null !== $password && $obj->password = $password;
        null !== $server && $obj->server = $server;
        null !== $username && $obj->username = $username;

        return $obj;
    }

    /**
     * Proxy password for authentication.
     */
    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj->password = $password;

        return $obj;
    }

    /**
     * Proxy server URL (e.g., http://proxy.example.com:8080 or socks5://proxy.example.com:1080).
     */
    public function withServer(string $server): self
    {
        $obj = clone $this;
        $obj->server = $server;

        return $obj;
    }

    /**
     * Proxy username for authentication.
     */
    public function withUsername(string $username): self
    {
        $obj = clone $this;
        $obj->username = $username;

        return $obj;
    }
}
