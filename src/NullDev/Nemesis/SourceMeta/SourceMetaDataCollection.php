<?php

namespace NullDev\Nemesis\SourceMeta;

use Doctrine\Common\Collections\ArrayCollection;
use NullDev\Nemesis\SourceMeta\SourceMetaData;

/**
 * Class SourceMetaDataCollection.
 */
class SourceMetaDataCollection extends ArrayCollection
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
        if ($item instanceof SourceMetaData) {
            return parent::add($item);
        } else {
            throw new \Exception('Only SourceMetaData instances can be added.');
        }
    }
}
