<?php

namespace spec\NullDev\Nemesis\SourceFile;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Doctrine\Common\Collections\ArrayCollection;

class SourceFileListGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\SourceFile\SourceFileListGenerator');
    }

    /**
     * @param Symfony\Component\Finder\Finder $fileFinder
     */
    public function let($fileFinder)
    {
        $this->beConstructedWith($fileFinder);
    }

    /**
     * @param NullDev\Nemesis\Settings\PackageSettings $packageSettings
     */
    public function it_should_generate_list_of_source_files($fileFinder, $packageSettings)
    {
        $fileFinder->files()
            ->shouldBeCalled()
            ->willReturn($fileFinder);
        $fileFinder->name('*.php')
            ->shouldBeCalled()
            ->willReturn($fileFinder);
        $fileFinder->in('/path')
            ->shouldBeCalled()
            ->willReturn($fileFinder);
        $fileFinder->exclude(['z'])
            ->shouldBeCalled()
            ->willReturn($fileFinder);
        $fileFinder->sortByName()
            ->shouldBeCalled()
            ->willReturn($fileFinder);

        $packageSettings->getPath()->willReturn('/path');
        $packageSettings->getExcludeFolders()->willReturn(['z']);

        $this->generate($packageSettings)->shouldImplement('\Traversable');
    }
}
