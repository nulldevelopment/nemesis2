<?php
namespace NullDev\Nemesis\Tests\Integration\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaData;
use NullDev\Nemesis\SourceMeta\SourceMetaDataCollection;

/**
 *
 */
class SourceMetaDataCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SourceMetaDataCollection
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $elements = [];

        $this->object = new SourceMetaDataCollection($elements);
    }

    /**
     *
     */
    public function testAdd()
    {
        $this->assertEquals(0, $this->getCount());

        $item = new SourceMetaData();

        $this->object->add($item);

        $this->assertEquals(1, $this->getCount());
    }
}
