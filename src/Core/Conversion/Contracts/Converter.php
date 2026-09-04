<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Core\Conversion\Contracts;

use APICrawlerDevSDKs\Core\Conversion\CoerceState;
use APICrawlerDevSDKs\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
