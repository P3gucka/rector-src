<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\Array_\RemoveUselessUnpackArray;

return RectorConfig::configure()
    ->withRules([RemoveUselessUnpackArray::class]);
