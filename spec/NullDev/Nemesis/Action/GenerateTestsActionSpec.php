<?php

namespace spec\NullDev\Nemesis\Action;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GenerateTestsActionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Action\GenerateTestsAction');
    }

    /**
     * @param NullDev\Nemesis\Collection\ActionResultCollection            $resultCollection
     * @param NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionGenerator $sourceGen
     */
    public function let($resultCollection, $sourceGen)
    {
        $this->beConstructedWith($resultCollection, $sourceGen);
    }

    /**
     * @param NullDev\Nemesis\Settings\PackageSettings $packageSettings
     */
    public function it_should_generate_tests_for_given_package($packageSettings)
    {
        $this->runAction($packageSettings)
            ->shouldReturnAnInstanceOf('NullDev\Nemesis\Collection\ActionResultCollection');
    }
}
