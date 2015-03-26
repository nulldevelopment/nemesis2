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

    public function it_should_support_package_path()
    {
        $this->setPath('/src/');
        $this->getPath()->shouldReturn('/src/');
    }

    public function it_should_support_package_type()
    {
        $this->setType('type');
        $this->getType()->shouldReturn('type');
    }

    public function it_should_support_symfony2_package_type()
    {
        $this->setType('sf2');
        $this->getType()->shouldReturn('sf2');
    }
}
