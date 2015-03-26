<?php

namespace spec\NullDev\Nemesis\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GenerateTestsCommandSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Command\GenerateTestsCommand');
    }
}
