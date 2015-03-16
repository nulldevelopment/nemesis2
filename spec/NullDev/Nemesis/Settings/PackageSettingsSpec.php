<?php

namespace spec\NullDev\Nemesis\Settings;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PackageSettingsSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Settings\PackageSettings');
    }
}
