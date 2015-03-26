<?php
namespace NullDev\Nemesis\Tests\Unit\Command;

use NullDev\Nemesis\Command\GenerateTestsCommand;
use Mockery as m;

/**
 *
 */
class GenerateTestsCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers NullDev\Nemesis\Command\GenerateTestsCommand::configure
     */
    public function testConfigure()
    {
        $command = new GenerateTestsCommand('name');

        $this->assertNotNull($command);
    }

    /**
     * @covers NullDev\Nemesis\Command\GenerateTestsCommand::execute
     */
    public function testExecute()
    {
        $command = new GenerateTestsCommand('name');

        $mockInput = m::mock('Symfony\Component\Console\Input\InputInterface');
        $mockInput
            ->shouldReceive('getArgument')
            ->with('path')
            ->once()
            ->andReturn('/src/');
        $mockInput
            ->shouldReceive('getArgument')
            ->with('type')
            ->once()
            ->andReturn('sf2');
        $mockOutput = m::mock('Symfony\Component\Console\Output\OutputInterface');
        $mockOutput
            ->shouldReceive('writeln')
            ->with('/src/')
            ->once();

        $result = $command->execute($mockInput, $mockOutput);

        $this->assertNull($result);
    }
}
