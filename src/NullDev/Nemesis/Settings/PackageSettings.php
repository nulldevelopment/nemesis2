<?php

namespace NullDev\Nemesis\Settings;

/**
 * Class PackageSettings.
 */
class PackageSettings
{
    protected $path;
    protected $type;

    protected $excludeFolders = [];

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function getExcludeFolders()
    {
        return $this->excludeFolders;
    }

    /**
     * @param array $excludeFolders
     *
     * @return $this
     */
    public function setExcludeFolders($excludeFolders)
    {
        $this->excludeFolders = $excludeFolders;

        return $this;
    }

    /**
     * @param string $excludeFolder
     *
     * @return $this
     */
    public function addExcludeFolders($excludeFolder)
    {
        $this->excludeFolders[] = $excludeFolder;

        return $this;
    }
}
