<?php

declare(strict_types=1);

namespace APICrawlerDevSDKs\Extract\ExtractFromFileParams;

enum Format: string
{
    case TEXT = 'text';

    case MARKDOWN = 'markdown';
}
