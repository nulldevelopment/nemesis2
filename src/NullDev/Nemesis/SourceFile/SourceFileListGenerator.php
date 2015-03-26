<?php

namespace NullDev\Nemesis\SourceFile;

use Symfony\Component\Finder\Finder;
use NullDev\Nemesis\Settings\PackageSettings;

class SourceFileListGenerator
{
    protected $fileFinder;

    public function __construct(Finder $fileFinder)
    {
        $this->fileFinder = $fileFinder;
    }

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
