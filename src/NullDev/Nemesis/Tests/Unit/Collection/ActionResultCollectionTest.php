<?php
namespace NullDev\Nemesis\Tests\Unit\Collection;

use NullDev\Nemesis\Collection\ActionResultCollection;
use Mockery as m;

/**
 *
 */
class ActionResultCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testAddItem()
    {
        $obj = new ActionResultCollection([]);

        $mockItem = m::mock('NullDev\Nemesis\Item\ActionResultItem');
        $result   = $obj->addItem($mockItem);

        $this->assertTrue($result);
    }
}
