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

    public function it_should_support_list_of_folders_to_exclude()
    {
        $this->setExcludeFolders(['folder']);
        $this->getExcludeFolders()->shouldReturn(['folder']);
    }

    public function it_should_have_nothing_in_the_list_of_default_folders_to_exclude()
    {
        $this->getExcludeFolders()->shouldReturn([]);
    }

    public function it_should_support_addition_of_folders_to_exclude()
    {
        $this->addExcludeFolders('folder');
        $this->getExcludeFolders()->shouldReturn(['folder']);
    }
}
