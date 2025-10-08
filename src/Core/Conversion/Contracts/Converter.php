<?php

declare(strict_types=1);

namespace CrawlerDev\Core\Conversion\Contracts;

use CrawlerDev\Core\Conversion\CoerceState;
use CrawlerDev\Core\Conversion\DumpState;

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
