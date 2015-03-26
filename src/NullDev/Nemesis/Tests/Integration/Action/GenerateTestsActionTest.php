<?php
namespace NullDev\Nemesis\Tests\Integration\Action;

use NullDev\Nemesis\Action\GenerateTestsAction;
use NullDev\Nemesis\Collection\ActionResultCollection;
use NullDev\Nemesis\Settings\PackageSettings;
use NullDev\Nemesis\Tests\Integration\ContainerTrait;

/**
 *
 */
class GenerateTestsActionTest extends \PHPUnit_Framework_TestCase
{
    use ContainerTrait;

    /**
     * @var GenerateTestsAction
     */
    protected $object;

    protected $resultCollection;

    /**
     */
    protected function setUp()
    {
        $this->object = $this->getContainer()->get('nemesis.action.generate_tests');
    }

    /**
     *
     */
    public function testRunAction()
    {
        $packageSettings = new PackageSettings();
        $packageSettings->setPath(NEMESIS_TESTDATA_PATH);

        $result = $this->object->runAction($packageSettings);

        $this->assertInstanceOf('NullDev\Nemesis\Collection\ActionResultCollection', $result);
    }
}
