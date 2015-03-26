<?php

namespace NullDev\Nemesis\Action;

use NullDev\Nemesis\Collection\ActionResultCollection;
use NullDev\Nemesis\Settings\PackageSettings;

/**
 * Class GenerateTestsAction.
 */
class GenerateTestsAction
{
    protected $resultCollection;

    /**
     * @param ActionResultCollection $resultCollection
     */
    public function __construct(ActionResultCollection $resultCollection)
    {
        $this->resultCollection = $resultCollection;
    }

    /**
     * @param PackageSettings $packageSettings
     *
     * @return ActionResultCollection
     *
     * @SuppressWarnings("UnusedFormalParameter")
     */
    public function runAction(PackageSettings $packageSettings)
    {
        return $this->resultCollection;
    }
}
