<?php

declare(strict_types=1);

namespace Rector\DeadCode\Rector\Array_;

use PhpParser\Node;
use PhpParser\Node\Expr\Array_;
use Rector\NodeTypeResolver\TypeAnalyzer\ArrayTypeAnalyzer;
use Rector\Rector\AbstractRector;
use Rector\ValueObject\PhpVersionFeature;
use Rector\VersionBonding\Contract\MinPhpVersionInterface;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\RemoveUselessUnpackArrayTest
 */
final class RemoveUselessUnpackArray extends AbstractRector implements MinPhpVersionInterface
{
    public function __construct(
        private readonly ArrayTypeAnalyzer $arrayTypeAnalyzer,
    ) {
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition('Remove useless unpack array.', [
            new CodeSample(
                <<<'CODE_SAMPLE'
$result = [...$items];
CODE_SAMPLE
                ,
                <<<'CODE_SAMPLE'
$result = $items;
CODE_SAMPLE
            ),
        ]);
    }

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [Array_::class];
    }

    /**
     * @param Array_ $node
     */
    public function refactor(Node $node): ?Node
    {
        if (count($node->items) !== 1) {
            return null;
        }

        $item = $node->items[0];

        return $item->unpack && $this->arrayTypeAnalyzer->isArrayType($item->value)
            ? $item->value
            : null;
    }

    public function provideMinPhpVersion(): int
    {
        return PhpVersionFeature::ARRAY_SPREAD;
    }
}
