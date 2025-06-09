<?php

namespace Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\Fixture;

class SkipWithoutUnpackArray
{
    public function lists($iterable)
    {
        $items = [$iterable];
    }
}

?>
