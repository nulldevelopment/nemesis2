<?php
namespace NullDev\Nemesis\Tests\Unit\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaData;
use Mockery as m;

/**
 *
 */
class SourceMetaDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SourceMetaData
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $this->object = new SourceMetaData();
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetFilePath()
    {
        $this->assertEquals(null, $this->object->getFilePath());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetFilePath()
    {
        $filePath = 'filePath';
        $this->object->setFilePath($filePath);
        $this->assertEquals($filePath, $this->object->getFilePath());
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
     * Auto generated get method using TeeGee.
     */
    public function testGetFullyQualifiedClassName()
    {
        $this->assertEquals(null, $this->object->getFullyQualifiedClassName());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetFullyQualifiedClassName()
    {
        $fullyQualifiedClassName = 'fullyQualifiedClassName';
        $this->object->setFullyQualifiedClassName($fullyQualifiedClassName);
        $this->assertEquals($fullyQualifiedClassName, $this->object->getFullyQualifiedClassName());
    }

    /**
     * Auto generated get method using TeeGee.
     */
    public function testGetReflection()
    {
        $this->assertEquals(null, $this->object->getReflection());
    }

    /**
     * Auto generated set method using TeeGee.
     */
    public function testSetReflection()
    {
        $reflection = m::mock('ReflectionClass');
        $this->object->setReflection($reflection);
        $this->assertEquals($reflection, $this->object->getReflection());
    }

    /**
     */
    public function testGetConstructorReflection()
    {
        $mockConstructor = m::mock('ReflectionMethod');
        $mockReflection  = m::mock('ReflectionClass');

        $mockReflection->shouldReceive('getMethods')->once()->andReturn([$mockConstructor]);

        $mockConstructor->shouldReceive('isConstructor')->once()->andReturn(true);

        $this->object->setReflection($mockReflection);

        $result = $this->object->getConstructorReflection();

        $this->assertEquals($mockConstructor, $result);
    }

    /**
     */
    public function testGetConstructorReflectionNoConstructorFound()
    {
        $mockMethod1    = m::mock('ReflectionMethod');
        $mockReflection = m::mock('ReflectionClass');

        $mockReflection->shouldReceive('getMethods')->once()->andReturn([$mockMethod1]);

        $mockMethod1->shouldReceive('isConstructor')->once()->andReturn(false);

        $this->object->setReflection($mockReflection);

        $result = $this->object->getConstructorReflection();

        $this->assertNull($result);
    }

    /**
     */
    public function testHasConstructorParams()
    {
        $mockConstructor = m::mock('ReflectionMethod');
        $mockReflection  = m::mock('ReflectionClass');

        $mockReflection->shouldReceive('getMethods')->once()->andReturn([$mockConstructor]);

        $mockConstructor->shouldReceive('isConstructor')->once()->andReturn(true);
        $mockConstructor->shouldReceive('getParameters')->once()->andReturn(['param1']);

        $this->object->setReflection($mockReflection);

        $result = $this->object->hasConstructorParams();

        $this->assertTrue($result);
    }

    /**
     */
    public function testHasConstructorParamsNoConstructor()
    {
        $mockReflection = m::mock('ReflectionClass');

        $mockReflection->shouldReceive('getMethods')->once()->andReturn([]);

        $this->object->setReflection($mockReflection);

        $result = $this->object->hasConstructorParams();

        $this->assertFalse($result);
    }

    /**
     */
    public function testHasConstructorParamsNoParamsIn()
    {
        $mockConstructor = m::mock('ReflectionMethod');
        $mockReflection  = m::mock('ReflectionClass');

        $mockReflection->shouldReceive('getMethods')->once()->andReturn([$mockConstructor]);

        $mockConstructor->shouldReceive('isConstructor')->once()->andReturn(true);
        $mockConstructor->shouldReceive('getParameters')->once()->andReturn([]);

        $this->object->setReflection($mockReflection);

        $result = $this->object->hasConstructorParams();

        $this->assertFalse($result);
    }
}
