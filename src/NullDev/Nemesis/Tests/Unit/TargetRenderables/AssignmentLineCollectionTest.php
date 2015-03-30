<?php
namespace NullDev\Nemesis\Tests\Unit\TargetRenderables;

use NullDev\Nemesis\TargetRenderables\AssignmentLineCollection;
use Mockery as m;

/**
 *
 */
class AssignmentLineCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testAdd()
    {
        $obj = new AssignmentLineCollection([]);

        //
        $mockItem = m::mock('NullDev\Nemesis\TargetRenderables\AssignmentLine');
        $obj->add($mockItem);

        $this->assertCount(1, $obj);
    }

    /**
     *
     */
    public function testAddOfUnsuportedItem()
    {
        $this->setExpectedException('Exception');

        $obj = new AssignmentLineCollection([]);

        $mockItem = m::mock();
        $obj->add($mockItem);
    }

    /**
     *
     */
    public function testRender()
    {
        $mockAssignmentLine1 = m::mock('NullDev\Nemesis\TargetRenderables\AssignmentLine');
        $mockAssignmentLine2 = m::mock('NullDev\Nemesis\TargetRenderables\AssignmentLine');

        $obj = new AssignmentLineCollection([]);

        $mockAssignmentLine1->shouldReceive('render')->once()->andReturn('line');
        $mockAssignmentLine2->shouldReceive('render')->once()->andReturn('another-line');
        $mockAssignmentLine1->shouldReceive('getDestinationAlignment')->once()->andReturn(2);
        $mockAssignmentLine2->shouldReceive('getDestinationAlignment')->once()->andReturn(2);
        $mockAssignmentLine1->shouldReceive('setDestinationAlignment')->with(2)->once();
        $mockAssignmentLine2->shouldReceive('setDestinationAlignment')->with(2)->once();

        $obj->add($mockAssignmentLine1);
        $obj->add($mockAssignmentLine2);

        $this->assertEquals('line'.PHP_EOL.'another-line', $obj->render());
    }

    /**
     *
     */
    public function testRenderEmptyCollection()
    {
        $obj = new AssignmentLineCollection([]);

        $result = $obj->render();

        $this->assertEquals('', $result);
    }
}
