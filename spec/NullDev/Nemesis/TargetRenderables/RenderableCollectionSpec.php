<?php

namespace spec\NullDev\Nemesis\TargetRenderables;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RenderableCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\TargetRenderables\RenderableCollection');
        $this->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
        $this->shouldHaveType('NullDev\Nemesis\TargetRenderables\RenderableInterface');
    }

    public function it_has_item_separator()
    {
        $this->setSeparator(', ');
        $this->getSeparator()->shouldReturn(', ');
    }

    public function it_has_default_item_separator()
    {
        $this->getSeparator()->shouldReturn(',');
    }

    /**
     * @param NullDev\Nemesis\TargetRenderables\RenderableInterface $item
     */
    public function it_should_allow_adding_new_item_into_collection($item)
    {
        $this->add($item);
    }
}
