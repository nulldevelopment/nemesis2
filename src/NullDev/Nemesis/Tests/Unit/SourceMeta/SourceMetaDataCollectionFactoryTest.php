<?php
namespace NullDev\Nemesis\Tests\Unit\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionFactory;
use Mockery as m;

/**
 *
 */
class SourceMetaDataCollectionFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SourceMetaDataCollectionFactory
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new SourceMetaDataCollectionFactory();
    }

    /**
     *
     */
    public function testCreate()
    {
        $result = $this->object->create();

        $this->assertInstanceOf('NullDev\Nemesis\SourceMeta\SourceMetaDataCollection', $result);
    }
}
