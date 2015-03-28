<?php

namespace NullDev\Nemesis\Settings;

use Exception;

/**
 * Class PackageSettings.
 */
class PackageSettings
{
    protected $path;
    protected $type;
    protected $rootNamespace;
    protected $rootTestPath;
    protected $rootTestNamespace;

    protected $excludeFolders = [];

    /**
     * @return string
     *
     * @throws Exception
     */
    public function getPath()
    {
        if ($this->path === null) {
            throw new Exception('Root package path is not defined!');
        }

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
     * @return mixed
     */
    public function getRootNamespace()
    {
        if (null === $this->rootNamespace) {
            return $this->calculateRootNamespaceFromRootPath($this->getPath());
        }

        return $this->rootNamespace;
    }

    /**
     * @param mixed $rootNamespace
     */
    public function setRootNamespace($rootNamespace)
    {
        $this->rootNamespace = $rootNamespace;
    }

    /**
     * @return mixed
     */
    public function getRootTestPath()
    {
        if (null === $this->rootTestPath) {
            return $this->getPath().'/Tests';
        }

        return $this->rootTestPath;
    }

    /**
     * @param mixed $rootTestPath
     */
    public function setRootTestPath($rootTestPath)
    {
        $this->rootTestPath = $rootTestPath;
    }

    /**
     * @return mixed
     */
    public function getRootTestNamespace()
    {
        if (null === $this->rootTestNamespace) {
            return $this->getRootNamespace().'\Tests';
        }

        return $this->rootTestNamespace;
    }

    /**
     * @param mixed $rootTestNamespace
     */
    public function setRootTestNamespace($rootTestNamespace)
    {
        $this->rootTestNamespace = $rootTestNamespace;
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

    /**
     * @param string $rootPath
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function calculateRootNamespaceFromRootPath($rootPath)
    {
        if (substr($rootPath, -1) === '/') {
            $rootPath = substr($rootPath, 0, -1);
        }

        //Locates last occurrence of 'src/' in given path.
        $regex = '/.*src\/(?<namespace>.*)$/';

        //Regex occurrence hasn't matched 'src/' in path.
        if (!preg_match($regex, $rootPath, $matches)) {
            throw new \Exception('Root namespace not recognizable in '.$rootPath);
        }

        //Replace '/' with namespace separator.
        $namespace = str_replace('/', '\\', $matches['namespace']);

        return $namespace;
    }
}
