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
        $mockPackageSettings = m::mock('NullDev\Nemesis\Settings\PackageSettings');
        $mockPackageSettings
            ->shouldReceive('setPath')->with('/src/')->once();
        $mockPackageSettings
            ->shouldReceive('setType')->with('sf2')->once();
        $mockPackageSettings
            ->shouldReceive('addExcludeFolders')->with('Tests')->once();

        $mockAction = m::mock();
        $mockAction
            ->shouldReceive('runAction')
            ->with($mockPackageSettings)
            ->once();

        $mockContainer = m::mock('Symfony\Component\DependencyInjection\ContainerInterface');
        $mockContainer
            ->shouldReceive('get')->with('settings')->once()->andReturn($mockPackageSettings);
        $mockContainer
            ->shouldReceive('get')->with('nemesis.action.generate_tests')->once()->andReturn($mockAction);

        $command = new GenerateTestsCommand('name');
        $command->setContainer($mockContainer);

        $mockInput = m::mock('Symfony\Component\Console\Input\InputInterface');
        $mockInput
            ->shouldReceive('getArgument')->with('path')->once()->andReturn('/src/');
        $mockInput
            ->shouldReceive('getArgument')->with('type')->once()->andReturn('sf2');

        $mockOutput = m::mock('Symfony\Component\Console\Output\OutputInterface');
        $mockOutput
            ->shouldReceive('writeln')->with('/src/')->once();

        $result = $command->execute($mockInput, $mockOutput);

        $this->assertNull($result);
    }
}
