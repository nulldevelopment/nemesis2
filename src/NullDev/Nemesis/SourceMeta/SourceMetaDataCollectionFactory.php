<?php

namespace NullDev\Nemesis\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaDataCollection;

/**
 * Class SourceMetaDataCollectionFactory.
 */
class SourceMetaDataCollectionFactory
{
    /**
     * @return SourceMetaDataCollection
     */
    public function create()
    {
        return new SourceMetaDataCollection();
    }
}
