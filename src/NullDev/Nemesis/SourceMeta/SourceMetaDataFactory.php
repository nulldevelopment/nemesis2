<?php

namespace NullDev\Nemesis\SourceMeta;

use NullDev\Nemesis\SourceMeta\SourceMetaData;

class SourceMetaDataFactory
{
    public function create()
    {
        return new SourceMetaData();
    }
}
