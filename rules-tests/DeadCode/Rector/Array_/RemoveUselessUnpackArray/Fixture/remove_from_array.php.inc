<?php

namespace Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\Fixture;

class RemoveFromArray
{
    public function lists(array $array)
    {
        $items = [...['a', 'b']];
    }
}

?>
-----
<?php

namespace Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\Fixture;

class RemoveFromArray
{
    public function lists(array $array)
    {
        $items = ['a', 'b'];
    }
}

?>
