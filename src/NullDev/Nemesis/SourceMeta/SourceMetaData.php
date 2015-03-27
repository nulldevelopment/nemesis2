<?php

namespace NullDev\Nemesis\SourceMeta;

/**
 * Class SourceMetaData.
 */
class SourceMetaData
{
    protected $filePath;
    protected $className;
    protected $fullyQualifiedClassName;
    protected $reflection;

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param mixed $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param mixed $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * @return mixed
     */
    public function getFullyQualifiedClassName()
    {
        return $this->fullyQualifiedClassName;
    }

    /**
     * @param mixed $fullyQualifiedClassName
     */
    public function setFullyQualifiedClassName($fullyQualifiedClassName)
    {
        $this->fullyQualifiedClassName = $fullyQualifiedClassName;
    }

    /**
     * @return mixed
     */
    public function getReflection()
    {
        return $this->reflection;
    }

    /**
     * @param mixed $reflection
     */
    public function setReflection(\ReflectionClass $reflection)
    {
        $this->reflection = $reflection;
    }

    /**
     * @return \ReflectionMethod|null
     */
    public function getConstructorReflection()
    {
        foreach ($this->getReflection()->getMethods() as $method) {
            if ($method->isConstructor()) {
                return $method;
            }
        }

        return null;
    }

    /**
     * @return bool
     */
    public function hasConstructorParams()
    {
        $constructor = $this->getConstructorReflection();

        if (null === $constructor) {
            return false;
        }

        if (count($constructor->getParameters()) === 0) {
            return false;
        }

        return true;
    }
}
