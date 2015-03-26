<?php
namespace NullDev\Nemesis\Tests\Unit\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaDataCollection;
use Mockery as m;

/**
 *
 */
class SourceMetaDataCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testAdd()
    {
        $obj = new SourceMetaDataCollection([]);

        $mockItem = m::mock('NullDev\Nemesis\SourceMeta\SourceMetaData');
        $result   = $obj->add($mockItem);

        $this->assertTrue($result);
    }

    /**
     *
     */
    public function testAddWrongClassSent()
    {
        $this->setExpectedException('\Exception');

        $obj = new SourceMetaDataCollection([]);

        $mockItem = m::mock();
        $obj->add($mockItem);
    }
}
