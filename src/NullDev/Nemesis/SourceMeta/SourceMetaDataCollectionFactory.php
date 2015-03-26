<?php

namespace NullDev\Nemesis\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaDataCollection;

class SourceMetaDataCollectionFactory
{
    public function create()
    {
        return new SourceMetaDataCollection();
    }
}
