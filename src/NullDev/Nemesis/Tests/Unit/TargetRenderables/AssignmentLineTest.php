<?php
namespace NullDev\Nemesis\Tests\Unit\TargetRenderables;

use NullDev\Nemesis\TargetRenderables\AssignmentLine;
use Mockery as m;

/**
 *
 */
class AssignmentLineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AssignmentLine
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new AssignmentLine();
    }

    /**
     */
    public function testGetDestination()
    {
        $this->setExpectedException('Exception');

        $this->object->getDestination();
    }

    /**
     */
    public function testSetDestination()
    {
        $destination = 'destination';
        $this->object->setDestination($destination);
        $this->assertEquals($destination, $this->object->getDestination());
    }

    /**
     */
    public function testSetSource()
    {
        $source = 'source';
        $this->object->setSource($source);
        $this->assertEquals($source, $this->object->getSource());
    }

    /**
     * @dataProvider dataRender
     *
     * @param $destination
     * @param $source
     * @param $expected
     */
    public function testRender($destination, $source, $expected)
    {
        $this->object->setDestination($destination);
        $this->object->setSource($source);

        $result = $this->object->__toString();

        $this->assertEquals($expected, $result);
    }

    /**
     * @return array
     */
    public function dataRender()
    {
        $mockSimple   = m::mock();
        $mockStdClass = m::mock();

        $mockSimple->shouldReceive('__toString')->once()->andReturn('$mockSimple()');
        $mockStdClass->shouldReceive('__toString')->once()->andReturn('$mockStdClass("stdClass")');

        return [
            [
                '$obj',
                'name',
                '$obj = \'name\';',
            ],
            [
                '$obj',
                null,
                '$obj = null;',
            ],
            [
                '$obj',
                true,
                '$obj = true;',
            ],
            [
                '$obj',
                false,
                '$obj = false;',
            ],
            [
                '$obj',
                $mockSimple,
                '$obj = $mockSimple();',
            ],
            [
                '$obj',
                $mockStdClass,
                '$obj = $mockStdClass("stdClass");',
            ],
            [
                '$obj',
                '$variable',
                '$obj = $variable;',
            ],
        ];
    }
}
