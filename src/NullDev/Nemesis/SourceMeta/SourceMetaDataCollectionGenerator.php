<?php

namespace NullDev\Nemesis\SourceMeta;

use NullDev\Nemesis\Settings\PackageSettings;
use NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionFactory;
use NullDev\Nemesis\SourceMeta\SourceMetaDataGenerator;
use NullDev\Nemesis\SourceFile\SourceFileListGenerator;
use NullDev\Nemesis\SourceMeta\SourceMetaData;

class SourceMetaDataCollectionGenerator
{
    protected $factory;
    protected $fileListGen;

    protected $sourceMetaDataGenerator;

    public function __construct(
        SourceMetaDataCollectionFactory $factory,
        SourceFileListGenerator $fileListGen,
        SourceMetaDataGenerator $sourceMetaDataGenerator
    ) {
        $this->factory                 = $factory;
        $this->fileListGen             = $fileListGen;
        $this->sourceMetaDataGenerator = $sourceMetaDataGenerator;
    }

    /**
     * @param PackageSettings $settings
     *
     * @return SourceMetaDataCollection
     */
    public function generate(PackageSettings $settings)
    {
        $collection = $this->factory->create();

        $files = $this->fileListGen->generate($settings);

        foreach ($files as $filePath) {
            $sourceMeta = $this->sourceMetaDataGenerator->generate($filePath);

            if ($sourceMeta instanceof SourceMetaData) {
                $collection->add($sourceMeta);
            }
        }

        return $collection;
    }
}
