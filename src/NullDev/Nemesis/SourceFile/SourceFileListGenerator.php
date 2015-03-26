<?php

namespace NullDev\Nemesis\SourceFile;

use Symfony\Component\Finder\Finder;
use NullDev\Nemesis\Settings\PackageSettings;

/**
 * Class SourceFileListGenerator.
 */
class SourceFileListGenerator
{
    protected $fileFinder;

    /**
     * @param Finder $fileFinder
     */
    public function __construct(Finder $fileFinder)
    {
        $this->fileFinder = $fileFinder;
    }

    /**
     * @param PackageSettings $packageSettings
     *
     * @return $this|Finder
     */
    public function generate(PackageSettings $packageSettings)
    {
        $files = $this->fileFinder
            ->files()
            ->name('*.php')
            ->in($packageSettings->getPath())
            ->exclude($packageSettings->getExcludeFolders())
            ->sortByName();

        return $files;
    }
}
