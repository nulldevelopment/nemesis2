<?php
namespace NullDev\Nemesis\Tests\Unit\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionGenerator;
use Mockery as m;

/**
 *
 */
class SourceMetaDataCollectionGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGenerate()
    {
        $mockFactory                 = m::mock('NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionFactory');
        $mockFileListGen             = m::mock('NullDev\Nemesis\SourceFile\SourceFileListGenerator');
        $mockSourceMetaDataGenerator = m::mock('NullDev\Nemesis\SourceMeta\SourceMetaDataGenerator');

        $obj = new SourceMetaDataCollectionGenerator($mockFactory, $mockFileListGen, $mockSourceMetaDataGenerator);

        $mockSourceMeta = m::mock('NullDev\Nemesis\SourceMeta\SourceMetaData');
        $mockSettings   = m::mock('NullDev\Nemesis\Settings\PackageSettings');
        $mockCollection = m::mock('NullDev\Nemesis\Source\ClassMetaDataCollection');

        $mockFilePath1 = '/path/class.php';
        $mockFiles     = [$mockFilePath1];

        $mockFileListGen
            ->shouldReceive('generate')
            ->with($mockSettings)
            ->once()
            ->andReturn($mockFiles);

        $mockSourceMetaDataGenerator
            ->shouldReceive('generate')->with($mockFilePath1)->once()->andReturn($mockSourceMeta);

        $mockSettings
            ->shouldReceive('getSourceCode->getRootPath')->once()->andReturn('/path');
        $mockSettings
            ->shouldReceive('getSourceCode->getExcludeFolders')->once()->andReturn(['excluded-folder-1']);

        $mockSourceMeta
            ->shouldReceive('setPackageSettings')->with($mockSettings)->once();

        $mockCollection
            ->shouldReceive('add')
            ->with($mockSourceMeta)
            ->once();

        $mockFactory
            ->shouldReceive('create')->once()->andReturn($mockCollection);

        $result = $obj->generate($mockSettings);

        $this->assertEquals($mockCollection, $result);
    }
}
