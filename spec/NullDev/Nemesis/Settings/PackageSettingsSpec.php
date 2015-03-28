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
        $this->setPath('/src');
        $this->getPath()->shouldReturn('/src');
    }

    public function it_should_throw_exception_if_package_path_isnt_set()
    {
        $this->shouldThrow('\Exception')->duringGetPath();
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

    public function it_should_support_root_namespace()
    {
        $this->setRootNamespace('RootNamespace');
        $this->getRootNamespace()->shouldReturn('RootNamespace');
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

    public function it_should_support_access_to_package_test_root_path()
    {
        $this->setRootTestPath('/src/Tests');
        $this->getRootTestPath()->shouldReturn('/src/Tests');
    }

    public function it_should_generate_package_test_root_path_from_source_path()
    {
        $this->setPath('/src');
        $this->getRootTestPath()->shouldReturn('/src/Tests');
    }

    public function it_should_support_access_to_package_test_root_namespace()
    {
        $this->setRootTestNamespace('Vendor\Package\Tests');
        $this->getRootTestNamespace()->shouldReturn('Vendor\Package\Tests');
    }

    public function it_should_generate_package_test_root_namespace_from_source_namespace()
    {
        $this->setRootNamespace('Vendor\Package');
        $this->getRootTestNamespace()->shouldReturn('Vendor\Package\Tests');
    }

    public function it_should_throw_exception_if_package_path_isnt_set_when_accessing_test_root_path()
    {
        $this->shouldThrow('\Exception')->duringGetRootTestPath();
    }

    public function it_should_generate_root_namespace_from_root_path()
    {
        $this->calculateRootNamespaceFromRootPath('/src/Vendor/PackageBundle')->shouldReturn('Vendor\PackageBundle');
    }

    public function it_should_generate_root_namespace_from_location_last_src_occurance_in_root_path()
    {
        $this->calculateRootNamespaceFromRootPath('/src/app/src/Vendor/PackageBundle')
            ->shouldReturn('Vendor\PackageBundle');
        $this->calculateRootNamespaceFromRootPath('/lib/src/app/src/Vendor/PackageBundle')
            ->shouldReturn('Vendor\PackageBundle');
    }

    public function it_should_generate_root_namespace_from_root_path_given_with_trailing_slash()
    {
        $this->calculateRootNamespaceFromRootPath('/src/Vendor/PackageBundle/')->shouldReturn('Vendor\PackageBundle');
    }

    public function it_should_throw_exception_when_generating_root_namespace_from_unrecognizable_root_path()
    {
        $this->shouldThrow('\Exception')->duringCalculateRootNamespaceFromRootPath('/lib/Vendor/PackageBundle/');
    }
}
