<?php

namespace NullDev\Nemesis\TargetRenderables;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class RenderableCollection.
 */
class RenderableCollection extends ArrayCollection implements RenderableInterface
{
    protected $separator = ',';

    /**
     * @return string
     */
    public function getSeparator()
    {
        return $this->separator;
    }

    /**
     * @param string $separator
     */
    public function setSeparator($separator)
    {
        $this->separator = $separator;
    }

    /**
     * @return string
     */
    public function render()
    {
        $result = [];

        foreach ($this->getIterator() as $item) {
            $result[] = $this->escape($item);
        }

        return implode($this->getSeparator(), $result);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @param $source
     *
     * @return mixed|string
     */
    public function escape($source)
    {
        if (is_bool($source)) {
            return strtolower(var_export($source, true));
        }

        if (null === $source) {
            return 'null';
        }

        if (is_object($source)) {
            return $source->__toString();
        }

        if (substr($source, 0, 1) === '$') {
            return $source;
        }

        return var_export($source, true);
    }
}
