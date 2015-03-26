<?php
namespace NullDev\Nemesis\Tests\Unit\Action;

use NullDev\Nemesis\Action\GenerateTestsAction;
use Mockery as m;

/**
 *
 */
class GenerateTestsActionTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testRunAction()
    {
        $mockResultCollection = m::mock('NullDev\Nemesis\Collection\ActionResultCollection');
        $mockGen              = m::mock('NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionGenerator');

        $obj = new GenerateTestsAction($mockResultCollection, $mockGen);

        //
        $mockPackageSettings = m::mock('NullDev\Nemesis\Settings\PackageSettings');

        $mockGen
            ->shouldReceive('generate')
            ->with($mockPackageSettings)
            ->once()
            ->andReturn([]);

        $result = $obj->runAction($mockPackageSettings);

        $this->assertEquals($mockResultCollection, $result);
    }
}
