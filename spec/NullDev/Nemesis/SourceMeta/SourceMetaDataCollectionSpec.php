<?php

namespace spec\NullDev\Nemesis\SourceMeta;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SourceMetaDataCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\SourceMeta\SourceMetaDataCollection');
        $this->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    /**
     * @param NullDev\Nemesis\SourceMeta\SourceMetaData $item
     */
    public function it_should_allow_adding_new_item_into_collection($item)
    {
        $this->add($item);
    }

    /**
     */
    public function it_should_throw_exception_on_adding_wrong_item_class_into_collection($item)
    {
        $this->shouldThrow('\Exception')->duringAdd($item);
    }
}
