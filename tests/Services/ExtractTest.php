<?php

namespace Tests\Services;

use APICrawlerDevSDKs\Client;
use APICrawlerDevSDKs\Core\Util;
use APICrawlerDevSDKs\Extract\ExtractFromFileResponse;
use APICrawlerDevSDKs\Extract\ExtractFromURLResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ExtractTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testFromFile(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->extract->fromFile(file: 'file');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExtractFromFileResponse::class, $result);
    }

    #[Test]
    public function testFromFileWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->extract->fromFile(
            file: 'file',
            cleanText: true,
            formats: ['text', 'markdown'],
            maxTimeout: '30s',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExtractFromFileResponse::class, $result);
    }

    #[Test]
    public function testFromURL(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->extract->fromURL(url: 'url');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExtractFromURLResponse::class, $result);
    }

    #[Test]
    public function testFromURLWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->extract->fromURL(
            url: 'url',
            cacheAge: '1d',
            cleanText: true,
            formats: ['text', 'markdown'],
            headers: [
                'User-Agent' => 'Custom Bot/1.0',
                'X-API-Key' => 'my-api-key',
                'Accept-Language' => 'en-US',
            ],
            maxRedirects: 5,
            maxSize: '8mb',
            maxTimeout: '15s',
            proxy: [
                'password' => 'password', 'server' => 'server', 'username' => 'username',
            ],
            stealthMode: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExtractFromURLResponse::class, $result);
    }
}
