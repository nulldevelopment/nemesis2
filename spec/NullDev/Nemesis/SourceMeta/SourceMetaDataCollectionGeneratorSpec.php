<?php

namespace spec\NullDev\Nemesis\SourceMeta;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SourceMetaDataCollectionGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionGenerator');
    }

    /**
     * @param NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionFactory $factory
     * @param NullDev\Nemesis\SourceFile\SourceFileListGenerator         $fileListGen
     * @param NullDev\Nemesis\SourceMeta\SourceMetaDataGenerator         $sourceMetaDataGenerator
     */
    public function let($factory, $fileListGen, $sourceMetaDataGenerator)
    {
        $this->beConstructedWith($factory, $fileListGen, $sourceMetaDataGenerator);
    }

    /**
     * @param NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionFactory $factory
     * @param NullDev\Nemesis\SourceFile\SourceFileListGenerator         $fileListGen
     * @param NullDev\Nemesis\SourceMeta\SourceMetaDataGenerator         $sourceMetaDataGenerator
     * @param NullDev\Nemesis\Settings\PackageSettings                   $settings
     * @param NullDev\Nemesis\SourceMeta\SourceMetaDataCollection        $collection
     * @param NullDev\Nemesis\SourceMeta\SourceMetaData                  $classSourceMeta
     */
    public function it_should_generate_collection_from_given_package_settings(
        $factory,
        $fileListGen,
        $sourceMetaDataGenerator,
        $settings,
        $collection,
        $classSourceMeta
    ) {
        $fileListGen
            ->generate($settings)
            ->shouldBeCalled()
            ->willReturn(['path-to-file1.php']);

        $sourceMetaDataGenerator
            ->generate('path-to-file1.php')
            ->shouldBeCalled()
            ->willReturn($classSourceMeta);

        $collection
            ->add($classSourceMeta)
            ->shouldBeCalled();

        $factory
            ->create()
            ->shouldBeCalled()
            ->willReturn($collection);

        $this
            ->generate($settings)
            ->shouldReturnAnInstanceOf('NullDev\Nemesis\SourceMeta\SourceMetaDataCollection');
    }
}
