<?php

declare(strict_types=1);

namespace CrawlerDev;

use CrawlerDev\Core\BaseClient;
use CrawlerDev\Services\FilesService;
use CrawlerDev\Services\URLsService;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;

class Client extends BaseClient
{
    public string $apiKey;

    /**
     * @api
     */
    public FilesService $files;

    /**
     * @api
     */
    public URLsService $urls;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('CRAWLER_DEV_API_KEY'));

        $baseUrl ??= getenv('CRAWLER_DEV_BASE_URL') ?: 'https://api.crawler.dev';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $baseUrl,
            options: $options,
        );

        $this->files = new FilesService($this);
        $this->urls = new URLsService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        return ['x-api-key' => $this->apiKey];
    }
}
