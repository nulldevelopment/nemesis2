<?php
namespace NullDev\Nemesis\Tests\Integration\Command;

use NullDev\Nemesis\Command\GenerateTestsCommand;

/**
 *
 */
class GenerateTestsCommandTest extends \PHPUnit_Framework_TestCase
{
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
    }

    /**
     * @covers NullDev\Nemesis\Command\GenerateTestsCommand::execute
     */
    public function testExecute()
    {
        $this->markTestIncomplete('TODO');
    }
}
