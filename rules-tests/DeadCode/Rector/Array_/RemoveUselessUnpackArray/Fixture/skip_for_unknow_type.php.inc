<?php

namespace Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\Fixture;

class SkipForUnknownType
{
    public function lists($iterable)
    {
        $items = [...$iterable];
    }
}

?>
