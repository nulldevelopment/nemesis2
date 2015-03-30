<?php

namespace NullDev\Nemesis\TargetRenderables;

/**
 * Class ClassInstantiation.
 */
class ClassInstantiation implements RenderableInterface
{
    protected $className;

    protected $params;

    public function __construct()
    {
        $this->params = new RenderableCollection();
        $this->params->setSeparator(', ');
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
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param RenderableCollection $params
     */
    public function setParams(RenderableCollection $params)
    {
        $this->params = $params;
    }

    /**
     * @param $param
     */
    public function addParam($param)
    {
        $this->params->add($param);
    }

    /**
     * @return string
     */
    public function render()
    {
        $result = 'new '.$this->getClassName().'('.$this->params->render().')';

        return $result;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }
}
