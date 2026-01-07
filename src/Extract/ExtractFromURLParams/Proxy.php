<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Extract\ExtractFromURLParams;

use APICrawlerDevSDKs\Core\Attributes\Optional;
use APICrawlerDevSDKs\Core\Concerns\SdkModel;
use APICrawlerDevSDKs\Core\Contracts\BaseModel;

/**
 * Proxy configuration for the request.
 *
 * @phpstan-type ProxyShape = array{
 *   password?: string|null, server?: string|null, username?: string|null
 * }
 */
final class Proxy implements BaseModel
{
    /** @use SdkModel<ProxyShape> */
    use SdkModel;

    /**
     * Proxy password for authentication.
     */
    #[Optional]
    public ?string $password;

    /**
     * Proxy server URL (e.g., http://proxy.example.com:8080 or socks5://proxy.example.com:1080).
     */
    #[Optional]
    public ?string $server;

    /**
     * Proxy username for authentication.
     */
    #[Optional]
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
        $self = new self;

        null !== $password && $self['password'] = $password;
        null !== $server && $self['server'] = $server;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    /**
     * Proxy password for authentication.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * Proxy server URL (e.g., http://proxy.example.com:8080 or socks5://proxy.example.com:1080).
     */
    public function withServer(string $server): self
    {
        $self = clone $this;
        $self['server'] = $server;

        return $self;
    }

    /**
     * Proxy username for authentication.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
