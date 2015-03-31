<?php
namespace NullDev\Nemesis\Tests\Unit\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaDataGenerator;
use Mockery as m;

/**
 *
 */
class SourceMetaDataGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGenerate()
    {
        $filePath = '/path/application/src/Vendor/SomeBundle/Namespace/SomeClass.php';
        $fqdn     = 'Vendor\SomeBundle\Namespace\SomeClass';

        $mockFactory             = m::mock('NullDev\Nemesis\SourceMeta\SourceMetaDataFactory');
        $mockFileParser          = m::mock('NullDev\Examiner\FileParser\PhpFileParser');
        $mockFileLoader          = m::mock('NullDev\Examiner\PhpFileLoader');
        $mockReflectionGenerator = m::mock('NullDev\Examiner\ReflectionClassGenerator');

        $obj = new SourceMetaDataGenerator($mockFactory, $mockFileParser, $mockFileLoader, $mockReflectionGenerator);

        $mockParseResult = m::mock();
        $mockParseResult
            ->shouldReceive('getClassName')->once()->andReturn('SomeClass');
        $mockParseResult
            ->shouldReceive('getFullyQualifiedClassName')->times(3)->andReturn($fqdn);

        $mockMetaData = m::mock();

        $mockReflection = m::mock();

        $mockFileLoader
            ->shouldReceive('load')->with($filePath)->once();
        $mockFileParser
            ->shouldReceive('parse')->with($filePath)->once()->andReturn($mockParseResult);

        $mockReflectionGenerator
            ->shouldReceive('generate')->with($fqdn)->once()->andReturn($mockReflection);

        $mockFactory
            ->shouldReceive('create')->once()->andReturn($mockMetaData);

        $mockMetaData
            ->shouldReceive('setFilePath')->with($filePath)->once();
        $mockMetaData
            ->shouldReceive('setClassName')->with('SomeClass')->once();
        $mockMetaData
            ->shouldReceive('setFullyQualifiedClassName')->with($fqdn)->once();
        $mockMetaData
            ->shouldReceive('setReflection')->with($mockReflection)->once();

        $result = $obj->generate($filePath);
        $this->assertEquals($mockMetaData, $result);
    }

    /**
     *
     */
    public function testGenerateNoClassFound()
    {
        $filePath = '/path/application/src/Vendor/SomeBundle/Namespace/SomeClass.php';

        $mockFactory             = m::mock('NullDev\Nemesis\SourceMeta\SourceMetaDataFactory');
        $mockFileParser          = m::mock('NullDev\Examiner\FileParser\PhpFileParser');
        $mockFileLoader          = m::mock('NullDev\Examiner\PhpFileLoader');
        $mockReflectionGenerator = m::mock('NullDev\Examiner\ReflectionClassGenerator');

        $obj = new SourceMetaDataGenerator($mockFactory, $mockFileParser, $mockFileLoader, $mockReflectionGenerator);

        $mockParseResult = m::mock();
        $mockParseResult
            ->shouldReceive('getFullyQualifiedClassName')->once()->andReturn(null);

        $mockFileParser
            ->shouldReceive('parse')->with($filePath)->once()->andReturn($mockParseResult);

        $result = $obj->generate($filePath);

        $this->assertFalse($result);
    }

    /**
     *
     */
    public function testGenerateFileDoesntExist()
    {
        $filePath = '/path/application/src/Vendor/SomeBundle/Namespace/SomeClass.php';

        $mockFactory             = m::mock('NullDev\Nemesis\SourceMeta\SourceMetaDataFactory');
        $mockFileParser          = m::mock('NullDev\Examiner\FileParser\PhpFileParser');
        $mockFileLoader          = m::mock('NullDev\Examiner\PhpFileLoader');
        $mockReflectionGenerator = m::mock('NullDev\Examiner\ReflectionClassGenerator');

        $obj = new SourceMetaDataGenerator($mockFactory, $mockFileParser, $mockFileLoader, $mockReflectionGenerator);

        $mockFileParser
            ->shouldReceive('parse')->with($filePath)->andThrow(new \Exception());

        $result = $obj->generate($filePath);

        $this->assertFalse($result);
    }
}
