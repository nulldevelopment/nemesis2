<?php

namespace spec\NullDev\Nemesis\Collection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ActionResultCollectionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NullDev\Nemesis\Collection\ActionResultCollection');
        $this->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    /**
     * @param NullDev\Nemesis\Item\ActionResultItem $item
     */
    public function it_should_accept_new_action_results_items_to_be_added($item)
    {
        $this->addItem($item)->shouldReturn(true);
    }
}
