<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Core\Contracts;

use APICrawlerDevSDKs\Core\Conversion\Contracts\ConverterSource;

/**
 * @internal
 *
 * @extends \ArrayAccess<string, mixed>
 */
interface BaseModel extends \ArrayAccess, \JsonSerializable, \Stringable, ConverterSource
{
    /** @return array<string, mixed> */
    public function toProperties(): array;
}
