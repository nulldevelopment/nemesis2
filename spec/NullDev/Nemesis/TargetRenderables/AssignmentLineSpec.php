<?php

namespace spec\NullDev\Nemesis\TargetRenderables;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AssignmentLineSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\TargetRenderables\AssignmentLine');
        $this->shouldHaveType('NullDev\Nemesis\TargetRenderables\RenderableInterface');
    }

    public function it_has_destionation_side()
    {
        $this->setDestination('left-side');
        $this->getDestination()->shouldReturn('left-side');
    }

    public function it_has_source_side()
    {
        $this->setSource('right-side');
        $this->getSource()->shouldReturn('right-side');
    }

    public function it_has_destionation_alignment_value()
    {
        $this->getDestinationAlignment()->shouldReturn(10);
        $this->setDestinationAlignment(20);
        $this->getDestinationAlignment()->shouldReturn(20);
    }

    public function it_can_render_itself()
    {
        $this->setDestination('left-side');
        $this->setSource('right-side');
        $this->render()->shouldReturn('left-side = \'right-side\';');
    }

    public function it_can_render_itself_automatically()
    {
        $this->setDestination('left-side');
        $this->setSource('right-side');
        $this->__toString()->shouldReturn('left-side = \'right-side\';');
    }
}
