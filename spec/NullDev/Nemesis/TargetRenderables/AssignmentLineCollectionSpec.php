<?php

namespace spec\NullDev\Nemesis\TargetRenderables;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AssignmentLineCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\TargetRenderables\AssignmentLineCollection');
        $this->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
        $this->shouldHaveType('NullDev\Nemesis\TargetRenderables\RenderableInterface');
    }

    /**
     * @param NullDev\Nemesis\TargetRenderables\AssignmentLine $item
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

    /**
     * @param NullDev\Nemesis\TargetRenderables\AssignmentLine $item1
     * @param NullDev\Nemesis\TargetRenderables\AssignmentLine $item2
     */
    public function it_can_render_its_items($item1, $item2)
    {
        $item1->render()->willReturn('$var1 = $someOtherVar1;');
        $item2->render()->willReturn('$var2 = $someOtherVar2;');
        $item1->getDestinationAlignment()->willReturn(6);
        $item2->getDestinationAlignment()->willReturn(6);
        $item1->setDestinationAlignment(6)->shouldBeCalled();
        $item2->setDestinationAlignment(6)->shouldBeCalled();

        $items = [
            $item1,
            $item2,
        ];
        foreach ($items as $item) {
            $this->add($item);
        }

        $expected =
            '$var1 = $someOtherVar1;'.PHP_EOL.
            '$var2 = $someOtherVar2;';
        $this->render()->shouldReturn($expected);
    }
}
