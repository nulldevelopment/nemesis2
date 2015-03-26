<?php
namespace NullDev\Nemesis\Tests\Unit\SourceFile;

use NullDev\Nemesis\SourceFile\SourceFileListGenerator;
use Mockery as m;

/**
 *
 */
class SourceFileListGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testGenerate()
    {
        $mockFileFinder = m::mock('Symfony\Component\Finder\Finder');
        $mockFileFinder
            ->shouldReceive('files')->once()->andReturn($mockFileFinder);
        $mockFileFinder
            ->shouldReceive('name')->with('*.php')->once()->andReturn($mockFileFinder);
        $mockFileFinder
            ->shouldReceive('in')->with('/path')->once()->andReturn($mockFileFinder);
        $mockFileFinder
            ->shouldReceive('exclude')->with(['Tests'])->once()->andReturn($mockFileFinder);
        $mockFileFinder
            ->shouldReceive('sortByName')->once()->andReturn($mockFileFinder);

        $obj = new SourceFileListGenerator($mockFileFinder);

        $mockPackageSettings = m::mock('NullDev\Nemesis\Settings\PackageSettings');
        $mockPackageSettings
            ->shouldReceive('getPath')->once()->andReturn('/path');
        $mockPackageSettings
            ->shouldReceive('getExcludeFolders')->once()->andReturn(['Tests']);

        $result = $obj->generate($mockPackageSettings);

        $this->assertEquals($mockFileFinder, $result);
    }
}
