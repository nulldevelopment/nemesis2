<?php

namespace NullDev\Nemesis\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaData;

/**
 * Class SourceMetaDataFactory.
 */
class SourceMetaDataFactory
{
    /**
     * @return SourceMetaData
     */
    public function create()
    {
        return new SourceMetaData();
    }
}
