<?php

namespace Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\Fixture;

class RemoveFromArguments
{
    public function lists(array $array)
    {
        $this->doSome([...$array]);
    }

    private function doSome(array $items): void
    {
        // do some
    }
}

?>
-----
<?php

namespace Rector\Tests\DeadCode\Rector\Array_\RemoveUselessUnpackArray\Fixture;

class RemoveFromArguments
{
    public function lists(array $array)
    {
        $this->doSome($array);
    }

    private function doSome(array $items): void
    {
        // do some
    }
}

?>
