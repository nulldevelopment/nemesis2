<?php
namespace NullDev\Nemesis\Tests\Integration\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaDataCollection;
use stdClass;

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
        $this->markTestIncomplete('TODO');
    }
}
