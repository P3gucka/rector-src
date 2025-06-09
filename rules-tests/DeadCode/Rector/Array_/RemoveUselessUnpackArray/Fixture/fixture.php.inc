<?php

namespace Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\Fixture;

class Fixture
{
    public function lists(array $array)
    {
        $items = [...$array];
    }
}

?>
-----
<?php

namespace Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\Fixture;

class Fixture
{
    public function lists(array $array)
    {
        $items = $array;
    }
}

?>
