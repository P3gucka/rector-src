<?php

namespace Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\Fixture;

class SkipForIterable
{
    public function lists(iterable $iterable)
    {
        $items = [...$iterable];
    }
}

?>
