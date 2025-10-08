<?php

declare(strict_types=1);

namespace CrawlerDev\Core\Concerns;

use CrawlerDev\Core\Conversion\Contracts\Converter;
use CrawlerDev\Core\Conversion\Contracts\ConverterSource;
use CrawlerDev\Core\Conversion\UnionOf;

/**
 * @internal
 */
trait SdkUnion
{
    private static Converter $converter;

    public static function discriminator(): ?string // @phpstan-ignore-line
    {
        return null;
    }

    /**
     * @return array<string, Converter|ConverterSource|string>|list<Converter|ConverterSource|string>
     */
    public static function variants(): array
    {
        return [];
    }

    public static function converter(): Converter
    {
        if (isset(static::$converter)) {
            return static::$converter;
        }

        // @phpstan-ignore-next-line
        return static::$converter = new UnionOf(discriminator: static::discriminator(), variants: static::variants());
    }
}
