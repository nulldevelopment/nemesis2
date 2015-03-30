<?php
namespace NullDev\Nemesis\Tests\Unit\TargetRenderables;

use NullDev\Nemesis\TargetRenderables\RenderableCollection;
use Mockery as m;

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
        $mockItem = m::mock('NullDev\Nemesis\TargetRenderables\RenderableInterface');
        $string   = 'some-string';

        $this->assertTrue($this->object->add($mockItem));
        $this->assertCount(1, $this->object);
        $this->assertTrue($this->object->add($string));
        $this->assertCount(2, $this->object);
    }

    /**
     *
     */
    public function testRender()
    {
        $this->object->add('$param1');
        $this->object->add('$mockVar1');

        $this->assertEquals('$param1,$mockVar1', $this->object->render());
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
