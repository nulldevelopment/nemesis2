<?php
namespace NullDev\Nemesis\Tests\Unit\TargetRenderables;

use NullDev\Nemesis\TargetRenderables\ClassInstantiation;
use Mockery as m;

/**
 *
 */
class ClassInstantiationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ClassInstantiation
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new ClassInstantiation();
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetClassName()
    {
        $this->assertEquals(null, $this->object->getClassName());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetClassName()
    {
        $className = 'className';
        $this->object->setClassName($className);
        $this->assertEquals($className, $this->object->getClassName());
    }

    /**
     *
     */
    public function testGetParams()
    {
        $this->assertCount(0, $this->object->getParams());
    }

    /**
     *
     */
    public function testAddParam()
    {
        $this->assertCount(0, $this->object->getParams());
        $this->object->addParam('param1');
        $this->assertCount(1, $this->object->getParams());
    }

    /**
     *
     */
    public function testRender()
    {
        $this->object->setClassName('className');

        $this->assertEquals('new className()', $this->object->render());
    }

    /**
     *
     */
    public function testRenderWithParams()
    {
        $mockParams = m::mock('NullDev\Nemesis\TargetRenderables\RenderableCollection');
        $mockParams->shouldReceive('render')->once()->andReturn('$param1, $param2');

        $this->object->setClassName('className');
        $this->object->setParams($mockParams);

        $this->assertEquals('new className($param1, $param2)', $this->object->render());
    }

    /**
     *
     */
    public function testToString()
    {
        $this->object->setClassName('className');

        $this->assertEquals('new className()', $this->object->__toString());
    }
}
