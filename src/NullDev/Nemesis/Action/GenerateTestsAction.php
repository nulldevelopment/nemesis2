<?php

namespace NullDev\Nemesis\Action;

use NullDev\Nemesis\Collection\ActionResultCollection;
use NullDev\Nemesis\Settings\PackageSettings;
use NullDev\Nemesis\SourceMeta\SourceMetaDataCollectionGenerator;

/**
 * Class GenerateTestsAction.
 */
class GenerateTestsAction
{
    protected $resultCollection;
    protected $sourceGen;

    /**
     * @param ActionResultCollection $resultCollection
     */
    public function __construct(ActionResultCollection $resultCollection, SourceMetaDataCollectionGenerator $sourceGen)
    {
        $this->resultCollection = $resultCollection;
        $this->sourceGen        = $sourceGen;
    }

    /**
     * @param PackageSettings $packageSettings
     *
     * @return ActionResultCollection
     *
     * @SuppressWarnings("Unused")
     */
    public function runAction(PackageSettings $packageSettings)
    {
        $sourceCollection = $this->sourceGen->generate($packageSettings);

        return $this->resultCollection;
    }
}
