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

    /**
     *
     */
    public function testGetGettersSettersPercentage()
    {
        $mockReflection = m::mock('ReflectionClass');
        $mockMethod1    = m::mock('ReflectionMethod');
        $mockMethod2    = m::mock('ReflectionMethod');
        $mockMethod3    = m::mock('ReflectionMethod');
        $mockMethod4    = m::mock('ReflectionMethod');

        $mockMethod1->shouldReceive('isPublic')->once()->andReturn(true);
        $mockMethod1->shouldReceive('isConstructor')->once()->andReturn(false);
        $mockMethod1->shouldReceive('getName')->once()->andReturn('getProperty');

        $mockMethod2->shouldReceive('isPublic')->once()->andReturn(true);
        $mockMethod2->shouldReceive('isConstructor')->once()->andReturn(false);
        $mockMethod2->shouldReceive('getName')->once()->andReturn('setProperty');

        $mockMethod3->shouldReceive('isPublic')->once()->andReturn(false);

        $mockMethod4->shouldReceive('isPublic')->once()->andReturn(true);
        $mockMethod4->shouldReceive('isConstructor')->once()->andReturn(false);
        $mockMethod4->shouldReceive('getName')->once()->andReturn('doWork');

        $mockReflection
            ->shouldReceive('getMethods')->once()->andReturn([$mockMethod1, $mockMethod2, $mockMethod3, $mockMethod4]);

        $this->object->setReflection($mockReflection);

        $result = $this->object->getGettersSettersPercentage();

        $this->assertEquals(66, $result);
    }

    /**
     *
     */
    public function testGetGettersSettersPercentageOnlyGettersAndSettersExist()
    {
        $mockReflection = m::mock('ReflectionClass');
        $mockMethod1    = m::mock('ReflectionMethod');
        $mockMethod2    = m::mock('ReflectionMethod');

        $mockMethod1->shouldReceive('isPublic')->once()->andReturn(true);
        $mockMethod1->shouldReceive('isConstructor')->once()->andReturn(false);
        $mockMethod1->shouldReceive('getName')->once()->andReturn('getProperty');

        $mockMethod2->shouldReceive('isPublic')->once()->andReturn(true);
        $mockMethod2->shouldReceive('isConstructor')->once()->andReturn(false);
        $mockMethod2->shouldReceive('getName')->once()->andReturn('setProperty');

        $mockReflection->shouldReceive('getMethods')->once()->andReturn([$mockMethod1, $mockMethod2]);

        $this->object->setReflection($mockReflection);

        $result = $this->object->getGettersSettersPercentage();

        $this->assertEquals(100, $result);
    }

    /**
     *
     */
    public function testGetGettersSettersPercentageOnlyConstructorExists()
    {
        $mockReflection = m::mock('ReflectionClass');
        $mockMethod1    = m::mock('ReflectionMethod');

        $mockMethod1->shouldReceive('isPublic')->once()->andReturn(true);
        $mockMethod1->shouldReceive('isConstructor')->once()->andReturn(true);

        $mockReflection->shouldReceive('getMethods')->once()->andReturn([$mockMethod1]);

        $this->object->setReflection($mockReflection);

        $result = $this->object->getGettersSettersPercentage();

        $this->assertEquals(0, $result);
    }

    /**
     *
     */
    public function testGetGettersSettersPercentageOnlyPrivateMethods()
    {
        $mockReflection = m::mock('ReflectionClass');
        $mockMethod1    = m::mock('ReflectionMethod');
        $mockMethod2    = m::mock('ReflectionMethod');
        $mockMethod3    = m::mock('ReflectionMethod');

        $mockMethod1->shouldReceive('isPublic')->once()->andReturn(false);
        $mockMethod2->shouldReceive('isPublic')->once()->andReturn(false);
        $mockMethod3->shouldReceive('isPublic')->once()->andReturn(false);

        $mockReflection->shouldReceive('getMethods')->once()->andReturn([$mockMethod1, $mockMethod2, $mockMethod3]);

        $this->object->setReflection($mockReflection);

        $result = $this->object->getGettersSettersPercentage();

        $this->assertEquals(0, $result);
    }

    /**
     *
     */
    public function testGetGettersSettersPercentageNoMethodsAtAll()
    {
        $mockReflection = m::mock('ReflectionClass');

        $mockReflection->shouldReceive('getMethods')->once()->andReturn([]);

        $this->object->setReflection($mockReflection);

        $result = $this->object->getGettersSettersPercentage();

        $this->assertEquals(0, $result);
    }
}
