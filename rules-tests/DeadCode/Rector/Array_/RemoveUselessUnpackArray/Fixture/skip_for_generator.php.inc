<?php

namespace Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\Fixture;

class SkipForGenerator
{
    public function lists()
    {
        $items = [...(function () { yield 1; })()];
    }
}

?>
