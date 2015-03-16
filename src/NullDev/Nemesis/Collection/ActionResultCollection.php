<?php

namespace NullDev\Nemesis\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use NullDev\Nemesis\Item\ActionResultItem;

/**
 * Class ActionResultCollection.
 */
class ActionResultCollection extends ArrayCollection
{
    /**
     * @param ActionResultItem $item
     *
     * @return bool
     */
    public function addItem(ActionResultItem $item)
    {
        return $this->add($item);
    }
}
