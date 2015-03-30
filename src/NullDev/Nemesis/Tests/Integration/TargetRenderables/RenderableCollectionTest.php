<?php
namespace NullDev\Nemesis\Tests\Integration\TargetRenderables;

use NullDev\Nemesis\TargetRenderables\RenderableCollection;
use stdClass;

/**
 *
 */
class RenderableCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RenderableCollection
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new RenderableCollection([]);
    }

    /**
     *
     */
    public function testGetSeparator()
    {
        $result = $this->object->getSeparator();

        $this->assertEquals(',', $result);
    }

    /**
     *
     */
    public function testSetSeparator()
    {
        $separator = 'separator';
        $this->object->setSeparator($separator);
        $this->assertEquals($separator, $this->object->getSeparator());
    }

    /**
     *
     */
    public function testAdd()
    {
        $this->assertTrue($this->object->add('some-string'));
        $this->assertCount(1, $this->object);
    }

    /**
     *
     */
    public function testRender()
    {
        $this->object->add('$param1');
        $this->object->add('$mockVar1');

        $result = $this->object->render();

        $this->assertEquals('$param1,$mockVar1', $result);
    }

    /**
     *
     */
    public function testRenderWithChangesSeparator()
    {
        $this->object->add('$param1');
        $this->object->add('$mockVar1');
        $this->object->setSeparator(', ');

        $this->assertEquals('$param1, $mockVar1', $this->object->render());
    }

    /**
     *
     */
    public function testToString()
    {
        $this->object->add('$param1');
        $this->object->add('$mockVar1');

        $this->assertEquals('$param1,$mockVar1', $this->object->__toString());
    }
}
