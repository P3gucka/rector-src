<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Tests\Transform\Rector\StaticCall\StaticCallToMethodCallRector\Source\TargetFileSystem;
use Rector\Transform\Rector\StaticCall\StaticCallToMethodCallRector;
use Rector\Transform\ValueObject\StaticCallToMethodCall;
use Rector\ValueObject\PhpVersionFeature;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->phpVersion(PhpVersionFeature::PROPERTY_PROMOTION);

    $rectorConfig
        ->ruleWithConfiguration(StaticCallToMethodCallRector::class, [
            new StaticCallToMethodCall('Nette\Utils\FileSystem', 'write', TargetFileSystem::class, 'dumpFile'),
            new StaticCallToMethodCall(
                'Illuminate\Support\Facades\Response',
                '*',
                'Illuminate\Contracts\Routing\ResponseFactory',
                '*'
            ),
            new StaticCallToMethodCall(
                'Illuminate\Support\Facades\App',
                '*',
                'Illuminate\Foundation\Application',
                '*'
            ),
        ]);
};
