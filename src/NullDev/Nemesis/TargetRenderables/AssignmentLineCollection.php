<?php

namespace NullDev\Nemesis\TargetRenderables;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AssignmentLineCollection.
 */
class AssignmentLineCollection extends ArrayCollection implements RenderableInterface
{
    /**
     * @param SourceMetaData $item
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function add($item)
    {
        if ($item instanceof AssignmentLine) {
            return parent::add($item);
        } else {
            throw new \Exception('Only AssignmentLine instances can be added.');
        }
    }

    /**
     * @return string
     */
    public function render()
    {
        $result = [];
        $this->recalculateDestinationWhiteSpace();

        foreach ($this->getIterator() as $item) {
            $result[] = $item->render();
        }

        return implode(PHP_EOL, $result);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    public function recalculateDestinationWhiteSpace()
    {
        $max = $this->findMaxDestinationAlignment();

        foreach ($this->getIterator() as $item) {
            $item->setDestinationAlignment($max);
        }
    }

    /**
     * @return int
     */
    public function findMaxDestinationAlignment()
    {
        $max = 0;

        foreach ($this->getIterator() as $item) {
            if ($max < $item->getDestinationAlignment()) {
                $max = $item->getDestinationAlignment();
            }
        }

        return $max;
    }
}
