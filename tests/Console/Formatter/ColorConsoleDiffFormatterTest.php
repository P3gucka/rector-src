<?php

declare(strict_types=1);

namespace Rector\Tests\Console\Formatter;

use Iterator;
use Nette\Utils\FileSystem;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Rector\Console\Formatter\ColorConsoleDiffFormatter;

final class ColorConsoleDiffFormatterTest extends TestCase
{
    private ColorConsoleDiffFormatter $colorConsoleDiffFormatter;

    protected function setUp(): void
    {
        $this->colorConsoleDiffFormatter = new ColorConsoleDiffFormatter();
    }

    #[DataProvider('provideData')]
    public function test(string $content, string $expectedFormattedFileContent): void
    {
        $formattedContent = $this->colorConsoleDiffFormatter->format($content);
        $this->assertNotEmpty($expectedFormattedFileContent);

        $this->assertStringEqualsFile($expectedFormattedFileContent, $formattedContent);
    }

    public static function provideData(): Iterator
    {
        yield ['...', __DIR__ . '/Source/expected/expected.txt'];
        yield ["-old\n+new", __DIR__ . '/Source/expected/expected_old_new.txt'];

        yield [
            str_replace("\r\n", "\n", FileSystem::read(__DIR__ . '/Fixture/with_full_diff_by_phpunit.diff')),
            __DIR__ . '/Fixture/expected_with_full_diff_by_phpunit.diff',
        ];
    }
}
