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

        $obj = new GenerateTestsAction($mockResultCollection);

        //
        $mockPackageSettings = m::mock('NullDev\Nemesis\Settings\PackageSettings');
        $result              = $obj->runAction($mockPackageSettings);

        $this->assertEquals($mockResultCollection, $result);
    }
}
