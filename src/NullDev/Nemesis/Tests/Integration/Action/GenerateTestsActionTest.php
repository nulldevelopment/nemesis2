<?php
namespace NullDev\Nemesis\Tests\Integration\Action;

use NullDev\Nemesis\Action\GenerateTestsAction;
use NullDev\Nemesis\Collection\ActionResultCollection;
use NullDev\Nemesis\Settings\PackageSettings;

/**
 *
 */
class GenerateTestsActionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GenerateTestsAction
     */
    protected $object;

    protected $resultCollection;

    /**
     */
    protected function setUp()
    {
        $this->resultCollection = new ActionResultCollection();

        $this->object = new GenerateTestsAction($this->resultCollection);
    }

    /**
     *
     */
    public function testRunAction()
    {
        $packageSettings = new PackageSettings();

        $result = $this->object->runAction($packageSettings);

        $this->assertEquals($this->resultCollection, $result);
    }
}
