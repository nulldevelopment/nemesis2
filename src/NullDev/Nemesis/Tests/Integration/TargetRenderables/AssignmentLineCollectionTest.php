<?php
namespace NullDev\Nemesis\Tests\Integration\TargetRenderables;

use NullDev\Nemesis\TargetRenderables\AssignmentLine;
use NullDev\Nemesis\TargetRenderables\AssignmentLineCollection;
use stdClass;

/**
 *
 */
class AssignmentLineCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AssignmentLineCollection
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new AssignmentLineCollection([]);
    }

    /**
     *
     */
    public function testAdd()
    {
        $this->assertCount(0, $this->object);
        $this->object->add(new AssignmentLine());
        $this->assertCount(1, $this->object);
    }

    /**
     *
     */
    public function testAddOfUnsuportedItem()
    {
        $this->setExpectedException('Exception');
        $this->object->add(new stdClass());
    }

    /**
     *
     */
    public function testRender()
    {
        $assignmentLine1 = new AssignmentLine();
        $assignmentLine2 = new AssignmentLine();

        $assignmentLine1->setDestination('$mockVariable1');
        $assignmentLine1->setSource('$mock()');
        $assignmentLine2->setDestination('$mockVar2');
        $assignmentLine2->setSource('$mock(\'stdClass\')');

        $this->object->add($assignmentLine1);
        $this->object->add($assignmentLine2);

        $expected =
            '$mockVariable1 = $mock();'.PHP_EOL.
            '$mockVar2      = $mock(\'stdClass\');';

        $this->assertEquals($expected, $this->object->render());
    }

    /**
     *
     */
    public function testRenderEmptyCollection()
    {
        $result = $this->object->render();

        $this->assertEquals('', $result);
    }
}
