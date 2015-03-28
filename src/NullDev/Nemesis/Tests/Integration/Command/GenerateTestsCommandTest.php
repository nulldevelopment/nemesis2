<?php
namespace NullDev\Nemesis\Tests\Integration\Command;

use NullDev\Nemesis\Command\GenerateTestsCommand;
use NullDev\Nemesis\Tests\Integration\ContainerTrait;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 *
 */
class GenerateTestsCommandTest extends \PHPUnit_Framework_TestCase
{
    use ContainerTrait;

    /**
     * @var GenerateTestsCommand
     */
    protected $object;

    /**
     */
    protected function setUp()
    {
        $name = 'name';

        $this->object = new GenerateTestsCommand($name);

        $this->object->setContainer($this->getContainer());
    }

    /**
     * @covers NullDev\Nemesis\Command\GenerateTestsCommand::execute
     */
    public function testExecute()
    {
        $this->markTestSkipped('TODO:not sure how to prcosee input argument without building it from scratch :(');
        $inputDef = new InputDefinition(['path', 'type']);

        $input  = new ArrayInput(['path' => NEMESIS_TESTDATA_PATH, 'type' => 'sf2'], $inputDef);
        $output = new ConsoleOutput();

        $this->object->execute($input, $output);
    }
}
