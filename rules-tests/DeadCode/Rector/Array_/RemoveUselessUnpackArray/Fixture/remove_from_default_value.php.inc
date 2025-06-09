<?php

namespace Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\Fixture;

class RemoveFromDefaultValue
{
    public function lists(array $array = [...['a', 'b']])
    {
    }
}

?>
-----
<?php

namespace Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\Fixture;

class RemoveFromDefaultValue
{
    public function lists(array $array = ['a', 'b'])
    {
    }
}

?>
