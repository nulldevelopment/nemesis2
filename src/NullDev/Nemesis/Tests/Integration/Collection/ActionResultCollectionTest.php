<?php
namespace NullDev\Nemesis\Tests\Integration\Collection;

use NullDev\Nemesis\Collection\ActionResultCollection;
use NullDev\Nemesis\Item\ActionResultItem;

/**
 *
 */
class ActionResultCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ActionResultCollection
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new ActionResultCollection([]);
    }

    /**
     * @covers NullDev\Nemesis\Collection\ActionResultCollection::addItem
     */
    public function testAddItem()
    {
        $item   = new ActionResultItem();
        $result = $this->object->addItem($item);

        $this->assertTrue($result);
    }
}
